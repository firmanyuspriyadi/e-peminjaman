<?php

namespace backend\controllers;

use Yii;

use backend\models\TblMintaBhnBaku;
use backend\models\TblMintaBhnBakuSearch;
use yii\web\NotFoundHttpException;

use yii\web\Controller;

use yii\filters\VerbFilter;



/**
 * TblPinjamAlatController implements the CRUD actions for TblPinjamAlat model.
 */
class PermintaanController extends Controller
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
       $searchModel = new TblMintaBhnBakuSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
       
    }
    
    public function actionReport($id)
    {
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
    
    protected function findModel($id)
    {
        if (($model =TblMintaBhnBaku::findOne($id)) !== null) {
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
