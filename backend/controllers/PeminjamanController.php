<?php

namespace backend\controllers;

use Yii;
use backend\models\TblPinjamAlat;
use backend\models\TblPinjamAlatSearch;
use yii\web\NotFoundHttpException;

use yii\web\Controller;

use yii\filters\VerbFilter;



/**
 * TblPinjamAlatController implements the CRUD actions for TblPinjamAlat model.
 */
class PeminjamanController extends Controller
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
       $searchModel = new TblPinjamAlatSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
       
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
    
    protected function findModel($id)
    {
        if (($model = TblPinjamAlat::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
   
    /**
     * Displays a single TblPinjamAlat model.
     * @param integer $id
     * @return mixed
     */
   
    
    
    
        
  //  }
}
