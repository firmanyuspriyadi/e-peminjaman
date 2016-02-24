<?php

namespace backend\controllers;

use Yii;
use backend\models\Model;
use backend\models\TblAlat;
use backend\models\TblAlatSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use backend\models\TblPartAlat;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;

/**
 * TblAlatController implements the CRUD actions for TblAlat model.
 */
class TblAlatController extends Controller
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
    
    public function actionKondisi()
    {
        $searchModel = new TblAlatSearch();
        $dataProvider = $searchModel->search2(Yii::$app->request->queryParams);

         if (Yii::$app->request->post('hasEditable')) {
        // instantiate your book model for saving
        $alatId = Yii::$app->request->post('editableKey');
        $model = TblAlat::findOne($alatId);
 
        // store a default json response as desired by editable
        $out = Json::encode(['output'=>'', 'message'=>'']);
 
        // fetch the first entry in posted data (there should 
        // only be one entry anyway in this array for an 
        // editable submission)
        // - $posted is the posted data for Book without any indexes
        // - $post is the converted array for single model validation
        $post = [];
        $posted = current($_POST['TblAlat']);
        $post['TblAlat'] = $posted;
 
        // load model like any single model validation
        if ($model->load($post)) {
            // can save model or do something before saving model
            $model->save();
 
            // custom output to return to be displayed as the editable grid cell
            // data. Normally this is empty - whereby whatever value is edited by 
            // in the input by user is updated automatically.
            $output = '';
 
            // specific use case where you need to validate a specific
            // editable column posted when you have more than one 
            // EditableColumn in the grid view. We evaluate here a 
            // check to see if buy_amount was posted for the Book model
            
            //if (isset($posted['buy_amount'])) {
              // $output =  Yii::$app->formatter->asDecimal($model->buy_amount, 2);
            //} 
 
            // similarly you can check if the name attribute was posted as well
            // if (isset($posted['name'])) {
            //   $output =  ''; // process as you need
            // } 
            $out = Json::encode(['output'=>$output, 'message'=>'']);
        } 
        // return ajax json encoded response and exit
        echo $out;
        return;
        }

        // non-ajax - render the grid by default
        return $this->render('index2', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel
        ]);
    }
    
     public function actionStatus()
    {
        $searchModel = new TblAlatSearch();
        $dataProvider = $searchModel->search3(Yii::$app->request->queryParams);

        return $this->render('index3', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
     * Lists all TblAlat models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TblAlatSearch;
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    /**
     * Displays a single TblAlat model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
        return $this->redirect(['view', 'id' => $model->id]);
        } else {
        return $this->render('view', ['model' => $model]);
}
    }

    /**
     * Creates a new TblAlat model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {

        $model = new TblAlat();
        
        $modelpart = [new TblPartAlat()];

        if ($model->load(Yii::$app->request->post())) {

            $modelpart = Model::createMultiple(TblPartAlat::classname());
            Model::loadMultiple($modelpart, Yii::$app->request->post());
            

            $valid = $model->validate();            
            $valid = Model::validateMultiple($modelpart) && $valid;

            if ($valid) {
               
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
                        
                        foreach ($modelpart as $part) {

                            $part->id_alat = $model->id;
                            if (! ($flag = $part->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $model->id]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        } 
        return $this->render('create', [
                'model' => $model,
                'modelpart' => (empty($modelpart)) ? [new TblPartAlat()] : $modelpart
            ]);
    }

    /**
     * Updates an existing TblAlat model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        
        $modelpart = $model->tblPartAlats;

        if ($model->load(Yii::$app->request->post())) {

            $oldIDs = ArrayHelper::map($modelpart, 'id', 'id');
            $modelpart = Model::createMultiple(TblPartAlat::classname(), $modelpart);
            Model::loadMultiple($modelpart, Yii::$app->request->post());
            $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($modelpart, 'id', 'id')));

            // ajax validation
           
            // validate all models
            $valid = $model->validate();
            $valid = Model::validateMultiple($modelpart) && $valid;
           

            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    
                    if ($flag = $model->save(false)) {
                        if (! empty($deletedIDs)) {
                           
                            TblPartAlat::deleteAll(['id' => $deletedIDs]);
                        }
                        foreach ($modelpart as $parts) {
                            $parts->id_alat = $model->id;
                            if (! ($flag = $parts->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $model->id]);
                    }
                    
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }

        return $this->render('update', [
            'model' => $model,
            'modelpart' => (empty($modelpart)) ? [new TblPartAlat()] : $modelpart
        ]);
    }

    /**
     * Deletes an existing TblAlat model.
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
     * Finds the TblAlat model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TblAlat the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TblAlat::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
            
    public function actionModel()
    {
        $out = [];
        if(isset($_POST['depdrop_parents'])){
            $parents = $_POST['depdrop_parents'];
            if($parents !== NULL){
                $jns_id = $parents[0];
                $out = \backend\models\TblModelAlat::getModelbyID($jns_id);
                echo \yii\helpers\Json::encode(['output'=>$out,'selected'=>'']);
                return;
            }
        }
        echo \yii\helpers\Json::encode(['output'=>'','selected'=>'']);
    }
    
   
}
