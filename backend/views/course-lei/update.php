<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CourseLeiModel */

$this->title = '更新类别管理: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => '类别管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '更新';
?>
<div class="course-lei-model-update">

  

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
