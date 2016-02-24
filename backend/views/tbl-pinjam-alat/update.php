<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TblPinjamAlat */

$this->title = 'Update: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Peminjaman', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-pinjam-alat-update">

    

    <?= $this->render('_form', [
        'model' => $model,
        'modelmeliput'=>$modelmeliput,
        'modeldetail'=>$modeldetail,
    ]) ?>

</div>
