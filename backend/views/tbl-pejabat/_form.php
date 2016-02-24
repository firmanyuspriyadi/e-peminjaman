<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TblPejabat */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-pejabat-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= yii\widgets\MaskedInput::widget([
        'model'=>$model,
        'attribute'=>'nip',
        'name'=>'NIP',
        'mask'=>'999999999',
       
        ]
       
    );?>

    

    <?= $form->field($model, 'nama')->textInput(['style'=>'width: 400px']) ?>

    <?= $form->field($model, 'jabatan')->textInput(['style'=>'width: 400px']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
