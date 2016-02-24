<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TblMintaBhnBakuSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-minta-bhn-baku-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'nmr_minta') ?>

    <?= $form->field($model, 'keperluan') ?>

    <?= $form->field($model, 'banyak') ?>

    <?= $form->field($model, 'tgl_minta') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
