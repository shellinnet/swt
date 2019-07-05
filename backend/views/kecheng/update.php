<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\KechengModel */

$this->title = 'Update Kecheng Model: ' . $model->keid;
$this->params['breadcrumbs'][] = ['label' => '课程管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->keid, 'url' => ['view', 'id' => $model->keid]];
$this->params['breadcrumbs'][] = '更新';
?>
<div class="kecheng-model-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
