<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\CourseModel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="course-model-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'time')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ktime_id')->textInput() ?>

    <?= $form->field($model, 'kid')->textInput() ?>

    <?= $form->field($model, 'total')->textInput() ?>

    <?= $form->field($model, 'tqian')->textInput() ?>

    <?= $form->field($model, 'tsyks')->textInput() ?>

    <?= $form->field($model, 'xueyuanid')->textInput() ?>

    <?= $form->field($model, 'syks')->textInput() ?>

    <?= $form->field($model, 'tnote')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'formId')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jwid')->textInput() ?>

    <?= $form->field($model, 'openid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'wid8')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
