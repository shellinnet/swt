<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\CourseModel */

$this->title = '创建课程信息';
$this->params['breadcrumbs'][] = ['label' => '课程信息', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="course-model-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
