<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use yii\bootstrap\Modal;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model backend\models\TblPinjamAlat */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Peminjaman', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-pinjam-alat-view">
    
    

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
       
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'tgl_pinjam',
            'jml_pinjam',
            'keperluan',
           
            [
              'label'  =>'User',
                'attribute'=>'idUser.username'
            ],
            [
                'label'=>'Pejabat',
                'attribute'=>'idPejabat.nama',
            ],
            [
                'label'=>'Pengguna',
                'attribute'=>'idPengguna.nama'
            ],            
            
            'status_pinjaman',
        ],
    ]) ?>
    <br>
    <br>
     <?= Html::button('Tambah Acara', ['value'=>Url::to(['tambah','id'=>$model->id]),'id'=>'modalButton','class'=>'btn btn-success'])?>
    <?php
        Modal::begin([
            'header'=>'<h4>Tambah Acara</h4>',
            'id'=>'modal',
            'size'=>'modal-sm',
        ]);
        echo "<div id='modalContent'></div>";
        Modal::end();
    ?>
    <br>
    <br>
    <?php Pjax::begin([
    'id' => 'pjax-acara-gridview',
    'enablePushState' => false,
  ]); ?>
    <?= \yii\grid\GridView::widget([
        'dataProvider'=>$acaraProvider,
        'columns'=>[
            ['class'=>'yii\grid\SerialColumn'],
            //'nm__acara',
            [
                'label'=>'Nama Acara',
                'value'=>'namaAcara'
            ],
            [
                'label'=>'Pukul',
                'value'=>'pukul'
            ],
            [
                'label'=>'Tempat',
                'value'=>'tempat'
            ],
            ['class'=>'yii\grid\ActionColumn',
                'template'=>'{cancel}',
                'header'=>'Action',
                'buttons'=>[
                    'cancel'=>function($url,$model){
                        return Html::a('Cancel',['cancel','id'=>$model->id,'idpinjam'=>$model->id_pinjam_alat],['class'=>'btn btn-primary btn-min']);
                    }
                ],
            ],
        ],
    ]);
     ?>
    <?php Pjax::end(); ?>  
    
    
    <?= Html::button('Tambah Alat',['value'=>Url::to(['tambah2','id'=>$model->id]),'id'=>'modalButton3','class'=>'btn btn-success']);?>
     <?php
        Modal::begin([
            'header'=>'<h4>Tambah Alat</h4>',
            'id'=>'modal3',
            'size'=>'modal-sm',
        ]);
        echo "<div id='modalContent3'></div>";
        Modal::end();
    ?>
    <?php Pjax::begin([
    'id' => 'pjax-alat-gridview',
    'enablePushState' => false,
    ]); ?>
    <br>
    <?= \yii\grid\GridView::widget([
        'dataProvider'=>$alatProvider,
        
        'columns'=>[
            ['class'=>'yii\grid\SerialColumn'],
            [
              'label'  =>'Nama Alat',
                'value'=>'namaAlat'
            ],
            [
                'label'=>'Banyaknya',
                'value'=>'banyak_alat'
            ],
            ['class'=>'yii\grid\ActionColumn',
                'template'=>'{cancel}',
                'header'=>'Action',
                'buttons'=>[
                    'cancel'=>function($url,$model){
                        return Html::a('Cancel',['cancelalat','id'=>$model->id,'idpinjam'=>$model->id_pinjam],['class'=>'btn btn-primary btn0min']);
                    }
                ],
             ],
        ],
    ]);?>
    <?php Pjax::end();?>
    
    
 
</div>
