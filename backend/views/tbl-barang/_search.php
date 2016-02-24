<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TblBarangSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-barang-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'nm_brg') ?>

    <?= $form->field($model, 'keterangan') ?>

    <?= $form->field($model, 'id_grup_brg') ?>

    <?= $form->field($model, 'id_kat_brg') ?>

    <?php // echo $form->field($model, 'id_jns_brg') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
