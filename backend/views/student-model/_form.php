<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\StudentModel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="student-model-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 's_weixin')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 's_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 's_sex')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 's_state')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'c_id')->textInput() ?>

    <?= $form->field($model, 't_id')->textInput() ?>

    <?= $form->field($model, 's_telephone')->textInput() ?>

    <?= $form->field($model, 's_note')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 's_ctimes')->textInput() ?>

    <?= $form->field($model, 't_beizhu')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'c_leibie')->textInput() ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password_hash')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'update_at')->textInput() ?>

    <?= $form->field($model, 'l_lei_id')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
