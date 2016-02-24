<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $model backend\models\TblPinjamAlat */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Peminjaman', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-pinjam-alat-view">

    <p>
        
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'tgl_pinjam',
            'jml_pinjam',
            'keperluan',
           
            [
              'label'  =>'User',
                'attribute'=>'idUser.username'
            ],
            [
                'label'=>'Pejabat',
                'attribute'=>'idPejabat.nama',
            ],
            [
                'label'=>'Pengguna',
                'attribute'=>'idPengguna.nama'
            ],            
            
            'status_pinjaman',
        ],
    ]) ?>
    <br>
    <br>
    
    
    
    <p>
        <?php if($model->status_pinjaman === 'Dipinjam') {
        echo Html::a('Proses Pengembalian Alat ?',['/tbl-kembali-alat/kembali', 'id'=>$model->id],['class'=>'btn btn-lg btn-danger']);
    }?>
    </p>
</div>
