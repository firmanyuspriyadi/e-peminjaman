<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TblAlatSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Stok Alat';
$this->params['breadcrumbs'][] = $this->title;

$this->registerJs('
        var gridview_id = ""; // specific gridview
        var columns = [2]; // index column that will grouping, start 1
 
        /*
        DON\'T EDIT HERE
 

 
        */
        var column_data = [];
            column_start = [];
            rowspan = [];
 
        for (var i = 0; i < columns.length; i++) {
            column = columns[i];
            column_data[column] = "";
            column_start[column] = null;
            rowspan[column] = 1;
        }
 
        var row = 1;
        $(gridview_id+" table > tbody  > tr").each(function() {
            var col = 1;
            $(this).find("td").each(function(){
                for (var i = 0; i < columns.length; i++) {
                    if(col==columns[i]){
                        if(column_data[columns[i]] == $(this).html()){
                            $(this).remove();
                            rowspan[columns[i]]++;
                            $(column_start[columns[i]]).attr("rowspan",rowspan[columns[i]]);
                        }
                        else{
                            column_data[columns[i]] = $(this).html();
                            rowspan[columns[i]] = 1;
                            column_start[columns[i]] = $(this);
                        }
                    }
                }
                col++;
            })
            row++;
        });
    ');

?>
<div class="tbl-alat-index">

    
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Alat Liputan', ['create'], ['class' => 'btn btn-success']) ?>
         <?= Html::a('Kondisi Alat Liputan', ['kondisi'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Status Alat Liputan', ['status'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute'=>'id_jns_alat',
                'value'=>'idJnsAlat.merk',
                
            ],
            [
                'attribute'=>'id_model_alat',
                'value'=>'idModelAlat.nama_model',
                
            ],
            
           
            'nm_alat',
            'no_seri',
            // 'kondisi',
            // 'tgl_terima',
            // 'tahun_buat',
            // 'banyak',
            // 'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
