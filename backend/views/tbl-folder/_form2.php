<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use yii\widgets\Pjax;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\TblPinjamAlat */
/* @var $form yii\widgets\ActiveForm */
?>


<div class="tbl-folder-form">
 
  <?php Pjax::begin([
    'id' => 'kaset-form-pjax ',
    'enablePushState' => false,
  ]); ?>
      <?php $form = ActiveForm::begin([
        'id'=>'kaset-form',
        'options' => ['data-pjax' => true ]
      ]); ?>
 
     <?= $form->field($detail,'kaset_id')->widget(Select2::className(),[
         'data'=> ArrayHelper::map($kaset,'nomor_kaset','nm_kategori'),
         'options'=>['prompt'=>'Pilih Kaset'],
         'pluginOptions'=>['allowClear'=>true],
     ]);?>
    
     
 
      <div class="form-group">
          <?= Html::submitButton('Tambah',
                  ['class' =>'btn btn-primary']); ?>
      </div>
 
      <?php ActiveForm::end(); ?>
 
      <?php
      $this->registerJs('
         $("#kaset-form-pjax").on("pjax:end", function() {
            url: "'.Url::to(["tbl-folder/tambah","id"=>$model->id]).'",
             $.pjax.reload("#pjax-kaset-gridview", {
               
               
               container: "#pjax-kaset-gridview",
               timeout: 3000,
               push: false,
               replace: false,
               
             });
            
         });
         
     ');
      ?>
  <?php Pjax::end(); ?>
</div>
