<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use wbraganca\dynamicform\DynamicFormWidget;
use backend\models\ValueHelper;
use backend\models\TblPejabat;
use backend\models\TblPengguna;
use backend\models\TblAlat;
use backend\models\TblAcara;

use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model backend\models\TblPinjamAlat */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-pinjam-alat-form">

    <?php $form = ActiveForm::begin(['id'=>'dynamic-form']); ?>

    <div class="row">
        <div class="col-lg-5">
            
          
    <?= $form->field($model, 'keperluan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_pejabat')->widget(Select2::className(),[
        'data'=>ArrayHelper::map(TblPejabat::find()->all(),'nip','nama'),
        'options'=>['prompt'=>'Pilih pejabat penandatangan'],
        'pluginOptions'=>[
            'allowClear'=>true
          ],
    ]); ?>

    <?= $form->field($model, 'id_pengguna')->widget(Select2::className(),[
        'data'=>  ArrayHelper::map(TblPengguna::find()->all(),'nip','nama'),
        'options'=>['prompt'=>'Pilih peminjam'],
        'pluginOptions'=>[
            'allowClear'=>true
            ],       
       
    ]); ?>
   </div>
            
                <div class="col-lg-5">
                    
             
    <div class="panel panel-default">
        <div class="panel-heading"><h4><i class="glyphicon glyphicon-th-list"></i> List Acara</h4></div>
        <div class="panel-body">
             <?php DynamicFormWidget::begin([
                'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                'widgetBody' => '.container-items', // required: css class selector
                'widgetItem' => '.item', // required: css class
                'limit' => 10, // the maximum times, an element can be cloned (default 999)
                'min' => 1, // 0 or 1 (default 1)
                'insertButton' => '.add-item', // css class
                'deleteButton' => '.remove-item', // css class
                'model' => $modelmeliput[0],
                'formId' => 'dynamic-form',
                'formFields' => [
                    'id_acara',
                    
                   
                ],
            ]); ?>

            <div class="container-items"><!-- widgetContainer -->
            <?php foreach ($modelmeliput as $i => $liput): ?>
                <div class="item panel panel-default"><!-- widgetBody -->
                    <div class="panel-heading">
                        <h3 class="panel-title pull-left"><i class="glyphicon glyphicon-film"></i> Acara yang diliput</h3>
                        <div class="pull-right">
                            <button type="button" class="add-item btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i></button>
                            <button type="button" class="remove-item btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body">
                        <?php
                            // necessary for update action.
                            if (! $liput->isNewRecord) {
                                echo Html::activeHiddenInput($liput, "[{$i}]id");
                            }
                        ?>
                       
                        <div class="row">
                             <div class="col-sm-6">
                                <?= $form->field($liput, "[{$i}]id_acara")->dropDownList(
                                        ArrayHelper::map($acara,'id','nm_acara'),
                                        ['prompt'=>'Pilih nama acara ...']
                                        
                                     );?>
                                 
                            </div>
                           
                            
                            
                        </div><!-- .row -->
                        
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
            <?php DynamicFormWidget::end(); ?>
        </div>
    </div>
    </div>
    </div>    
    <div class="row">
        <div class="col-lg-5">
             <div class="panel2 panel-default">
        <div class="panel-heading"><h4><i class="glyphicon glyphicon-th-list"></i> List Peminjaman</h4></div>
        <div class="panel-body">
             <?php DynamicFormWidget::begin([
                'widgetContainer' => 'dynamicform_wrapper2', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                'widgetBody' => '.container-items2', // required: css class selector
                'widgetItem' => '.item2', // required: css class
                'limit' => 10, // the maximum times, an element can be cloned (default 999)
                'min' => 1, // 0 or 1 (default 1)
                'insertButton' => '.add-item2', // css class
                'deleteButton' => '.remove-item2', // css class
                'model' => $modeldetail[0],
                'formId' => 'dynamic-form',
                'formFields' => [
                    'id_alat',
                    'banyak_alat',
                   
                ],
            ]); ?>

            <div class="container-items2"><!-- widgetContainer -->
            <?php foreach ($modeldetail as $i => $pinjam): ?>
                <div class="item2 panel panel-default"><!-- widgetBody -->
                    <div class="panel-heading">
                        <h3 class="panel-title pull-left"><i class="glyphicon glyphicon-wrench"></i> Alat Yang Dipinjam</h3>
                        <div class="pull-right">
                            <button type="button" class="add-item2 btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i></button>
                            <button type="button" class="remove-item2 btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body">
                        <?php
                            // necessary for update action.
                            if (! $pinjam->isNewRecord) {
                                echo Html::activeHiddenInput($pinjam, "[{$i}]id");
                            }
                        ?>
                       
                        <div class="row">
                             <div class="col-sm-6">
                                <?= $form->field($pinjam, "[{$i}]id_alat")->dropDownList(ArrayHelper::map($alat,'id','nm_alat'),
                                        ['prompt'=>'Pilih nama alat ...']
                                        
                                     );?>
                                 
                            </div>
                           
                            <div class="col-sm-6">
                                <?= $form->field($pinjam, "[{$i}]banyak_alat")->textInput(['maxlength' => true]) ?>
                            </div>
                            
                        </div><!-- .row -->
                        
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
            <?php DynamicFormWidget::end(); ?>
        </div>
    </div>               
        </div>
    </div>
    
    <div class="row">
        <div class="col-lg-5">
            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
        </div>
    </div>
    
             

    <?php ActiveForm::end(); ?>

</div>
