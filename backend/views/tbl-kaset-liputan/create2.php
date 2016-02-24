<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\TblPinjamAlat */


?>
<div class="tbl-pinjam-alat-create">

    <?= $this->render('_form2', [
        'model' => $model,
        'acara'=>$acara,
        'tabeldetail'=>$tabeldetail
        
    ]); ?>
    
</div>
