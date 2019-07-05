<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ArticleleiModel */

$this->title = '更新文章分类: ' . $model->Id;
$this->params['breadcrumbs'][] = ['label' => '文章分类管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Id, 'url' => ['view', 'id' => $model->Id]];
$this->params['breadcrumbs'][] = '更新';
?>
<div class="articlelei-model-update">

 

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
