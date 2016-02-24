<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TblMintaBhnBakuSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Permintaan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-minta-bhn-baku-index">

    
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

   

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'nmr_minta',
            'keperluan',
            //'banyak',
           // 'tgl_minta',

            ['class' => 'yii\grid\ActionColumn',
            'template'=>'{print}',
            'header'=>'Action',
            'buttons'=>[
                'print'=>function($url,$model){
                    return HTML::a('Print',['report','id'=>$model->nmr_minta],['class'=>'btn btn-primary btn-print','target'=>"_blank"]);
                }
            ]
            ],
        ],
    ]); ?>

</div>
