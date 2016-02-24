<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TblPinjamAlatSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Peminjaman Alat';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-pinjam-alat-index">

   
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

   

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
//        'rowOptions'=>function($model){
//            if($model->status_pinjaman=='Dipinjam'){
//                return['class'=>'danger'];
//            }
//        },
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            
//            'jml_pinjam',
            'keperluan',
            [
              'label'=>'Tanggal Pinjam',
                'attribute'=>'tglpinjam'
            ],
            'tgl_balikin',
            
//            [
//              'attribute'  =>'id_user',
//                'value'=>'idUser.username'
//            ],
            [
              'attribute'  =>'id_pengguna',
                'value'=>'pengguna'
            ],
            // 'id_pejabat',
            // 
            

            ['class' => 'yii\grid\ActionColumn',
                'template'=>'{print}',
                'header'=>'Action',
                'buttons'=>[
                    'print'=>function($url,$model){
                    return HTML::a('Cetak',['report','id'=>$model->id],['class'=>'btn btn-primary btn-print']);
                            },
                        ],
            ],
            
        ],
    ]); ?>

</div>
