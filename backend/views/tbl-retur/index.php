<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TblReturSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Retur';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-retur-index">

    
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Retur', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'id',
            'nmr_minta',
            'jumlah_kmbl',
            'tgl_kembali',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
