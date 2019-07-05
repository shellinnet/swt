<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ShopUserModel */

$this->title = '更新学员信息: ' . $model->userid;
$this->params['breadcrumbs'][] = ['label' => '学员管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->userid, 'url' => ['view', 'id' => $model->userid]];
$this->params['breadcrumbs'][] = '更新';
?>
<div class="shop-user-model-update">

   

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
