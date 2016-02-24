<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var backend\models\TblJnsBrg $model
 */

$this->title = 'Create';
$this->params['breadcrumbs'][] = ['label' => 'Jenis Barang', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-jns-brg-create">
    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
