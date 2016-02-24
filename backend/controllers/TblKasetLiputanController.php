<?php

namespace backend\controllers;

use Yii;
use backend\models\TblKasetLiputan;
use backend\models\Model;
use backend\models\TabelDetailKaset;
use backend\models\TblKasetLiputanSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * TblKasetLiputanController implements the CRUD actions for TblKasetLiputan model.
 */
class TblKasetLiputanController extends Controller
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
     * Lists all TblKasetLiputan models.
     * @return mixed
     */
    public function actionIndex()
    {
        // $searchModel = new TblKasetLiputanSearch();
        // $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        // return $this->render('index', [
        //     'searchModel' => $searchModel,
        //     'dataProvider' => $dataProvider,
        // ]);
        return $this->redirect('tbl-kaset-liputan/create');
    }

    /**
     * Displays a single TblKasetLiputan model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        
        $detail = TabelDetailKaset::find()->where(['nomor_kaset'=>$id]);
        $kasetProvider = new \yii\data\ActiveDataProvider(['query'=>$detail]);
        return $this->render('view', [
            'model' => $this->findModel($id),
            'kasetProvider'=>$kasetProvider
            
        ]);
    }
    
    
    
    public function actionCancel($id,$nomor_kaset){
       
        if (($delete = TabelDetailKaset::findOne($id)) !== NULL)    {
            $delete->delete();           
           return $this->redirect(['view','id'=>$nomor_kaset]);
        }
         
    }
    
    public function actionTambah($id)
    {
        
        $model = $this->findModel($id);
        $tabeldetail = new TabelDetailKaset();
        if($tabeldetail->load(Yii::$app->request->post())){
           
            $tabeldetail->nomor_kaset = $id;
            
            if($tabeldetail->save()){
                Yii::$app->session->setFlash('success','Data berhasil disimpan');
            }else{
                Yii::$app->session->setFlash('error','Data gagal disimpan');
            }            
        }else{
            
            $detailacara = TabelDetailKaset::find()->select('id_acara');            
            $acara = \backend\models\TblAcara::find()
                    ->where(['NOT IN', 'id',$detailacara])
                    ->all();
          
            return $this->renderAjax('create2',[
                'model'=>$model,
                'acara'=>$acara,
                'tabeldetail'=>$tabeldetail,
                      
            ]);
         
        }
       
        return $this->render('view',['model'=>$this->findModel($id)]);
            
    }
    

    /**
     * Creates a new TblKasetLiputan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TblKasetLiputan();
        
        $detailkaset = [new TabelDetailKaset()];
        
        $kaset = TabelDetailKaset::find()->select('id_acara');
        $acara = \backend\models\TblAcara::find()
                ->where(['NOT IN','id',$kaset])
                ->all();

        if ($model->load(Yii::$app->request->post())) {

            $detailkaset = Model::createMultiple(TabelDetailKaset::classname());
            Model::loadMultiple($detailkaset, Yii::$app->request->post());

            $valid = $model->validate();
            $valid = Model::validateMultiple($detailkaset) && $valid;
                        
            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
                        
                        foreach ($detailkaset as $detail) {
                            $detail->nomor_kaset = $model->nomor_kaset;
                            if (! ($flag = $detail->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $model->nomor_kaset]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        } 
        return $this->render('create', [
                'model' => $model,
                'detailkaset' => (empty($detailkaset)) ? [new TabelDetailKaset()] : $detailkaset,
                'acara'=>$acara
            ]);
    }

    /**
     * Updates an existing TblKasetLiputan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $detailkaset = $model->tabelDetailKasets;

        if($model->load(Yii::$app->request->post()))
        {
            $oldIds = Arrayhelpers::map($detailkaset,'id','id');
            $detailkaset = Model::createMultiple(TabelDetailKaset::className,$detailkaset);
            Model::loadMultiple($detailkaset, Yii::$app->request->post());
            $deletedIDs = array_diff($oldids, array_filter(ArrayHelper::map($detailkaset, 'id','id')));
            
            $valid = $model->validate();
            $valid = Model::validateMultiple($detailkaset) && $valid;
            
            if($valid)
            {
                $transaction = \Yii::$app->db->beginTransaction();
                try{
                    if($flag=$model->save(false)){
                        if(!empty($deletedIDs)){
                            TabelDetailKaset::deleteAll(['id'=>$deletedIDs]);
                        }
                        
                        foreach($detailkaset as $detail){
                            $detail->nomor_kaset = $model->nomor_kaset;
                            if(!($flag=$model->save(false))){
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if($flag){
                        $transaction->commit();
                        return $this->redirect(['view','id'=>$model->id]);
                    }
                } catch (Exception $ex) {
                  $transaction->rollBack();
                }
            }
        } 
            
            return $this->render('update' , [
                'model'=>$model,
                'detailkaset'=> (empty($detailkaset)) ? [new TabelDetailKaset()] : $detailkaset
                
            ]);
       
        
        
    }

    /**
     * Deletes an existing TblKasetLiputan model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TblKasetLiputan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return TblKasetLiputan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TblKasetLiputan::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    protected function findModel2($id){
        if (($model2 = TabelDetailKaset::findOne($id)) !== null){
            return $model2;
        }else {
            throw new NotFoundHttpException('The requested page does not exist');
        }
    }
}
