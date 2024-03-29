<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\AdminModel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="admin-model-form">

    <?php $form = ActiveForm::begin(); ?>

      <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
       <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'm_sex')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'm_tel')->textInput() ?>

    <?= $form->field($model, 'm_beizhu')->textarea(['rows' => 6]) ?>


 

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
