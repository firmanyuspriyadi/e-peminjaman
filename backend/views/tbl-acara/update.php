<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var backend\models\TblAcara $model
 */

$this->title = 'Update: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Acara', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-acara-update">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
