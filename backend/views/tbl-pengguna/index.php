<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TblPenggunaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kameramen';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-pengguna-index">

    
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Kameramen', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'nip',
            'nama',
            'pangkat',
            'golongan',
            'jabatan',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
