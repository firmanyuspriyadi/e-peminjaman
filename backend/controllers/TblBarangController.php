<?php

namespace backend\controllers;

use Yii;
use backend\models\TblBarang;
use backend\models\TblBarangSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\TblKatBrg;
use backend\models\TblJnsBrg;
use yii\helpers\Json;


/**
 * TblBarangController implements the CRUD actions for TblBarang model.
 */
class TblBarangController extends Controller
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
     * Lists all TblBarang models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TblBarangSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TblBarang model.
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
     * Creates a new TblBarang model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TblBarang();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing TblBarang model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing TblBarang model.
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
     * Finds the TblBarang model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TblBarang the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TblBarang::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    public function actionKategori()
    {
        $out= [];
        if(isset($_POST['depdrop_parents']))
        {
            $parents = $_POST['depdrop_parents'];
            if($parents !== NULL)
            {
                $group = $parents[0];
                $out = TblKatBrg::getKategoribyID($group);
                
                echo Json::encode(['output'=>$out,'selected'=>'']);
                return;
            }
           
        }
        echo Json::encode(['output'=>'','selected'=>'']);
    }
    
    public function actionJenis()
    {
        $out2=[];
        if(isset($_POST['depdrop_parents']))
        {
            
            $id = $_POST['depdrop_parents'];
            
            if($id !== NULL)
            {
                $kat = $id[0];
                $out2 = TblKatBrg::getJenisbyID($kat);
                echo Json::encode(['output'=>$out2,'selected'=>'']);
                return;
            }
        }
        echo Json::encode(['output'=>'','selected'=>'']);
    }
}
