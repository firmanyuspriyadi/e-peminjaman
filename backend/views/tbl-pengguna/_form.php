<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TblPengguna */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-pengguna-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= yii\widgets\MaskedInput::widget([
        'model'=>$model,
        'attribute'=>'nip',
        'name'=>'NIP',
        'mask'=>'999999999'
    ]);?>
    
    

    <?= $form->field($model, 'nama')->textInput(['style'=>'width: 300px']) ?>

    <?= $form->field($model, 'pangkat')->textInput(['style'=>'width: 100px']) ?>

    <?= $form->field($model, 'golongan')->textInput(['style'=>'width: 150px']) ?>

    <?= $form->field($model, 'jabatan')->textInput(['style'=>'width: 300px']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
