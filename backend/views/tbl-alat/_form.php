<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use wbraganca\dynamicform\DynamicFormWidget;
use backend\models\TblJnsAlat;
use backend\models\TblKatAlat;
use backend\models\TblModelAlat;
use backend\models\TblPartAlat;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use kartik\widgets\DepDrop;

/* @var $this yii\web\View */
/* @var $model backend\models\TblAlat */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-alat-form">

   <?php $form = ActiveForm::begin(['id' => 'dynamic-form']); ?>

     <?=  $form->field($model, 'id_jns_alat')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(TblJnsAlat::find()->all(),'id','merk'),
        'language' => 'en',
        'options' => ['placeholder' => 'Pilih Merk ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);?>

     <?=  $form->field($model, 'id_kat_alat')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(TblKatAlat::find()->where(['id'=>[1,7,11,12,13]])->all(),'id','kat_alat'),
       
        'options'=>['id'=>'kat-id'],
        'pluginOptions' => [
           'placeholder' => 'Pilih Kategori ...',
            'allowClear' => true
        ],
    ]);?>
    
    
     <?=  $form->field($model, 'id_model_alat')->widget(DepDrop::classname(), [
        
         'options'=>['model-id'],
        'pluginOptions' => [
            'placeholder'=>'Pilih Model...',
            'depends'=>['kat-id'],
            'url'=>  \yii\helpers\Url::to(['/tbl-alat/model']),
        ],
    ]);?>
    
    

    <?= $form->field($model, 'nm_alat')->textInput(['style'=>'width: 400px']) ?>

    <?= $form->field($model, 'no_seri')->textInput(['style'=>'width: 200px']) ?>
    
    <?= $form->field($model, 'tgl_terima')->textInput([]) ?>

    <?= $form->field($model, 'tahun_buat')->textInput(['style'=>'width: 60px']) ?>

    <?= $form->field($model, 'banyak')->textInput(['style'=>'width: 60px']) ?>

    
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
                'model' => $modelpart[0],
                'formId' => 'dynamic-form',
                'formFields' => [
                    'id_alat',
                    'id_kat_alat',
                    'id_jns_alat',
                    'id_model_alat',
                    'nama_part',
                    'no_seri_part',
                    'tahun_buat'
                ],
            ]); ?>

            <div class="container-items"><!-- widgetContainer -->
            <?php foreach ($modelpart as $i => $part): ?>
                <div class="item panel panel-default"><!-- widgetBody -->
                    <div class="panel-heading">
                        <h3 class="panel-title pull-left"><i class="glyphicon glyphicon-th-list"></i> Parts Camera Video </h3>
                        <div class="pull-right">
                            <button type="button" class="add-item btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i></button>
                            <button type="button" class="remove-item btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body">
                        <?php
                            // necessary for update action.
                            if (! $part->isNewRecord) {
                                echo Html::activeHiddenInput($part, "[{$i}]id");
                            }
                        ?>
                       
                        <div class="row">
                             <div class="col-sm-6">
                                <?= $form->field($part, "[{$i}]id_jns_alat")->dropDownList(ArrayHelper::map(TblJnsAlat::find()->all(),'id','merk'),
                                        ['prompt'=>'Pilih merk ...']
                                        
                                     );?>
                                 
                            </div>
                            <div class="col-sm-6">
                                <?= $form->field($part, "[{$i}]id_kat_alat")->dropDownList(ArrayHelper::map(TblKatAlat::find()->where(['NOT IN','id',[1,7,11,12,13]])->all(),'id','kat_alat'),
                                        ['prompt'=>'Pilih kategori ...']);
                                       
                                ?>
                            </div>
                           
                            <div class="col-sm-6">
                                <?= $form->field($part, "[{$i}]id_model_alat")->dropDownList(ArrayHelper::map(TblModelAlat::find()->all(),'id','nama_model'),
                                        ['prompt'=>'Pilih model ...']);
                                         ?>
                            </div>
                            <div class="col-sm-6">
                                <?= $form->field($part, "[{$i}]nama_part")->textInput(['maxlength' => true]) ?>
                            </div>
                            <div class="col-sm-6">
                                <?= $form->field($part, "[{$i}]no_seri_part")->textInput(['style'=>'width: 100px']) ?>
                            </div>
                            <div class="col-sm-6">
                                <?= $form->field($part, "[{$i}]tahun_buat")->textInput(['style'=>'width: 60px']) ?>
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

    <?php ActiveForm::end(); ?>

</div>
