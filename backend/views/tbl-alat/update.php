<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var backend\models\TblAlat $model
 */

$this->title = 'Update Alat Liputan: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Alat Liputan', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-alat-update">

    

    <?= $this->render('_form2', [
        'model' => $model,
        'modelpart'=>$modelpart,
    ]) ?>

</div>
