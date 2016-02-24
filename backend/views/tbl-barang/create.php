<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\TblBarang */

$this->title = 'Create';
$this->params['breadcrumbs'][] = ['label' => 'Barang', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-barang-create">

  
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
