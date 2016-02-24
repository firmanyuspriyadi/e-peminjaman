<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var backend\models\TblKatBrg $model
 */

$this->title = 'Create';
$this->params['breadcrumbs'][] = ['label' => 'Kategori', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-kat-brg-create">
    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
