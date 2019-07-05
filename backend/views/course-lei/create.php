<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\CourseLeiModel */

$this->title = '添加课程类别';
$this->params['breadcrumbs'][] = ['label' => '课程类别管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="course-lei-model-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
