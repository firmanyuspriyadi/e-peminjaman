<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

use yii\data\ActiveDataProvider;
use common\models\User;
use kartik\grid\GridView;
use kartik\editable\Editable;

/* @var $this yii\web\View */
/* @var $model backend\models\TblPinjamAlat */

/**
$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Daftar Peminjaman', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
 * 
 */
?>
<div class="tbl-kembali-alat-view">

    <h1><?= Html::encode($this->title) ?></h1>

   
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            [
                'label'=>'Tanggal Pinjam',
                'attribute'=>'tgl_pinjam',
                 
            ],
            
            'jml_pinjam',
            'keperluan',
            [
                'label'=>'Petugas',
                'attribute'=> 'idUser.nama',
            ],
           
            [
                'label'=>'Pejabat Penandatangan',
                'attribute'=>'idPejabat.nama',
            ],
            [
                'label'=>'Pengguna',
                'attribute'=>'idPengguna.nama',
            ],
            
        ],
    ]) ?>
    <br>
    
    <h4>Acara Yang Diliput</h4>
    <?= GridView::widget([
        'dataProvider'=> new ActiveDataProvider([
            'query'=>$model->getTblMeliputs()->with('idAcara'),
            'pagination'=>false,
        ]),
        'columns'=>[
            ['class'=>  \yii\grid\SerialColumn::className()],
            [
                'header'=>'Nama Acara',
                'attribute'=>'idAcara.nm_acara',
            ],
            [
                'header'=>'Tempat',
                'attribute'=> 'idAcara.tmpt_acara',
            ],
           [
               'header'=>'Tanggal',
               'attribute'=> 'idAcara.tgl_acara'
           ],
           
        ]
    ]);?>
    <br>
    
    <h4>Peralatan Yang Dipinjam</h4>
    <h5>(Untuk merubah kondisi alat yang dipinjam, klik pada kolom kondisi alat lalu rubah sesuai yang di inginkan)</h5>
    <?=
GridView::widget([
        'dataProvider' => new ActiveDataProvider([
            'query' => $model->getTblDetailPinjamAlats()->with('idAlat'),
            'pagination' => false,
        ]),
        'columns' => [
            ['class' => \yii\grid\SerialColumn::className()],
            
            'idAlat.nm_alat',
            [
                'header'=>'Kondisi Alat',
                'class'=>'kartik\grid\EditableColumn',
                'attribute'=>'ket_alat',
                'editableOptions'=>function($model,$key,$index){
                    return [
                        'header'=>'Kondisi Alat',
                        'inputType'=>Editable::INPUT_DROPDOWN_LIST,
                        'data'=>[ 'Baik' => 'Baik', 'Rusak' => 'Rusak', ],
                        'options'=>['class'=>'form-control', 'prompt'=>'Select Kondisi .. '],
                        'editableValueOptions'=>['class'=>'text-danger'],
                    ];
                },
            ],
           
        ]
    ]);?>
    
    <p>
        <?php if($model->status_pinjaman === 'Dipinjam') {
        echo Html::a('Proses Pengembalian Alat ?',['TblKembaliAlat/kembali', 'id_pinjam'=>$model->id],['class'=>'btn btn-lg btn-danger']);
    }?>
    </p>
    
</div>
