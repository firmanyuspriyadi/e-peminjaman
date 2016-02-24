<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\TblBarang */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Barang', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-barang-view">

   

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
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
            'id',
            'nm_brg',
            'keterangan',
            [
                'label'=>'Kelompok Barang',
                'value'=>$model->idGrupBrg->kategori,
            ],
            [
                'label'=>'Kategori Barang',
                'value'=>$model->idKatBrg->nama_kat,
            ],
            [
                'label'=>'Jenis Barang',
                'value'=>$model->idJnsBrg->nama_jns_brg,
            ],
            
            
        ],
    ]) ?>

</div>