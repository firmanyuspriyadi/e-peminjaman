<?php

namespace backend\controllers;

use Yii;
use backend\models\TblMskBrg;
use frontend\models\SignupForm;
use backend\models\TblMskBrgSearch;
use backend\models\TblDetailMasukBarang;
use backend\models\TblAlat;
use backend\models\Model;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;


/**
 * TblMskBrgController implements the CRUD actions for TblMskBrg model.
 */
class TblMskBrgController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all TblMskBrg models.
     * @return mixed
     */
    public function actionIndex()
    {
        // $searchModel = new TblMskBrgSearch();
        // $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        // return $this->render('index', [
        //     'searchModel' => $searchModel,
        //     'dataProvider' => $dataProvider,
        // ]);
       $this->redirect('tbl-msk-brg/create');
    }

    /**
     * Displays a single TblMskBrg model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $detailMasuk = TblDetailMasukBarang::find()->where(['id_masuk_brg'=>$id]);
//        \print_r($detailMasuk);
//        die();
        $barangProvider = new \yii\data\ActiveDataProvider(['query'=>$detailMasuk]);
       
        return $this->render('view', [
            'model' => $this->findModel($id),
            'barangProvider'=>$barangProvider,
        ]);
    }
    
    public function actionCancel($id,$idmasuk)
    {
        if (($delete = TblDetailMasukBarang::findOne($id)) !== NULL){
            $delete->delete();
            return $this->redirect(['view','id'=>$idmasuk]);
        }
    }
    
    public function actionTambah($id)
    {
        $model = $this->findModel($id);
        $detailmasuk = new TblDetailMasukBarang();
        if ($detailmasuk->load(Yii::$app->request->post())){
            
            $detailmasuk->id_masuk_brg = $id;
           
            if($detailmasuk->save()){
                
               Yii::$app->session->setFlash('success', 'Data berhasil disimpan.');
              
            }
            else{
              Yii::$app->session->setFlash('error', 'Data gagal disimpan.');
            }   
                
        }else{
            $detail = TblDetailMasukBarang::find()->select('id_brg');
            $tambah = \backend\models\TblBarang::find()                    
                    ->all();
            
            return $this->renderAjax('create2',[
               'model' =>$model,
                'detailmasuk'=>$detailmasuk,
                'tambah'=>$tambah
            ]);
        }
        return $this->render(['view','id'=>$id]);
    }

    /**
     * Creates a new TblMskBrg model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TblMskBrg();
        $brgdetail = [new TblDetailMasukBarang()];
        
        if ($model->load(Yii::$app->request->post()) ) {
            $brgdetail = Model::createMultiple(TblDetailMasukBarang::className());
            Model::loadMultiple($brgdetail,Yii::$app->request->post());
            
            $valid = $model->validate();
            $valid = Model::validateMultiple($brgdetail) && $valid;
            
            if($valid)
            {
                $transaction = \Yii::$app->db->beginTransaction();
                try{
                    if($flag = $model->save(false)){
                        foreach($brgdetail as $detail){
                            $detail->id_masuk_brg = $model->id;
                            if(!($flag = $detail->save(false))){
                                $transaction->rollBack();
                               break;
                            }
                        }
                    }
                    if($flag){
                        $transaction->commit();
                        $model->trigger(TblDetailMasukBarang::EVENT_AFTER_INSERT);
                        return $this->redirect(['view','id'=>$model->id]);
                    }
                } catch (Exception $ex) {
                    $transaction->rollBack();
                }
            }
        } 
           return $this->render('create', [
                'model' => $model,
                'brgdetail'=> (empty($brgdetail)) ? [new TblDetailMasukBarang()] : $brgdetail
            ]); 
        
    }

    /**
     * Updates an existing TblMskBrg model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $brgdetail = $model->tblDetailMasukBarangs;
        
        if ($model->load(Yii::$app->request->post())) {
            $oldIDs = ArrayHelper::map($brgdetail, 'id','id');
            $brgdetail = Model::createMultiple(TblDetailMasukBarang::className(),$brgdetail);
            Model::loadMultiple($brgdetail, Yii::$app->request->post());
            $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($brgdetail,'id','id')));
            
            $valid = $model->validate();
            $valid = Model::validateMultiple($brgdetail) && $valid;
            
            if($valid){
                $transaction = \Yii::$app->db->beginTransaction();
                try{
                    if($flag = $model->save(false)){
                        if(!empty($deletedIDs)){
                            TblDetailMasukBarang::deleteAll(['id'=>$deletedIDs]);
                            
                        }
                        foreach ($brgdetail as $detail){
                            $detail->id_masukk_brg = $model->id;
                            if(!($flag = $liput->save(false))){
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if($flag){
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $model->id]);
                    }
                } catch (Exception $ex) {
                    $transaction->rollBack();
                }
                
            }
            
            
        } else {
            return $this->render('update', [
                'model' => $model,
                'brgdetail'=> (empty($brgdetail)) ? [new TblDetailMasukBarang()] : $brgdetail
            ]);
        }
    }

    /**
     * Deletes an existing TblMskBrg model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TblMskBrg model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TblMskBrg the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TblMskBrg::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    public function actionSignup()
    {
        $model2 = new SignupForm();
        if ($model2->load(Yii::$app->request->post())) {
            if ($user = $model2->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model2' => $model2,
        ]);
    }
}
