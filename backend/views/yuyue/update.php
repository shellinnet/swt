<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\YuyueModel */

$this->title = '更新预约信息' . $model->name;
$this->params['breadcrumbs'][] = ['label' => '预约管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '更新';
?>
<div class="yuyue-model-update">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
