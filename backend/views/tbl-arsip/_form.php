<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use yii\helpers\ArrayHelper;

use kartik\select2\Select2;


/**
 * @var yii\web\View $this
 * @var backend\models\TblArsip $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="tbl-arsip-form">
    
    <?php $form = ActiveForm::begin();?>
    
    <?= $form->field($model, 'id_folder')->widget(Select2::className(),[
        'data'=> ArrayHelper::map(backend\models\TblFolder::find()->all(),'id','nama_folder'),
        'pluginOptions'=>[
            'allowClear'=>true,
            'placeholder'=>'Pilih folder'
            ],
    ]);?>
    
    <?= $form->field($model,'id_rak')->widget(Select2::className(), [
        'data'=>  ArrayHelper::map(\backend\models\TabelRak::find()->all(),'id','nama_rak'),
        'pluginOptions'=>[
            'allowClear'=>true,
            'placeholder'=>'Pilih Rak'
        ]
    ]);?>
    
    <?= $form->field($model,'input_date')->textInput(['length'=>360]);?>
    
    <?= $form->field($model,'keterangan')->textInput(['length'=>360]);?>

   


</div>
