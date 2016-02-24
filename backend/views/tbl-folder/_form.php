<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\builder\Form;
use kartik\datecontrol\DateControl;
use yii\helpers\ArrayHelper;
use wbraganca\dynamicform\DynamicFormWidget;

/**
 * @var yii\web\View $this
 * @var backend\models\TblFolder $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="tbl-folder-form">

   <?php $form = ActiveForm::begin(['id'=>'dynamic-form']);?>
    <div class="row">
        <div class="col-lg-5">
            
        
        <?= $form->field($model, 'nama_folder')->textInput(['width'=>'50px']);?>
        <?= $form->field($model,'bulan')->textInput(['width'=>'20px']);?>
        <?= $form->field($model,'tahun')->textInput(['width'=>'10px']);?>
    
        <div class="panel panel-default">
            <div class="panel-heading"><h4><i class="glyphicon glyphicon-th-list"></i> List Kaset</h4></div>
            <div class="panel-body">
                <?php DynamicFormWidget::begin([
                    'widgetContainer'=>'dynamicform_wrapper',
                    'widgetBody'=>'.container-items',
                    'widgetItem'=>'.item',
                    'limit'=>10,
                    'min'=>1,
                    'insertButton'=>'.add-item',
                    'deleteButton'=>'.remove-item',
                    'model'=>$detailfolder[0],
                    'formId'=>'dynamic-form',
                    'formFields'=>[
                        'id_acara'
                    ],
                ]);?>
                
                <div class="container-items">
                    <?php foreach($detailfolder as $i => $details) :?>
                    <div class="item panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title pull-left"><i class="glyphicon glyphicon-film"> Kaset</i></h3>
                            <div class="pull-right">
                                <button type="button" class="add-item btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i></button>
                                <button type="button" class="remove-item btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="panel-body">
                            <?php 
                                if ($details->isNewRecord) {
                                    echo Html::activeHiddenInput($details, "[{$i}]id");
                                }
                            ?>
                            <div class="row">
                                <div class="col-sm-6">
                                    <?= $form->field($details,"[{$i}]kaset_id")->dropDownList(
                                        ArrayHelper::map($kasetliputan,'nomor_kaset','nomor_kaset'),
                                        ['prompt'=>'Pilih Kaset']
                                    );?>
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
       <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class'=> $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']);?>
   
   </div>
   </div>
    </div>
   <?php    ActiveForm::end();?>

</div>
