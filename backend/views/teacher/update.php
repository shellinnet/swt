<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TeacherModel */

$this->title = '更新老师信息 ' . $model->tid;
$this->params['breadcrumbs'][] = ['label' => '老师管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->tid, 'url' => ['view', 'id' => $model->tid]];
$this->params['breadcrumbs'][] = '更新';
?>
<div class="teacher-model-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
