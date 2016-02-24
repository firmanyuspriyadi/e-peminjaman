<?php

namespace backend\controllers;

use Yii;
use backend\models\TblRetur;
use backend\models\Model;
use backend\models\TblReturSearch;
use backend\models\TabelDetailRetur;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;


/**
 * TblReturController implements the CRUD actions for TblRetur model.
 */
class TblReturController extends Controller
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
     * Lists all TblRetur models.
     * @return mixed
     */
    public function actionIndex()
    {
        // $searchModel = new TblReturSearch();
        // $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        // return $this->render('index', [
        //     'searchModel' => $searchModel,
        //     'dataProvider' => $dataProvider,
        // ]);
        return $this->redirect('tbl-retur/create');
    }

    /**
     * Displays a single TblRetur model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new TblRetur model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TblRetur();
        $detailRetur = [new TabelDetailRetur()];

        if ($model->load(Yii::$app->request->post()) ) {
            $detailRetur = Model::createMultiple(TabelDetailRetur::className());
            Model::loadMultiple($detailRetur, Yii::$app->request->post());
            
            $valid = $model->validate();
            $valid = Model::validateMultiple($detailRetur) && $valid;
            
            if($valid)
            {
                $transaction = \Yii::$app->db->beginTransaction();
                try{
                    if($flag = $model->save(false))
                    {
                        foreach($detailRetur as $detail )
                        {
                            $detail->id_retur = $model->id;
                            if(!($flag = $detail->save(false)))
                            {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if($flag){
                        $transaction->commit();
                        return $this->redirect(['view', 'id'=>$model->id]);
                    }
                } catch (Exception $ex) {
                    $transaction->rollBack();
                }
            }
        } else {
            return $this->render('create', [
                'model' => $model,
                'detailRetur'=> (empty($detailRetur)) ? [new TabelDetailRetur()] : $detailRetur,
            ]);
        }
    }

    /**
     * Updates an existing TblRetur model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $detailRetur= $model->tabelDetailReturs;

        if ($model->load(Yii::$app->request->post()))
        {
            $oldIDs = ArrayHelper::map($detailRetur, 'id','id');
            $detailRetur = Model::createMultiple(TabelDetailRetur::className, $detailRetur);
            Model::loadMultiple($detailRetur, Yii::$app->post());
            $deletedIdDs = array_diff($oldIDs, array_filter(ArrayHelper::map($detailRetur,'id','id')));

            $valid = $model->validate;
            $valid = Model::validateMultiple($detailRetur) && $valid;

            if($valid)
            {
                $transaction = \Yii::$app->db->beginTransaction();
                try{
                    if ($flag= $model->save(false)){
                        if(!empty($deletedIdDs)){
                            TabelDetailRetur::deleteAll(['id'=>$deletedIdDs]);
                        }

                        foreach ($$detailRetur as $detail) {
                            $detail->id_retur = $model->id;
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

        }
        return $this->render('update',[
                
                    'model'=>$model,
                    'detailRetur'=> (empty($detailRetur)) ? [new TabelDetailRetur()] : $detailRetur
                ]);


        
    }

    /**
     * Deletes an existing TblRetur model.
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
     * Finds the TblRetur model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TblRetur the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TblRetur::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
