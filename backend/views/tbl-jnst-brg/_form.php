<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use kartik\datecontrol\DateControl;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
/**
 * @var yii\web\View $this
 * @var backend\models\TblJnsBrg $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="tbl-jns-brg-form">

    <?php $form = ActiveForm::begin(['type'=>ActiveForm::TYPE_HORIZONTAL]); echo Form::widget([

    'model' => $model,
    'form' => $form,
    'columns' => 1,
    'attributes' => [

'id_kat_brg'=>[ 'type'=> Form::INPUT_DROPDOWN_LIST, 
                'items'=>ArrayHelper::map(backend\models\TblKatBrg::find()->all(),'id','nama_kat'),
                'options'=>['options'=>['prompt'=>'Pilih kategori...']]
              ], 

'nama_jns_brg'=>['type'=> Form::INPUT_TEXT, 'options'=>['placeholder'=>'Enter Nama Jenis...', 'maxlength'=>30]], 

'satuan'=>['type'=> Form::INPUT_TEXT, 'options'=>['placeholder'=>'Enter Satuan...', 'maxlength'=>14]], 

    ]


    ]);
    echo Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']);
    ActiveForm::end(); ?>

</div>
