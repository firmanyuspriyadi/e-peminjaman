<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var backend\models\TblAcaraSearch $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="tbl-acara-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'jns_acara') ?>

    <?= $form->field($model, 'nm_acara') ?>

    <?= $form->field($model, 'tgl_acara') ?>

    <?= $form->field($model, 'jam_acara') ?>

    <?php // echo $form->field($model, 'tmpt_acara') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
