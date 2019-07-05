<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\KechengModel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kecheng-model-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'kname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'zks')->textInput() ?>

    <?= $form->field($model, 'introduce1')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'teacherid')->textInput() ?>

    <?= $form->field($model, 'ktime_id')->textInput() ?>

    <?= $form->field($model, 'jwid')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
