<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\TblPinjamAlat */

//$this->title = 'Create';
//$this->params['breadcrumbs'][] = ['label' => 'Peminjaman', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-pinjam-alat-create">

    

    <?= $this->render('_form2', [
        'model' => $model,
        'tambahin'=>$tambah
    ]) ?>

</div>
