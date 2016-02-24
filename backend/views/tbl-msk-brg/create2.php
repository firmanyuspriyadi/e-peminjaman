<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\TblMskBrg */


?>
<div class="tbl-msk-brg-create">
    
    <?= $this->render('_form2', [
        'model' =>$model,
        'detailmasuk'=>$detailmasuk,
        'tambah'=>$tambah
    ]) ?>

</div>
