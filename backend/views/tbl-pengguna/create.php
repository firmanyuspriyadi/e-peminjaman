<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\TblPengguna */

$this->title = 'Kameramen';
$this->params['breadcrumbs'][] = ['label' => 'Kameramen', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-pengguna-create">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
