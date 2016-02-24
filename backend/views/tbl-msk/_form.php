<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TblMskBrg */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-msk-brg-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'jml_msk')->textInput() ?>

    <?= $form->field($model, 'tgl_msk')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
