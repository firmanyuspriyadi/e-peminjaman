<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TblRetur */

$this->title = 'Update Retur: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Retur', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-retur-update">

    
    <?= $this->render('_form', [
        'model' => $model,
        'detailRetur'=>$detailRetur
    ]) ?>

</div>
