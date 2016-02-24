<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\widgets\MaskedInput;
use wbraganca\dynamicform\DynamicFormWidget;

use backend\models\TblBarang;



/* @var $this yii\web\View */
/* @var $model backend\models\TblMintaBhnBaku */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-minta-bhn-baku-form">

    <?php $form = ActiveForm::begin(['id'=>'dynamic-form']); ?>
    <div class="row">
        <div class="col-lg-6">
            
       
    <?= MaskedInput::widget([
        'model'=>$model,
       
        'attribute'=>'nmr_minta',
        'name'=>'nmr_minta',
        'mask'=>'999-aaa-9aa'
    ],['style'=>'width: 250px']); ?>

    <?= $form->field($model, 'keperluan')->textInput(['style'=>'width: 500px']); ?>

    <?= $form->field($model, 'banyak')->textInput(['style'=>'width: 50px']); ?>

    <?= $form->field($model, 'pemohon')->textInput(['style'=>'width: 300px']); ?>

   
    
    
    <div class="panel panel-default">
        <div class="panel panel-heading"><h4><i class="glyphicon glyphicon-wrench"></i> Bahan Baku yang diminta</h4></div>
        <div class="panel panel-body">
            <?php DynamicFormWidget::begin([
                    'widgetContainer'=>'dynamicform_wrapper',
                    'widgetBody'=>'.container-items',
                    'widgetItem'=>'.item',
                    'limit'=>10,
                    'min'=>1,
                    'insertButton'=>'.add-item',
                    'deleteButton'=>'.remove-item',
                    'model'=>$mintadetail[0],
                    'formId'=>'dynamic-form',
                    'formFields'=>[
                      'id_barang'  ,
                      'banyak_minta',
                      'keterangan'
                    ],
                ]
            );?>
            
            <div class="container-items">
                <?php foreach ($mintadetail as $i => $detail) :?>
                <div class="item panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title pull-left"><i class="glyphicon glyphicon-th-list"> Bahan Baku yang diminta</i> </h3>
                        <div class="pull-right">
                            <button type="button" class="add-item btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i></button>
                            <button type="button" class="remove-item btn btn-danger btn-xs"><i class="glyphicon glyphicon-remove"></i> </button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body">
                        <?php 
                            if(! $detail->isNewRecord){
                                echo Html::activeHiddenInput($detail, "[{$i}]id");
                            }
                        ?>
                        
                        <div class="row">
                            <div class="col-sm-6">
                                <?= $form->field($detail, "[{$i}]id_barang")->dropDownList(ArrayHelper::map(TblBarang::find()->all(),'id','nm_brg'),
                                        ['prompt'=>'Pilih Barang']
                                );?>
                            </div>
                            
                            <div class="col-sm-6">
                                <?= $form->field($detail, "[{$i}]banyak_minta")->textInput(['style'=>'width: 60px']);?>
                            </div>
                            <div class="col-sm-6">
                                <?= $form->field($detail,"[{$i}]keterangan")->textInput(['style'=>'width: 300px']);?>
                            </div>
                        </div>
                            
                    </div>
                </div>
                <?php endforeach;?>
            </div>
            <?php DynamicFormWidget::end();?>
        </div>
    </div>
    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
     </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>
