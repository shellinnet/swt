<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\TeacherSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="teacher-model-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'tid') ?>

    <?= $form->field($model, 'teacherid') ?>

    <?= $form->field($model, 't_weixin') ?>



    <?= $form->field($model, 'tname') ?>

    <?php // echo $form->field($model, 't_sex') ?>

    <?php // echo $form->field($model, 't_rzdate') ?>

    <?php // echo $form->field($model, 't_telephone') ?>

    <?php // echo $form->field($model, 't_cydate') ?>

    <?php // echo $form->field($model, 'kcid') ?>

    <?php // echo $form->field($model, 'skrq') ?>

    <?php // echo $form->field($model, 'sdid') ?>

    <?php // echo $form->field($model, 'xyid') ?>

    <?php // echo $form->field($model, 't_beizhu') ?>

    <?php // echo $form->field($model, 'password') ?>

    <?php // echo $form->field($model, 'password_hash') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'update_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
