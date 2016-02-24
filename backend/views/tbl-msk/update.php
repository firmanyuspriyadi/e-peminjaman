<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TblMskBrg */

$this->title = 'Update Barang Masuk : ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Barang Masuk', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-msk-brg-update">
   
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
