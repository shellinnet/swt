<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\StudentModel */

$this->title = '更新学员信息: ' . $model->s_id;
$this->params['breadcrumbs'][] = ['label' => '学员信息管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->s_id, 'url' => ['view', 'id' => $model->s_id]];
$this->params['breadcrumbs'][] = '更新';
?>
<div class="student-model-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
