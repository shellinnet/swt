<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\TeacherModel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="teacher-model-form">

    <?php $form = ActiveForm::begin(); ?>

   <?= $form->field($model, 'teacherid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 't_sex')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 't_telephone')->textInput() ?>


    <?= $form->field($model, 'password')->textInput() ?>

    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '创建' : '更新', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
