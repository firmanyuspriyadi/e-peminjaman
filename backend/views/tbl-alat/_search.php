<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var backend\models\TblAlatSearch $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="tbl-alat-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_kat_alat') ?>

    <?= $form->field($model, 'id_jns_alat') ?>

    <?= $form->field($model, 'id_model_alat') ?>

    <?= $form->field($model, 'nm_alat') ?>

    <?php // echo $form->field($model, 'no_seri') ?>

    <?php // echo $form->field($model, 'kondisi') ?>

    <?php // echo $form->field($model, 'tgl_terima') ?>

    <?php // echo $form->field($model, 'tahun_buat') ?>

    <?php // echo $form->field($model, 'banyak') ?>

    <?php // echo $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
