<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TblMskBrgSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Barang Masuk';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-msk-brg-index">

    
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Barang Masuk', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'jml_msk',
            'tgl_msk',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
