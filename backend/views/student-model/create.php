<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\StudentModel */

$this->title = 'Create Student Model';
$this->params['breadcrumbs'][] = ['label' => 'Student Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="student-model-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
