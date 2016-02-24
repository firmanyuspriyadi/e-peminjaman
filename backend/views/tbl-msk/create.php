<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\TblMskBrg */

$this->title = 'Create Barang Masuk';
$this->params['breadcrumbs'][] = ['label' => 'Barang Masuk', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-msk-brg-create">

   

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
