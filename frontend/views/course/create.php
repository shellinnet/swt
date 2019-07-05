<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\CourseModel */

$this->title = 'Create Course Model';
$this->params['breadcrumbs'][] = ['label' => 'Course Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="course-model-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
