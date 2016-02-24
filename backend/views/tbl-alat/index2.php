<?php

use yii\helpers\Html;

use kartik\grid\GridView;

use kartik\editable\Editable;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TblAlatSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kondisi Alat';
$this->params['breadcrumbs'][] = $this->title;



?>
<div class="tbl-alat-index">

    
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Alat Liputan', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Stok Alat Liputan', ['index'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Status Alat Liputan', ['status'], ['class' => 'btn btn-success']) ?>
    </p>

    <?=    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,

        'rowOptions'=>function ($model){
            if($model->kondisi == 'Rusak')
            {
                return['class'=>'danger'];
            }else{
                return['class'=>'info'];
            }
        },
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],

            [
                'attribute'=>'id_jns_alat',
                'value'=>'idJnsAlat.merk',
                'vAlign'=>'middle',
                
            ],
            [
                'attribute'=>'id_kat_alat',
                'value'=>'idKatAlat.kat_alat',
                'vAlign'=>'middle',
                
            ],
            [
                'attribute'=>'id_model_alat',
                'value'=>'idModelAlat.nama_model',
                'vAlign'=>'middle',
                
            ],
            
           
            'nm_alat',
            'no_seri',
            [
               'class'=>'kartik\grid\EditableColumn',
                'attribute'=>'kondisi',
                'editableOptions'=>function($model,$key,$index){
                    return [
                        'header'=>'Kondisi',
                        'inputType'=>Editable::INPUT_DROPDOWN_LIST,
                        'data'=>[ 'Baik' => 'Baik', 'Rusak' => 'Rusak', ],
                        'options'=>['class'=>'form-control', 'prompt'=>'Select Kondisi .. '],
                        'editableValueOptions'=>['class'=>'text-danger'],
                    ];
                },
            ],
            
             'tgl_terima',
            // 'tahun_buat',
            // 'banyak',
            // 'status',

            ['class' => 'kartik\grid\ActionColumn'],
        ],
    ]); ?>

</div>
