<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use backend\models\TblPengguna;

/* @var $this yii\web\View */
/* @var $model backend\models\TblKembaliAlat */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-kembali-alat-form">

    <?php $form = ActiveForm::begin(); ?>
    
  

    <?= $form->field($model, 'id_pinjam')->textInput() ?><br>
    <?= Html::a('Cek Kode Pinjam',['/TblKembaliAlatController/cekKode'],['class'=>'btn btn-primary'])?>
    
    

    <?php ActiveForm::end(); ?>

</div>
