<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TblPengguna */

$this->title = 'Update: ' . ' ' . $model->nip;
$this->params['breadcrumbs'][] = ['label' => 'Kameramen', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nip, 'url' => ['view', 'id' => $model->nip]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-pengguna-update">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
