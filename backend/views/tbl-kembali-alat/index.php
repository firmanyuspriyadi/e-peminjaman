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
        'rowOptions'=>function($model){
            if($model->status_pinjaman=='Dipinjam'){
                return['class'=>'danger'];
            }
        },
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            
//            'jml_pinjam',
            'keperluan',
            'tgl_pinjam',
            
//            [
//              'attribute'  =>'id_user',
//                'value'=>'idUser.username'
//            ],
            [
              'attribute'  =>'id_pengguna',
                'value'=>'idPengguna.nama'
            ],
            // 'id_pejabat',
            // 
            'status_pinjaman',


            ['class' => 'yii\grid\ActionColumn',
                'template'=>'{print}',
                'header'=>'Action',
                'buttons'=>[
                        'print'=>function($url,$model)
                        {
                            if($model->status_pinjaman=='Dipinjam')
                            {
                                return HTML::a('Proses',['view','id'=>$model->id],['class'=>'btn btn-primary btn-print']);
                            }
                            
                        },
                        ],
            ],
            
        ],
    ]); ?>

</div>
