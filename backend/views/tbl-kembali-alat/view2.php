<?php

use yii\helpers\Html;

use yii\widgets\DetailView;
use kartik\grid\GridView;
use kartik\editable\Editable;
use yii\data\ActiveDataProvider;


/* @var $this yii\web\View */
/* @var $model backend\models\TblKembaliAlat */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Alat Kembali', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-kembali-alat-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
       
    </p>

    <?=    DetailView::widget([
        'model'=>$model,
        'attributes'=>[
            'id_pinjam',
            'id_user',
            'id_pengguna'
        ],
    ]);
        
    ?>
    
    
    <h4>Peralatan Yang Dipinjam</h4>
    <h5>(Untuk merubah kondisi alat yang dipinjam, klik pada kolom kondisi alat lalu rubah sesuai yang di inginkan)</h5>
    <?= GridView::widget([
        'dataProvider'=> new ActiveDataProvider([
            //'query'=>$model->getTblDetailKembaliAlats()->with('idAlat'),
            'query'=>$modelKembali,
            'pagination'=>false,
        ]),
        'columns'=> [
            ['class'=> \yii\grid\SerialColumn::className()],
            'idAlat.nm_alat',
            [
                'header'=>'Kondisi Alat',
                'class'=> 'kartik\grid\EditableColumn',
                'attribute'=>'keterangan_alat',
                'editableOptions'=>function($model,$key,$index){
                    return [
                        'header'=>'Kondisi Alat',
                        'inputType'=>  Editable::INPUT_DROPDOWN_LIST,
                        'data'=>['Baik'=>'Baik', 'Rusak'=>'Rusak'],
                        'options'=>['class'=>'form-control','prompt'=>'Select Kondisi'],
                        'editableValueOptions'=>['class'=>'text-danger'],
                    ];
                }
            ],
        ]
        
    ]);
    ?>
   
    
</div>
