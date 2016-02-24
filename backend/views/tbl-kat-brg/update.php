<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var backend\models\TblKatBrg $model
 */

$this->title = 'Update : ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Kategori Barabg', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-kat-brg-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
