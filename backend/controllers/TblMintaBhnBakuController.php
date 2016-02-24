<?php

namespace backend\controllers;

use Yii;
use backend\models\TblMintaBhnBaku;
use backend\models\TblMintaBhnBakuSearch;
use backend\models\TblDetailMinta;
use backend\models\Model;
use backend\models\TblGudangBrg;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use kartik\mpdf\Pdf;

use yii\helpers\ArrayHelper;


/**
 * TblMintaBhnBakuController implements the CRUD actions for TblMintaBhnBaku model.
 */
class TblMintaBhnBakuController extends Controller
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
     * Lists all TblMintaBhnBaku models.
     * @return mixed
     */
    public function actionIndex()
     {
    //     $searchModel = new TblMintaBhnBakuSearch();
    //     $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

    //     return $this->render('index', [
    //         'searchModel' => $searchModel,
    //         'dataProvider' => $dataProvider,
    //     ]);
        return $this->redirect('tbl-minta-bhn-baku/create');
    }

    /**
     * Displays a single TblMintaBhnBaku model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new TblMintaBhnBaku model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TblMintaBhnBaku;
        $mintadetail = [new TblDetailMinta()];
        
        
        if ($model->load(Yii::$app->request->post()) ) {
            $mintadetail = Model::createMultiple(TblDetailMinta::className());
            Model::loadMultiple($mintadetail,Yii::$app->request->post());
            
            $valid = $model->validate();
            $valid = Model::validateMultiple($mintadetail) && $valid;
            
            if($valid)
            {
                $transaction = \Yii::$app->db->beginTransaction();
                try{
                    if($flag = $model->save(false)){
                        foreach($mintadetail as $detail){
                            $detail->nmr_minta = $model->nmr_minta;
                                if(!($flag = $detail->save(false))){
                                        $transaction->rollBack();
                                       break;
                                }
                       }
                    }
                    if($flag){
                        $transaction->commit();
                        return $this->redirect(['view','id'=>$model->nmr_minta]);
                    }
                } catch (Exception $ex) {
                    $transaction->rollBack();
                }
            }
        } 
           return $this->render('create', [
                'model' => $model,
                'mintadetail'=> (empty($mintadetail)) ? [new TblDetailMinta()] : $mintadetail,
            ]); 
    }

    /**
     * Updates an existing TblMintaBhnBaku model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $mintadetail = $model->tblDetailMintas;
        
        

        if ($model->load(Yii::$app->request->post())) {
            $oldIDs = ArrayHelper::map($mintadetail,'id','id');
            $mintadetail = Model::createMultiple(TblDetailMinta::className(),$mintadetail);
            Model::loadMultiple($mintadetail, Yii::$app->request->post());
            $deleteIDs = array_diff($oldIDs,  array_fill(ArrayHelper::map($mintadetail,'id','id')));
            
            $valid = $model->validate();
            $valid = Model::validateMultiple($mintadetail) && $valid;
            
            if ($valid)
            {
                $transaction =  \Yii::$app->db->beginTransaction();
                try{
                    if($flag = $model->save(false))
                    {
                        if(!empty($deleteIDs))
                        {
                            TblDetailMinta::deleteAll(['id'=>$deleteIDs]);
                        }
                        foreach($mintadetail as $minta)
                        {
                            $minta->nmr_minta = $model->nmr_minta;
                            if(!($flag = $minta->save(false))){
                                $transaction->rollBack();
                                break;
                            }
                        }
                        
                    }
                    if($flag){
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $model->nmr_minta]);
                    }
                } catch (Exception $ex) {
                    $transaction->rollBack();
                }
            }
            
            
        } else {
            return $this->render('update', [
                'model' => $model,
                'mintadetail'=> (empty($mintadetail)) ? [new TblDetailMinta()] : $mintadetail ,
            ]);
        }
    }

    /**
     * Deletes an existing TblMintaBhnBaku model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionReport($id){
        $model = $this->findModel($id);
        $detailminta = $model->tblDetailMintas;
        $content = $this->renderPartial('_report',['model'=>$model,'detailminta'=>$detailminta, 'n'=>1]);
        $pdf = Yii::$app->pdf;
        $mpdf = $pdf->api;
        
        //$mpdf->setHeader('Tanda Bukti Pengeluaran');
        $mpdf->WriteHtml($content);
        echo $mpdf->output();
        exit;
    }
    
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TblMintaBhnBaku model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return TblMintaBhnBaku the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TblMintaBhnBaku::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
