<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace backend\controllers;

use yii;
use backend\models\TblKembaliAlat;
use backend\models\TblKembaliAlatSearch;
use backend\models\TblDetailKembaliAlat;
use yii\web\NotFoundHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

class PengembalianController extends Controller {
    
    public function behaviors(){
        return [
            'verbs'=>[
                'class'=>  VerbFilter::classname(),
                'actions'=>[
                    'delete'=>['post'],
                ],
            ],
        ];
    }
    
    public function actionIndex(){
        $searchModel = new TblKembaliAlatSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
        return $this->render('index',[
            'searchModel'=>$searchModel,
            'dataProvider'=>$dataProvider,
        ]);
    }
    
    public function findModel($id){
        if(TblKembaliAlat::findOne($id) !==null){
            return $model;
        } else {
            throw new NotFoundHttpException ('The Requested page doesnt exist');
        }
    }
    
    public function actionReport($id){
        $model = $this->findModel($id);
        
        $petugas = $model->idUser;
        
        
        
    }
}
