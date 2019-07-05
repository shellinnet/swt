<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ZhihudataModel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="zhihudata-model-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'customer')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jindu')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'createtime')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
