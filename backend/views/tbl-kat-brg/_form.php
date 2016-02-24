<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use kartik\datecontrol\DateControl;

/**
 * @var yii\web\View $this
 * @var backend\models\TblKatBrg $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="tbl-kat-brg-form">

    <?php $form = ActiveForm::begin(['type'=>ActiveForm::TYPE_HORIZONTAL]); echo Form::widget([

    'model' => $model,
    'form' => $form,
    'columns' => 1,
    'attributes' => [

'id_grup_brg'=>['type'=> Form::INPUT_DROPDOWN_LIST, 
                'items'=>  \yii\helpers\ArrayHelper::map(backend\models\TblGrupBrg::find()->all(),'id','kategori') , 
                'options'=>['placeholder'=>'Enter Kelompok ...']], 

'nama_kat'=>['type'=> Form::INPUT_TEXT, 'options'=>['placeholder'=>'Enter Nama Kat...', 'maxlength'=>20]], 

    ]


    ]);
    echo Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']);
    ActiveForm::end(); ?>

</div>
