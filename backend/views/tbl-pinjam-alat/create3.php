<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\TblPinjamAlat */


?>
<div class="tbl-pinjam-alat-create">

    <?= $this->render('_form3', [
        'model' => $model,
                'detailpinjam'=>$detailpinjam,
                'tambah'=>$tambah,
        
    ]) ?>

</div>
