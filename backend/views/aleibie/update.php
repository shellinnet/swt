<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\AleibieModel */

$this->title = '更新会员类别: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => '会员类别管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '更新';
?>
<div class="aleibie-model-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
