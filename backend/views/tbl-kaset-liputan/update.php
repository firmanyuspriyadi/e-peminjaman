<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TblKasetLiputan */

$this->title = 'Update: ' . ' ' . $model->nomor_kaset;
$this->params['breadcrumbs'][] = ['label' => 'Kaset Liputan', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nomor_kaset, 'url' => ['view', 'id' => $model->nomor_kaset]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-kaset-liputan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'detailkaset'=>$detailkaset,
        'acara'=>$acara
    ]) ?>

</div>
