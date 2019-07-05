<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\UserModel */

$this->title = '编辑客户信息: ' . $model->Id;
$this->params['breadcrumbs'][] = ['label' => '客户信息', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Id, 'url' => ['view', 'id' => $model->Id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="user-model-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
