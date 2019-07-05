<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\KcfbModel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kcfb-model-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'biaoti')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'time')->textInput() ?>

    <?= $form->field($model, 'kcname')->textInput() ?>

    <?= $form->field($model, 'img1')->textInput() ?>

     <?= $form->field($model, 'kcname2')->textInput() ?>

    <?= $form->field($model, 'img2')->textInput() ?>

     <?= $form->field($model, 'kcname3')->textInput() ?>

    <?= $form->field($model, 'img3')->textInput() ?>

     <?= $form->field($model, 'kcname4')->textInput() ?>

    <?= $form->field($model, 'img4')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
