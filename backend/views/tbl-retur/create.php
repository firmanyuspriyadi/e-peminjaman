<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\TblRetur */

$this->title = 'Create Retur';
$this->params['breadcrumbs'][] = ['label' => 'Retur', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-retur-create">

  

    <?= $this->render('_form', [
        'model' => $model,
        'detailRetur'=>$detailRetur,
    ]); ?>

</div>
