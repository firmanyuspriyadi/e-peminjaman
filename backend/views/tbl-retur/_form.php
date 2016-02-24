<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use wbraganca\dynamicform\DynamicFormWidget;
use backend\models\TblBarang;
use yii\helpers\ArrayHelper;


/* @var $this yii\web\View */
/* @var $model backend\models\TblRetur */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-retur-form">

    <?php $form = ActiveForm::begin(['id'=>'dynamic-form']); ?>
    <div class="row">
        <div class="col-lg-6">
            
        
    <?= $form->field($model, 'nmr_minta')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jumlah_kmbl')->textInput() ?>

    <div class="panel panel-default">
        <div class="panel-heading"><h4><i class="glyphicon glyphicon-th-list"> Barang di Retur</i> </h4></div>
        <div class="panel panel-body">
            <?php DynamicFormWidget::begin([
                'widgetContainer' => 'dynamicform_wrapper',
                'widgetBody'=>'.container-items',
                'widgetItem'=>'.item',
                'limit'=>10,
                'min'=>1,
                'insertButton'=>'.add-item',
                'deleteButton'=>'.remove-item',
                'model'=>$detailRetur[0],
                'formId'=>'dynamic-form',
                'formFields'=>[
                    'id_barang',
                    'bnyk_kembali',
                    'keterangan'
                ],
            ]); ?>
            
            <div class="container-items">
                <?php foreach ($detailRetur as $i => $detail) : ?>
                <div class="item panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title pull-left"><i class="glyphicon glyphicon-wrench"> Barang Retur</i></h3>
                        <div class="pull-right">
                            <button type="button" class="add-item btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i></button>
                            <button type="button" class="remove-item btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button>
                        </div>
                        <div class="clearfix"></div>                            
                    </div>
                    <div class="panel-body">
                        <?php 
                            if (! $detail->isNewRecord){
                                echo Html::activeHiddenInput($detail, "[{$i}]id");                                   

                            }                            
                        ?>
                        <div class="row">
                            <div class="col-sm-6">
                                <?= $form->field($detail, "[{$i}]id_barang")->dropDownList(
                                        ArrayHelper::map(TblBarang::find()->all(),'id','nm_brg'),
                                        ['prompt'=>'Pilih barang yang diretur']
                                        ); 
                                 ?>
                                                                
                            </div>
                            <div class="col-sm-6">
                                <?= $form->field($detail,"[{$i}]bnyk_kmbl")->textInput(['maxlength'=>true]);?>
                            </div>
                            <div class="col-sm-6">
                                <?= $form->field($detail, "[{$i}]keterangan")->textInput(['maxLength'=>true]);?>
                            </div>
                        </div>
                        
                    </div>
                </div>
                
                <?php endforeach;?>
            </div>
            <?php DynamicFormWidget::end(); ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>
