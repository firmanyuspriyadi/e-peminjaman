<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var backend\models\TblAlat $model
 */

$this->title = 'Create Alat Liputan';
$this->params['breadcrumbs'][] = ['label' => 'Alat Liputan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-alat-create">
   
    <?= $this->render('_form', [
        'model' => $model,
        'modelpart'=>$modelpart,
    ]) ?>

</div>
