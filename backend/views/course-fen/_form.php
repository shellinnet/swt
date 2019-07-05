<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\CourseFenModel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="course-fen-model-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'c_leibie')->textInput() ?>

    <?= $form->field($model, 'cf_id')->textInput() ?>
    

    <?= $form->field($model, 'cf_name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
