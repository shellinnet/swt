<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\TLeiModel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tlei-model-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tl_id')->textInput() ?>

    <?= $form->field($model, 'tl_name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
