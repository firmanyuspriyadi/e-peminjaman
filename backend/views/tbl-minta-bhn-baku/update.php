<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TblMintaBhnBaku */

$this->title = 'Update : ' . ' ' . $model->nmr_minta;
$this->params['breadcrumbs'][] = ['label' => 'Permintaan', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nmr_minta, 'url' => ['view', 'id' => $model->nmr_minta]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-minta-bhn-baku-update">

    

    <?= $this->render('_form', [
        'model' => $model,
        'mintadetail'=>$mintadetail,
    ]) ?>

</div>
