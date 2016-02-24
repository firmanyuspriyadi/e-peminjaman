<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\TblPejabat */

$this->title = 'Create';
$this->params['breadcrumbs'][] = ['label' => 'Pejabat', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-pejabat-create">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
