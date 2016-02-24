<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;


/**
 * @var yii\web\View $this
 * @var backend\models\TblAcara $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="tbl-acara-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
    	<div class="col-lg-5">

			    <?= $form->field($model,'jns_acara')->dropDownList(['Acara Presiden RI'=>'Acara Presiden RI','Acara Ibu Negara'=>'Acara Ibu Negara',
			    'Acara Pimpinan Kantor'=>'Acara Pimpinan Kantor','Acara Mensesneg'=>'Acara Mensesneg'],['prompt'=>'Pilih Acara ... '])?>
			    <?= $form->field($model, 'nm_acara')->textInput(['style'=>'width:400px'])?>
			    <?= $form->field($model,'tgl_acara')->textInput(['style'=>'width:400px'])?>
			    <?= $form->field($model,'jam_acara')->textInput(['style'=>'width:400px'])?>
			    <?= $form->field($model,'tmpt_acara')->textInput(['style'=>'width:400px'])?>


			    <div class="form-group">
			    <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class'=>$model->isNewRecord ? 'btn btn-success' : 'btn btn-primary'])?>
			    </div>
    	</div>
    </div>
   

</div>
