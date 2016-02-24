<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use wbraganca\dynamicform\DynamicFormWidget;
use backend\models\TblBarang;

/* @var $this yii\web\View */
/* @var $model backend\models\TblMskBrg */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-msk-brg-form">

    <?php $form = ActiveForm::begin(['id' => 'dynamic-form']); ?>
    <div class="row">
        <div class="col-lg-6">
            
       

    <?= $form->field($model, 'jml_msk')->textInput() ?>

    <div class="panel panel-default">
        <div class="panel-heading"><h4><i class="glyphicon glyphicon-wrench"></i> Part Alat Liputan</h4></div>
        <div class="panel-body">
             <?php DynamicFormWidget::begin([
                'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                'widgetBody' => '.container-items', // required: css class selector
                'widgetItem' => '.item', // required: css class
                'limit' => 10, // the maximum times, an element can be cloned (default 999)
                'min' => 1, // 0 or 1 (default 1)
                'insertButton' => '.add-item', // css class
                'deleteButton' => '.remove-item', // css class
                'model'=>$brgdetail[0],
                'formId'=>'dynamic-form',
                'formFields'=>[
                    'id_brg',
                    'tahun_pembelian',
                    'banyaknya'
                ],
            ]); ?>
            
            <div class="container-items"><!-- widgetContainer -->
            <?php foreach ($brgdetail as $i => $detail): ?>
                <div class="item panel panel-default"><!-- widgetBody -->
                    <div class="panel-heading">
                        <h3 class="panel-title pull-left"><i class="glyphicon glyphicon-th-list"></i> Part Camera Video </h3>
                        <div class="pull-right">
                            <button type="button" class="add-item btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i></button>
                            <button type="button" class="remove-item btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body">
                        <?php
                            // necessary for update action.
                            if (! $detail->isNewRecord) {
                                echo Html::activeHiddenInput($detail, "[{$i}]id");
                            }
                        ?>
                       
                        <div class="row">
                            <div class="col-sm-6">
                                <?= $form->field($detail, "[{$i}]id_brg")->dropDownList(ArrayHelper::map(TblBarang::find()->all(),'id','nm_brg'),
                                        ['prompt'=>'Pilih Barang']
                                );?>
                            </div>
                            
                            <div class="col-sm-6">
                                <?= $form->field($detail, "[{$i}]tahun_pembelian")->textInput(['maxlength'=>true]);?>
                            </div>
                            
                            <div class="col-sm-6">
                                <?= $form->field($detail, "[{$i}]banyaknya")->textInput(['maxlength'=>true]);?>
                            </div>
                        </div><!-- .row -->
                        
                    </div>
                </div>
            <?php endforeach; ?>
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
