<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\TblKasetLiputan */

$this->title = 'Create';
$this->params['breadcrumbs'][] = ['label' => 'Kaset Liputan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-kaset-liputan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'detailkaset'=>$detailkaset,
        'acara'=>$acara,
    ]) ?>

</div>
