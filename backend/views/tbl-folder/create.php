<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var backend\models\TblFolder $model
 */

$this->title = 'Create';
$this->params['breadcrumbs'][] = ['label' => 'Folder', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-folder-create">
    <div class="page-header">
        
    </div>
    <?= $this->render('_form', [
        'model' => $model,
        'detailfolder'=>$detailfolder,
        'kasetliputan'=>$kasetliputan
    ]) ?>

</div>
