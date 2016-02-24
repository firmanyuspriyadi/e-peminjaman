<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TblBarang */

$this->title = 'Update: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Barang', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-barang-update">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
