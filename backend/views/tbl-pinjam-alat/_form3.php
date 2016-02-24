<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use yii\widgets\Pjax;
use yii\helpers\url;

?>
<div class="tbl-tambah-alat-form">
    
    <?php Pjax::begin([
    'id' => 'pjax-tambah-alat',
    'enablePushState' => false,
  ]); ?>
    
    <?php $form = ActiveForm::begin([
        'id'=>'alat-form',
        'options'=>['data-pjax'=>true]
    ]);?>
    
    <?= $form->field($detailpinjam, 'id_alat')->widget(Select2::className(),[
        'data'=>  ArrayHelper::map($tambah, 'id','nm_alat'),
        'options'=>['prompt'=>'Pilih Alat'],
        'pluginOptions'=>[
            'allowClear'=>true,
        ],
    ]);?>
    
    <div class="formGroup">
        <?= Html::submitButton('Tambah', 
            ['class'=>'btn btn-primary']);
            ?>
    </div>
    
    <?php ActiveForm::end();?>
    
    <?php
      $this->registerJs('
         $("#pjax-tambah-alat").on("pjax:end", function() {
            url: "'.Url::to(["tbl-pinjam-alat/tambah2","id"=>$model->id]).'",
             $.pjax.reload("#pjax-alat-gridview", {
               
               
               container: "#pjax-alat-gridview",
               timeout: 3000,
               push: false,
               replace: false,
               
             });
            
         });
         
     ');
      ?>
    
   <?php Pjax::end();?>
    
</div>
