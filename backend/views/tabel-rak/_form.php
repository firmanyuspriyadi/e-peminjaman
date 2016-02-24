<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use kartik\datecontrol\DateControl;

/**
 * @var yii\web\View $this
 * @var backend\models\TabelRak $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="tabel-rak-form">

    <?php $form = ActiveForm::begin(['type'=>ActiveForm::TYPE_HORIZONTAL]); echo Form::widget([

    'model' => $model,
    'form' => $form,
    'columns' => 1,
    'attributes' => [

'nama_rak'=>['type'=> Form::INPUT_TEXT, 'options'=>['placeholder'=>'Enter Nama Rak...', 'maxlength'=>20]], 

'row'=>['type'=> Form::INPUT_TEXT, 'options'=>['placeholder'=>'Enter Row...', 'maxlength'=>20]], 

    ]


    ]);
    echo Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']);
    ActiveForm::end(); ?>

</div>
