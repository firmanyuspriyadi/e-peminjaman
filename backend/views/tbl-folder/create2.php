<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var backend\models\TblFolder $model
 */


?>
<div class="tbl-folder-create">
    <div class="page-header">
        
    </div>
    <?= $this->render('_form2', [
        'model'=>$model,
        'detail' =>$detail,
        'kaset'=>$kaset
    ]) ?>

</div>
