<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TeacherleiModel */

$this->title = '更新老师类别: ' . $model->Id;
$this->params['breadcrumbs'][] = ['label' => '老师类别管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Id, 'url' => ['view', 'id' => $model->Id]];
$this->params['breadcrumbs'][] = '更新';
?>
<div class="teacherlei-model-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
