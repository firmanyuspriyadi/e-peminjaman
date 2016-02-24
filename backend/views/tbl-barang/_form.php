<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use kartik\depdrop\DepDrop;
use backend\models\TblGrupBrg;
use backend\models\TblKatBrg;
use backend\models\TblJnsBrg;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $model backend\models\TblBarang */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-barang-form">

    <?php $form = ActiveForm::begin(); ?>
   
    <?= $form->field($model, 'id_grup_brg')->widget(Select2::className(),[
        'data'=>  ArrayHelper::map(TblGrupBrg::find()->all(),'id','kategori'),
        'options'=>['id'=>'grup-id'],
        'pluginOptions'=>[
            'allowClear'=>true,
            'placeholder'=>'Pilih Kelompok...'
        ]
    ]); ?>

    <?= $form->field($model, 'id_kat_brg')->widget(DepDrop::className(),[
            'options'=>['id'=>'kat-id'],
            'pluginOptions'=>[
                'placeholder'=>'Pilih Kategori...',
                'depends'=>['grup-id'],
                'url'=> Url::to(['/tbl-barang/kategori']),
        ],
    ]); ?>

    <?= $form->field($model, 'id_jns_brg')->widget(DepDrop::className(),[
        'options'=>['id'=>'jns-id'],
        'pluginOptions'=>[
            'placeholder'=>'Pilih Jenis...',
            'depends'=>['kat-id'],
            'url'=>  Url::to(['/tbl-barang/jenis']),
        ],
        
    ]); ?>
    
     <?= $form->field($model, 'nm_brg')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'keterangan')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
