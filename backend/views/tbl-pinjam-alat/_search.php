<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TblPinjamAlatSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-pinjam-alat-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'tgl_pinjam') ?>

    <?= $form->field($model, 'jml_pinjam') ?>

    <?= $form->field($model, 'keperluan') ?>

    <?= $form->field($model, 'id_user') ?>

    <?php // echo $form->field($model, 'id_pejabat') ?>

    <?php // echo $form->field($model, 'id_pengguna') ?>

    <?php // echo $form->field($model, 'status_pinjaman') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
