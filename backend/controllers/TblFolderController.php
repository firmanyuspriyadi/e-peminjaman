<?php

namespace backend\controllers;

use Yii;
use backend\models\TblFolder;
use backend\models\TblFolderSearch;
use backend\models\TblDetailFolder;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\Model;
use yii\helpers\ArrayHelper;


/**
 * TblFolderController implements the CRUD actions for TblFolder model.
 */
class TblFolderController extends Controller
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
     * Lists all TblFolder models.
     * @return mixed
     */
    public function actionIndex()
    {
        // $searchModel = new TblFolderSearch;
        // $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());

        // return $this->render('index', [
        //     'dataProvider' => $dataProvider,
        //     'searchModel' => $searchModel,
        // ]);
        return $this->redirect('tbl-folder/create');
    }

    /**
     * Displays a single TblFolder model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
//
//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//        return $this->redirect(['view', 'id' => $model->id]);
//        } else {
//        return $this->render('view', ['model' => $model]);
//        }
        
        $detail = TblDetailFolder::find()->where(['folder_id'=>$id]);
        $kasetProvider = new \yii\data\ActiveDataProvider(['query'=>$detail]);
        
        return $this->render('view',[
            'model'=>$model,
            'kasetProvider'=>$kasetProvider,
        ]);
    }

    /**
     * Creates a new TblFolder model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    
    public function actionTambah($id)
    {        
        $model = $this->findModel($id);
        $detail = new TblDetailFolder();        
        if ($detail->load(Yii::$app->request->post())){            
            $detail->folder_id = $id;
            if($detail->save()){
                Yii::$app->session->setFlash('success','Data berhasil disimpan');
            }else {
                Yii::$app->session->setFlash('error','Data gagal disimpan');
            }
        }else {            
            $detailfolder = TblDetailFolder::find()->select('kaset_id');
            $kaset = \backend\models\TblKasetLiputan::find()
                    ->where(['NOT IN', 'nomor_kaset',$detailfolder])
                    ->all();
           
            
            return $this->renderAjax('create2',[
                'model'=>$model,
               'detail' =>$detail,
                'kaset'=>$kaset
            ]);
        }
        
       
        
        return $this->redirect(['view','id'=>$id]);
    }
    
    public function actionCancel($id, $folderid)
    {
        if (($delete = TblDetailFolder::findOne($id)) !== NULL ){
            $delete->delete();
            
            return $this->redirect(['view','id'=>$folderid]);
        }
    }
    
    public function actionCreate()
    {
        $model = new TblFolder;        
        $detailfolder = [new TblDetailFolder()];
        
        $kaset = TblDetailFolder::find()->select('kaset_id');
        $kasetliputan = \backend\models\TblKasetLiputan::find()
                ->where(['NOT IN', 'nomor_kaset',$kaset])
                ->all();
        

        if ($model->load(Yii::$app->request->post())) {
            $detailfolder = Model::createMultiple(TblDetailFolder::className());
            Model::loadMultiple($detailfolder, Yii::$app->request->post());
            
            $valid = $model->validate();
            $valid = Model::validateMultiple($detailfolder) && $valid;
            
            if($valid){
                $transaction = \Yii::$app->db->beginTransaction();
                try{
                    if($flag=$model->save(false)){
                        foreach($detailfolder as $detail){
                            $detail->folder_id = $model->id;
                            if(!($flag= $detail->save(false))){
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
           
        } else {
            return $this->render('create', [
                'model' => $model,
                'detailfolder'=> (empty($detailfolder)) ? [new TblDetailFolder()] : $detailfolder ,
                'kasetliputan'=>$kasetliputan,
            ]);
        }
    }

    /**
     * Updates an existing TblFolder model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $detailfolder = $model->tblArsips;

        if(Yii::$app->request->post()){
                $oldIDs = ArrayHelper::map($detailfolder, 'id','id');
                $detailfolder = Model::createMultiple(TblDetailFolder::className, $detailfolder);
                Model::loadMultiple($detailfolder, Yii::$app->request->post());
                $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($detailfolder, 'id','id')));

                $valid = $model->validate();
                $valid = Model::validateMultiple($detailfolder) && $valid;
            
                if($valid)
                    $transaction = \Yii::$app->db->transaction();
                    try{
                        if($flag = $model->save(false)){
                            if(!(empty($deletedIDs))){
                                TblDetailFolder::deleteAll(['id'=>$deletedIDs]);
                            }

                            foreach ($$detailfolder as $detail) {
                                $detail->folder_id = $model->id;
                                if(!($flag = $model->save(false))){
                                    $transaction->rollBack();
                                    break;
                                }
                            }
                        }
                        if($flag){
                            $transaction->commit();
                            return $this->redirect(['view', 'id'=>$model->id]);
                        }
                    } catch (Exception $ex){
                        $transaction->rollBack();
                        
                    }
            

            }
            return $this->render('update',[
                'model'=>$model,
                'detailfolder'=> (empty($detailfolder)) ? [new TblDetailFolder()] : $detailfolder
                ]);
        

        
    }

    /**
     * Deletes an existing TblFolder model.
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
     * Finds the TblFolder model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TblFolder the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TblFolder::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
