<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use yii\widgets\Pjax;
use yii\helpers\Url

/* @var $this yii\web\View */
/* @var $model backend\models\TblPinjamAlat */
/* @var $form yii\widgets\ActiveForm */
?>


<div class="tbl-kaset-liputan-form">
    
    <?php Pjax::begin([
    'id' => 'acara-form-pjax',
    'enablePushState' => false,
  ]); ?>

     <?php $form = ActiveForm::begin(['id'=>'acara-form',
         'options' => ['data-pjax' => true ]
         ]); ?>

    
    <?= $form->field($tabeldetail, 'id_acara')->widget(Select2::className(),[
        'data'=>  ArrayHelper::map($acara, 'id','nm_acara'),
        'options'=>['prompt'=>'Pilih Acara'],
        'pluginOptions'=>[
            'allowClear'=>true,
        ],
    ]);?>

    <div class="form-group">
        <?= Html::submitButton('tambah',['class'=>'btn btn-primary']); ?>       
        
    </div>

    <?php ActiveForm::end(); ?>
    
      <?php
      $this->registerJs('
         $("#acara-form-pjax").on("pjax:end", function() {
            url: "'.Url::to(["tbl-kaset-liputan/tambah","id"=>$model->nomor_kaset]).'",
             $.pjax.reload("#pjax-acara-gridview", {
               
               
               container: "#pjax-acara-gridview",
               timeout: 3000,
               push: false,
               replace: false,
               
             });
            
         });
         
     ');
      ?>
  <?php Pjax::end(); ?>

</div>
