<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use yii\bootstrap\Modal;
use yii\widgets\Pjax;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\TblMskBrg */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Barang Masuk', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-msk-brg-view">

    

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
            'jml_msk',
            'tgl_msk',
        ],
    ]) ?>
    <br>
    <br>
    <?= Html::button('Tambah Barang',['value'=>Url::to(['tambah','id'=>$model->id]),'id'=>'modalButton9','class'=>'btn btn-success'])?>
    <?php 
        Modal::begin([
            'header'=>"<h4>Tambah Barang</h4>",
            'id'=>'modal9',
            'size'=>'modal-sm',
        ]);
        echo "<div id='modalContent9'></div>";
        Modal::end();
    ?>
    <br>
    <br>
    <?php Pjax::begin([
        'id'=>'pjax-barang',
        'enablePushState'=>false
    ]);?>
        <?= GridView::widget([
            'dataProvider'=>$barangProvider,
            'columns'=>[
                ['class'=>'yii\grid\SerialColumn'],
                [
                    'label'=>'Nama Barang',
                    'value'=>'namaBarang',
                ],
                [
                    'label'=>'Satuan',
                    'value'=>'satuan',
                ],
                'banyaknya',
                ['class'=>'yii\grid\ActionColumn',
                    'template'=>'{cancel}',
                    'header'=>'Action',
                    'buttons'=>[
                        'cancel'=>function($url,$model){
                            return Html::a('Cancel',['cancel','id'=>$model->id,'idmasuk'=>$model->id_masuk_brg],['class'=>'btn btn-primary btn-min']);
                        }
                    ],
                ],
            ]
        ]);?>
    <?php Pjax::end();?>
    
</div>
