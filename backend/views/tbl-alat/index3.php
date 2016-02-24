<?php

use yii\helpers\Html;

use yii\grid\GridView;


/* @var $this yii\web\View */
/* @var $searchModel backend\models\TblAlatSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Status Alat Liputan';
$this->params['breadcrumbs'][] = $this->title;


?>
<div class="tbl-alat-index">

    
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Alat Liputan', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Stok Alat Liputan', ['index'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Kondisi Alat', ['kondisi'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'rowOptions'=>function($model){
                if($model->status =='Dipinjam')
                {
                    return['class'=>'success'];
                }
                             
        },
        
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'id',
             [
              'attribute'  =>'id_jns_alat',
                'value'=>'idJnsAlat.merk'
            ],
            /**
            [
                'attribute'=>'id_kat_alat',
                'value'=>'idKatAlat.kat_alat'
            ],
             * 
             */
                      
            
            [
                'attribute'=>'id_model_alat',
                'value'=>'idModelAlat.nama_model'
            ],
            
            
            
            'nm_alat',
             'no_seri',
            // 'kondisi',
           //  'tgl_terima',
            //'tahun_buat',
           // 'banyak',
            'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    

</div>
