<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\CourseSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="course-model-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'time') ?>

    <?= $form->field($model, 'ktime_id') ?>

    <?= $form->field($model, 'kid') ?>

    <?= $form->field($model, 'total') ?>

    <?php // echo $form->field($model, 'tqian') ?>

    <?php // echo $form->field($model, 'tsyks') ?>

    <?php // echo $form->field($model, 'xueyuanid') ?>

    <?php // echo $form->field($model, 'syks') ?>

    <?php // echo $form->field($model, 'tnote') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'formid') ?>

    <?php // echo $form->field($model, 'jwid') ?>

    <?php // echo $form->field($model, 'openid') ?>

    <?php // echo $form->field($model, 'wid8') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
