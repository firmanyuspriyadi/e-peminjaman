<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var backend\models\TblAcara $model
 */

$this->title = 'Create';
$this->params['breadcrumbs'][] = ['label' => 'Acara', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-acara-create">
    
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
