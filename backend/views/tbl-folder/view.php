<?php

use yii\helpers\Html;

use yii\widgets\DetailView;

use yii\helpers\Url;
use yii\bootstrap\Modal;
use yii\widgets\Pjax;

/**
 * @var yii\web\View $this
 * @var backend\models\TblFolder $model
 */
$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Folder', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="tbl-folder-view">
    
    <h1><?= Html::encode($this->title) ?></h1>
    <?=    DetailView::widget([
            'model' => $model,           
        
        'attributes' => [
            'id',
            'nama_folder',
            'bulan',
            'tahun',
        ]
        
        
    ]); ?>
<?= Html::button('Tambah Kaset', ['value'=>Url::to(['tambah','id'=>$model->id]),'id'=>'modalButton6','class'=>'btn btn-success'])?>
    <?php
        Modal::begin([
            'header'=>'<h4>Tambah Kaset</h4>',
            'id'=>'modal6',
            'size'=>'modal-sm',
        ]);
        echo "<div id='modalContent6'></div>";
        Modal::end();
    ?>
    <br>
    <br>
    <?php Pjax::begin([
    'id' => 'pjax-kaset-gridview',
    'enablePushState' => false,
    ]); ?>
    <?= \yii\grid\GridView::widget([
        'dataProvider'=>$kasetProvider,
        'columns'=>[
            ['class'=>'yii\grid\SerialColumn'],
            
            [
                'label'=>'Nomor Kaset',
                'value'=>'nomorKaset'
            ],
            [
                'label'=>'Kategori',
                'value'=>'Kategori'
            ],
            
            ['class'=>'yii\grid\ActionColumn',
                'template'=>'{cancel}',
                'header'=>'Action',
                'buttons'=>[
                    'cancel'=>function($url,$model){
                        return Html::a('Cancel',['cancel','id'=>$model->id,'folderid'=>$model->folder_id],['class'=>'btn btn-primary btn-min']);
                    }
                ],
            ],
        ],
    ]);
     ?>
    <?php Pjax::end(); ?>  
    
</div>
