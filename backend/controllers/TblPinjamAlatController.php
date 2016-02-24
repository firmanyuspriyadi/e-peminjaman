<?php

namespace backend\controllers;

use Yii;
use backend\models\TblPinjamAlat;
use backend\models\TblPinjamAlatSearch;
use backend\models\TblMeliput;
use backend\models\TblDetailPinjamAlat;
use backend\models\TblAlat;
use backend\models\Model;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use kartik\mpdf\Pdf;
use yii\helpers\Json;
use yii\web\request;

/**
 * TblPinjamAlatController implements the CRUD actions for TblPinjamAlat model.
 */
class TblPinjamAlatController extends Controller
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
     * Lists all TblPinjamAlat models.
     * @return mixed
     */
    public function actionIndex()
    {
//        $searchModel = new TblPinjamAlatSearch();
//        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
//
//        return $this->render('index', [
//            'searchModel' => $searchModel,
//            'dataProvider' => $dataProvider,
//        ]);
       $this->redirect('tbl-pinjam-alat/create');
    }
    
    public function actionCetak(){
        $searchModel = new TblPinjamAlatSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TblPinjamAlat model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
//        $searchModel2 = new TblPinjamAlatSearch();
//        $dataProvider2 = $searchModel->search($id);
        $acara = TblMeliput::find()->where(['id_pinjam_alat'=>$id]);
        $acaraProvider = new ActiveDataProvider(['query'=>$acara]);
        $alat = TblDetailPinjamAlat::find()->where(['id_pinjam'=>$id]);
        $alatProvider = new ActiveDataProvider(['query'=>$alat]);
        
        return $this->render('view', [
            'model' => $this->findModel($id),
            'acaraProvider'=>$acaraProvider,
            'alatProvider'=>$alatProvider
        ]);
    }
    
      
    
    // FUNCTION UNTUK MENGINPUT KE DATABASE DARI JAVASCRIPT
    public function actionTambah($id){
        $model= $this->findModel($id);
        $meliput = new TblMeliput();
        if ($meliput->load(Yii::$app->request->post())){
            $meliput->id_pinjam_alat = $id;
            if($meliput->save()){
              Yii::$app->session->setFlash('success', 'Data berhasil disimpan.');
              
            }
            else{
              Yii::$app->session->setFlash('error', 'Data gagal disimpan.');
            }           

        }else{
            
            $acara1 = TblMeliput::find()->select('id_acara');
            $tambah = \backend\models\TblAcara::find()
                        ->where(['NOT IN', 'id',$acara1])
                        ->all();
            
            return $this->renderAjax('create2', [
                'model' => $model,
                'meliput'=>$meliput,
                'tambah'=>$tambah,
            ]);
        }
       
        $acara = TblMeliput::find()->where(['id_pinjam_alat'=>$id])->all();
        $alat = TblDetailPinjamAlat::find()->where(['id_pinjam'=>$id])->all();
       
        return $this->render('view', [
                   'model' => $this->findModel($id),
                   
              ]);
 
        
    }
    
    public function actionTambah2($id){
         
          
        $model= $this->findModel($id);
        $detailpinjam = new TblDetailPinjamAlat();
        if ($detailpinjam->load(Yii::$app->request->post())){
            $detailpinjam->id_pinjam = $id;
            $detailpinjam->ket_alat = 'Baik';
            $detailpinjam->banyak_alat = 1;
           print_r($detailpinjam->banyak_alat);
         
            if($detailpinjam->save()){
              Yii::$app->session->setFlash('success', 'Data berhasil disimpan.');
              
            }
            else{
              Yii::$app->session->setFlash('error', 'Data gagal disimpan.');
            }           

        }else{
            
            $alat = TblDetailPinjamAlat::find()->select('id_alat');
            $tambah = TblAlat::find()
                        ->where(['NOT IN', 'id',$alat])
                        ->all();
            
            return $this->renderAjax('create3', [
                'model' => $model,
                'detailpinjam'=>$detailpinjam,
                'tambah'=>$tambah,
            ]);
        }
       
        $acara = TblMeliput::find()->where(['id_pinjam_alat'=>$id])->all();
        $alat = TblDetailPinjamAlat::find()->where(['id_pinjam'=>$id])->all();
        
        
        return $this->render('view', [
                   'model' => $this->findModel($id),
                   'acara'=>$acara,
                  'alat'=>$alat,
              ]);
 
        
    }
    
    public function actionTambalat($id){
        $model->$this->findModel($id);
       
        $tambalat = new TblDetailPinjamAlat();
        
        
        if ($tambalat->load(Yii::$app->request->post())){
            $tambalat->id_pinjam = $id;
            if($tambalat->save()){
                Yii::$app->session->setFlash('success','Data Penambahan Alat berhasil disimpan');
            } else{
                Yii::$app->session->setFlash('error','Data Penambahan Alat gagal disimpan');
            }
        } else{
           
            $alat = TblDetailPinjamAlat::find()->select('id_alat');
            $tambah = TblAlat::find()->where(['NOT IN', 'id', $alat])
                    ->all();
           
            
            return $this->renderAjax('create3',[
                'model'=>$model,
                'tambalat'=>$tambalat,
                'tambah'=>$tambah
            ]);
        }
        $acara = TblMeliput::find()->where(['id_pinjam_alat'=>$id])->all();
        $alat = TblDetailPinjamAlat::find()->where(['id_pinjam'=>$id])->all();
        return $this->render('view', [
                   'model' => $this->findModel($id),
                   'acara'=>$acara,
                  'alat'=>$alat,
              ]);
    }

//    public function actionAcara($id){
//            $modelutama = $this->findModel($id);
//            $meliput = new TblMeliput();
//            
//           // $model = TblMeliput::findOne(['id_pinjam_alat=:id'],[':id'=>$id]);
//            $acara = $meliput->load(Yii::$app->request->post());
////             \yii\helpers\VarDumper::dump($acara,10,true);
////            print_r($_POST);
//            //$posted = $acara['id_acara'];
//             if (isset($acara)){
////                foreach ($acara as $acaras){
//                   // $post = $acara['id_acara'];
//                    //var_dump($post);
////                    break;
//                    $meliput->id_pinjam_alat = $id;
//                    $meliput->id_acara = $acara['id_acara'];
//                    $meliput->save();
//                
//
//                    return $this->redirect(['view','id'=>$modelutama->id]);
////                }
//             }else{
//                 $searchmodel =new TblPinjamAlatSearch();
//                 $dataProvider = $searchmodel->search(Yii::$app->request->queryParams);
//                 return $this->render('index',[
//                         'searchModel'=>$searchmodel,
//                         'dataProvider'=>$dataProvider]);
//             }
//                 
////             }else{
//                 
////             }
//    }
   
    public function actionCreate()
    {
        $model = new TblPinjamAlat();
        $modelmeliput = [new TblMeliput()];
        $modeldetail = [new TblDetailPinjamAlat()];
        $modelalat = new TblAlat();
        
        
        $liput = TblMeliput::find()->select('id_acara');
        $acara = \backend\models\TblAcara::find()
                ->where(['NOT IN', 'id', $liput])
                ->all();
        
        $detailpinjam = TblDetailPinjamAlat::find()->select('id_alat');
        $alat = TblAlat::find()
                ->where('status=:kembali',[':kembali'=>'Kembali'])
                ->all();
       
       
        if ($model->load(Yii::$app->request->post())) {

            $modeldetail = Model::createMultiple(TblDetailPinjamAlat::classname());
            $modelmeliput= Model::createMultiple(TblMeliput::className());
            Model::loadMultiple($modelmeliput, Yii::$app->request->post());
            Model::loadMultiple($modeldetail, Yii::$app->request->post());
            
            $valid = $model->validate();
            $valid = Model::validateMultiple($modelmeliput);
            $valid = Model::validateMultiple($modeldetail) && $valid;
            
            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                   
                    if ($flag = $model->save(false)) {
                        
                        foreach($modelmeliput as $liput){
                            $liput->id_pinjam_alat = $model->id;
                            if (!($flag = $liput->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                         $total = 0;
                        $update = Yii::$app->db->createCommand();
                        
                        
                        foreach ($modeldetail as $pinjam) {
                            $pinjam->id_pinjam = $model->id;
                           //$update->update('tbl_alat', array('status'=>'D',),['id=:id_alat',[':id'=>$pinjam->id_alat]])->execute(false);
                          $update->update('tbl_alat', ['status'=>'Dipinjam'],'id=:id_alat',  [':id_alat'=>$pinjam->id_alat])->execute();
                           //$modelalat->find()->where(['id=:id_alat',[':id'=>$pinjam->id_alat]]);
                           //$modelalat->kondisi = 'Rusak';
                           //$modelalat->save(false);
                          $pinjam->ket_alat='Baik';
                         
                          
                            $total +=$pinjam->banyak_alat;
                            if (! ($flag = $pinjam->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                        
                        
                                               
                        $model->jml_pinjam = $total;
                        
                        $model->save(false);
                    }
                    if ($flag) {
                                          
                        $transaction->commit();
                        $model->trigger(TblPinjamAlat::EVENT_AFTER_INSERT);
                        return $this->redirect(['view', 'id' => $model->id]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        } 
        return $this->render('create', [
                'model' => $model,
                'modeldetail' => (empty($modeldetail)) ? [new TblDetailPinjamAlat()] : $modeldetail,
                'modelmeliput' => (empty($modelmeliput)) ? [new TblMeliput()] : $modelmeliput,
                'acara'=>$acara,
                'alat'=>$alat,
            ]);
    }
    
        /**
     * Updates an existing TblPinjamAlat model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $modelmeliput = $model->tblMeliputs;
        $modeldetail = $model->tblDetailPinjamAlats;
        $modelalat = new TblAlat();
        

        if ($model->load(Yii::$app->request->post())) {

            $oldIDs = ArrayHelper::map($modeldetail, 'id', 'id');
            $modeldetail = Model::createMultiple(TblDetailPinjamAlat::classname(), $modeldetail);
            Model::loadMultiple($modeldetail, Yii::$app->request->post());
            $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($modeldetail, 'id', 'id')));
            
            $oldIDs2 = ArrayHelper::map($modelmeliput, 'id', 'id');
            $modelmeliput = Model::createMultiple(TblMeliput::classname(), $modelmeliput);
            Model::loadMultiple($modelmeliput, Yii::$app->request->post());
            $deletedIDs2 = array_diff($oldIDs2, array_filter(ArrayHelper::map($modelmeliput, 'id', 'id')));

            // ajax validation
           
            // validate all models
            $valid = $model->validate();
            $valid = Model::validateMultiple($modelmeliput);
            $valid = Model::validateMultiple($modeldetail) && $valid;

            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    
                    if ($flag = $model->save(false)) {
                        if (! empty($deletedIDs)) {
                           
                            TblDetailPinjamAlat::deleteAll(['id' => $deletedIDs]);
                            TblMeliput::deleteAll(['id'=>$deletedIDs2]);
                        }
                        foreach($modelmeliput as $liput){
                            $liput->id_pinjam_alat = $model->id;
                            if (!($flag = $liput->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                        $total = 0;
                         $update = Yii::$app->db->createCommand();
                        foreach ($modeldetail as $pinjam) {
                            $pinjam->id_pinjam = $model->id;
                            $update->update('tbl_alat', ['status'=>'Dipinjam'],'id=:id_alat',  [':id_alat'=>$pinjam->id_alat])->execute();
                            $total += $pinjam->banyak_alat;
                            if (! ($flag = $pinjam->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                        $model->jml_pinjam = $total;
                        $model->save(false);
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
            'acara'=>$acara,
            'modelmeliput' => (empty($modelmeliput)) ? [new TblMeliput()] : $modelmeliput ,
            'modeldetail' => (empty($modeldetail)) ? [new TblDetailPinjamAlat()] : $modeldetail,
            
        ]);
    }
    
    public function actionCancel($id,$idpinjam){
       
      
      if(($delete = TblMeliput::findOne($id)) !== NULL){
          $delete->delete();         
          
        
        return $this->redirect(['view', 'id'=>$idpinjam]);
                  
      }                 
          
    }
    
    public function actionCancelalat($id,$idpinjam){
        if(($delete = TblDetailPinjamAlat::findOne($id)) !== NULL){
            $delete->delete();
            
          
        
        return $this->redirect(['view','id'=>$idpinjam]);
            
            
        }
    }
    
    
    
    public function actionReport($id)
    {
        $model = $this->findModel($id);
       
        $modelpejabat = $model->idPejabat;
        $modeluser= $model->idUser;
        $modelpengguna = $model->idPengguna;
        $modelacara = $model->tblMeliputs;
        $modelpinjam = $model->tblDetailPinjamAlats;
        $content = $this->renderPartial('_report3',['model'=>$model,
            'modelpejabat'=>$modelpejabat, 'modeluser'=>$modeluser, 'modelacara'=>$modelacara,
            'modelpinjam'=>$modelpinjam,'modelpengguna'=>$modelpengguna,'n'=>1]);
        $pdf = Yii::$app->pdf; // or new Pdf();
        $mpdf = $pdf->api; // fetches mpdf api
        //$mpdf->SetHeader('Kartik Header'); // call methods or set any properties
        $mpdf->WriteHtml($content); // call mpdf write html
        echo $mpdf->Output(); 
    }

    /**
     * Deletes an existing TblPinjamAlat model.
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
     * Finds the TblPinjamAlat model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TblPinjamAlat the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel2($id)
    {
       
        
        if (($model2 = TblMeliput::findOne($id)) !== null){
            return $model2;
        }
    }


    protected function findModel($id)
    {
        if (($model = TblPinjamAlat::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    
        
  //  }
}
