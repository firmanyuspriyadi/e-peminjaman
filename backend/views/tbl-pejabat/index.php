<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TblPejabatSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pejabat';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-pejabat-index">

   
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Pejabat', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'nip',
            'nama',
            'jabatan',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
