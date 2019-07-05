<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\KcfbModel */

$this->title = '更新课程通知 ' . $model->Id;
$this->params['breadcrumbs'][] = ['label' => '发布课程管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Id, 'url' => ['view', 'id' => $model->Id]];
$this->params['breadcrumbs'][] = '更新课程通知';
?>
<div class="kcfb-model-update">

  

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
