<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ZhihudataModel */

$this->title = 'Update Zhihudata Model: ' . $model->Id;
$this->params['breadcrumbs'][] = ['label' => 'Zhihudata Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Id, 'url' => ['view', 'id' => $model->Id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="zhihudata-model-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
