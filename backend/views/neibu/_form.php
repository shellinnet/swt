<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\NeibuModel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="neibu-model-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'userpassword')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'liebie')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'createtime')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kehu')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
