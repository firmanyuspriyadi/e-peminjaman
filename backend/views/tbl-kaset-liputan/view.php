<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use yii\widgets\Pjax;


/* @var $this yii\web\View */
/* @var $model backend\models\TblKasetLiputan */

$this->title = $model->nomor_kaset;
$this->params['breadcrumbs'][] = ['label' => 'Kaset liputan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-kaset-liputan-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        
        <?= Html::a('Delete', ['delete', 'id' => $model->nomor_kaset], [
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
            'nomor_kaset',
            'nm_kategori',
            'input_date',
        ],
    ]) ?>
    <br>
    <br>
  <?= Html::button('Tambah',['value'=>Url::to(['tambah','id'=>$model->nomor_kaset]),'id'=>'modalButton8','class'=>'btn btn-success']);?>

    <?php Modal::begin([
      'id'  =>'modal8',
        'size'=>'modal-sm',
        'header'=>'<h4>Tambah Acara</h4>'
    ]);
    echo "<div id='modalContent8'></div>";
    Modal::end();

   ?>
    <br>
    <br>
    <?php Pjax::begin([
    'id' => 'pjax-acara-gridview',
    'enablePushState' => false,
  ]); ?>
    <?= \yii\grid\GridView::widget([
        'dataProvider'=>$kasetProvider,
        'columns'=>[
            ['class'=>'yii\grid\SerialColumn'],
            //'nm__acara',
            [
                'label'=>'Nama Acara',
                'value'=>'namaAcara'
            ],
            [
                'label'=>'Pukul',
                'value'=>'jamAcara'
            ],
            [
                'label'=>'Tempat',
                'value'=>'tempatAcara'
            ],
            ['class'=>'yii\grid\ActionColumn',
                'template'=>'{cancel}',
                'header'=>'Action',
                'buttons'=>[
                    'cancel'=>function($url,$model){
                        return Html::a('Cancel',['cancel','id'=>$model->id,'nomor_kaset'=>$model->nomor_kaset],['class'=>'btn btn-primary btn-min']);
                    }
                ],
            ],
        ],
    ]);
     ?>
    <?php Pjax::end(); ?>  
    

</div>
