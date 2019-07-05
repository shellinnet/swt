<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\CourseFenModel */

$this->title = 'Create Course Fen Model';
$this->params['breadcrumbs'][] = ['label' => 'Course Fen Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="course-fen-model-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
