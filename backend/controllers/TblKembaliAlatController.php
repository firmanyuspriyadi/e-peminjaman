<?php

namespace backend\controllers;

use Yii;
use backend\models\TblKembaliAlat;
use backend\models\TblKembaliAlatSearch;
use backend\models\TblPinjamAlatSearch;
use backend\models\TblMeliput;
use backend\models\TblPinjamAlat;
use backend\models\TblDetailPinjamAlat;
use backend\models\TblDetailKembaliAlat;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use yii\helpers\ArrayHelper;

/**
 * TblKembaliAlatController implements the CRUD actions for TblKembaliAlat model.
 */
class TblKembaliAlatController extends Controller {

    public function behaviors() {
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
     * Lists all TblKembaliAlat models.
     * @return mixed
     */
    public function actionIndex() {
       $searchModel = new TblPinjamAlatSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TblKembaliAlat model.
     * @param integer $id
     * @return mixed
     */
    
    public function actionKembali($id){
        
      
            $dbtransaction = \Yii::$app->db->beginTransaction();
            try{
                $update2 = Yii::$app->db->createCommand();
                $update2->update('tbl_pinjam_alat',['status_pinjaman'=>'Kembali'],'id=:id_pinjam',[':id_pinjam'=>$id])->execute();
                
                    $keterangan = \backend\models\TblPinjamAlat::findOne($id);
                    $kembali = new \backend\models\TblKembaliAlat();
                    $kembali->id_pinjam = $keterangan->id;
//                    $kembali->id_user= Yii::$app->user->identity->id;
                    $kembali->id_pengguna = $keterangan->id_pengguna;
                    
                    if ($flag = $kembali->save(false)){
                       
                        $detailpinjam = \backend\models\TblDetailPinjamAlat::find()->where(['id_pinjam'=>$id])->all();
                        foreach ($detailpinjam as $pinjam){
                           
                            $detailkembali = new TblDetailKembaliAlat();
                            
                            $detailkembali->id_kembali_alat = $kembali->id;
                            $detailkembali->id_alat = $pinjam->id_alat;
                            $detailkembali->banyak_alat = $pinjam->banyak_alat;
                            $detailkembali->keterangan_alat = $pinjam->ket_alat;
                            if(!($flag= $detailkembali->save(false))){
                                $dbtransaction->rollBack();
                                break;
                            }
                        }
                      
                    }
               // }
                if ($flag){
                    $dbtransaction->commit();
                    return $this->redirect(["/tbl-kembali-alat/view2",'id'=>$kembali->id]);                    
                }
                        
            } catch (Exception $ex) {
                    $dbtransaction->rollBack();
            }
            return $this->redirect(["/tbl-kembali-alat/view2",'id'=>$kembali->id]);
           
        }
    
    public function actionView($id){
        $acara = TblMeliput::find()->where(['id_pinjam_alat'=>$id])->all();
        $alat = TblDetailPinjamAlat::find()->where(['id_pinjam'=>$id])->all();
        
        return $this->render('view', [
            'model' => $this->findModel3($id),
            'acara'=>$acara,
            'alat'=>$alat,
        ]);
    }
    
    protected function findModel3($id)
    {
        if (($model = TblPinjamAlat::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
        
        
    public function actionView2($id) {
        //ini id kembali alat
        $model = $this->findModel($id);
        
        //ini id kembali alat 
        $modelkembali = TblDetailKembaliAlat::find()->where(['id_kembali_alat' => $model->id]);


        if (Yii::$app->request->post('hasEditable')) {
            $alatId = Yii::$app->request->post('editableKey');


            $posted = Yii::$app->request->post('TblDetailKembaliAlat');

            foreach ($posted as $post) {
                $ket = $post['keterangan_alat'];
                $model3 = TblDetailKembaliAlat::findOne($alatId);
                $model3->keterangan_alat = $ket;
                $model3->save();
            }
            $out = Json::encode(['output' => '', 'message' => '']);


            echo $out;
            return;
        }

        return $this->render('kembali', [
                    'model' => $model,
                    'modelKembali' => $modelkembali,
                        // 'modelKembali'=>$modelKembali,
        ]);
    }

    /**
     * Creates a new TblKembaliAlat model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new TblKembaliAlat();
        $searchModel = new TblKembaliAlatSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                        'model' => $model,
                        'searchModel' => $searchModel,
                        'dataProvider' => $dataProvider,
            ]);
        }
    }

    /**
     * Updates an existing TblKembaliAlat model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
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
     * Deletes an existing TblKembaliAlat model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TblKembaliAlat model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TblKembaliAlat the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = TblKembaliAlat::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    

}
