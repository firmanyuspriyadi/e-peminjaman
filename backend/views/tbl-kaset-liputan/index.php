<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TblKasetLiputanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kaset';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-kaset-liputan-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'nomor_kaset',
            'nm_kategori',
            'input_date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
