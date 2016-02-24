<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var backend\models\TblFolder $model
 */

$this->title = 'Update: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Folder', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-folder-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'detailfolder'=>$detailfolder,
    ]) ?>

</div>
