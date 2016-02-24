<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TblBarangSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Barang';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-barang-index">

  
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Barang', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'nm_brg',
            'keterangan',
            [
                'label'=>'Kelompok Barang',
                'value'=>'idGrupBrg.kategori',
            ],
            //'id_grup_brg',
            [
                'label'=>'Kategori Barang',
                'value'=>'idKatBrg.nama_kat'
            ],
            //'id_kat_brg',
            // 'id_jns_brg',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
