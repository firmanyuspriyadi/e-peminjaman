<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\TblMintaBhnBaku */

$this->title = $model->nmr_minta;
$this->params['breadcrumbs'][] = ['label' => 'Permintaan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-minta-bhn-baku-view">
    
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->nmr_minta], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->nmr_minta], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'nmr_minta',
            'keperluan',
            'banyak',
            'tgl_minta',
        ],
    ]) ?>
    <p>
        <?= Html::a('Generate Report',['report','id'=>$model->nmr_minta],['class'=>'btn btn-primary',"target"=>"_blank"]);?>
    </p>

</div>
