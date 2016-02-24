<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var backend\models\TabelRak $model
 */

$this->title = 'Create';
$this->params['breadcrumbs'][] = ['label' => 'Rak', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tabel-rak-create">
    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
