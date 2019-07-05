<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\AdminModel */

$this->title = '更新管理员信息: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => '管理员信息管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '更新';
?>
<div class="admin-model-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
