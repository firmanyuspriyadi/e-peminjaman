<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var backend\models\TblArsip $model
 */

$this->title = 'Update: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Arsip', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-arsip-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
