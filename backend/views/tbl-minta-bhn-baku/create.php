<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\TblMintaBhnBaku */

$this->title = 'Create';
$this->params['breadcrumbs'][] = ['label' => 'Permintaan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-minta-bhn-baku-create">

   

    <?= $this->render('_form', [
        'model' => $model,
        'mintadetail'=>$mintadetail,
    ]) ?>

</div>
