<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use yii\widgets\Pjax;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\MskBrg */
/* @var $form yii\widgets\ActiveForm */
?>


<div class="tbl-masuk-barang-form">
 
  <?php Pjax::begin([
    'id' => 'barang-form-pjax',
    'enablePushState' => false,
  ]); ?>
      <?php $form = ActiveForm::begin([
        'id'=>'barang-form',
        'options' => ['data-pjax' => true ]
      ]); ?>
 
      <?= $form->field($detailmasuk, 'id_brg')->widget(Select2::className(),[
        'data'=>  ArrayHelper::map($tambah, 'id','nm_brg'),
        'options'=>['prompt'=>'Pilih Barang'],
 
        'pluginOptions'=>['allowClear'=>true,],
      ]);?>
    
    <?= $form->field($detailmasuk, 'banyaknya')->textInput();?>
    <?= $form->field($detailmasuk,'tahun_pembelian')->textInput();?>
    
 
      <div class="form-group">
          <?= Html::submitButton('Tambah',
                  ['class' =>'btn btn-primary']); ?>
      </div>
 
      <?php ActiveForm::end(); ?>
 
      <?php
      $this->registerJs('
         $("#barang-form-pjax").on("pjax:end", function() {
            url: "'.Url::to(["tbl-msk-brg/tambah","id"=>$model->id]).'",
             $.pjax.reload("#pjax-barang", {
               
               
               container: "#pjax-barang",
               timeout: 3000,
               push: false,
               replace: false,
               
             });
            
         });
         
     ');
      ?>
  <?php Pjax::end(); ?>
</div>
