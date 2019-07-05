<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\TongzhiModel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tongzhi-model-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'biaoti')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'topbiaoti')->textInput() ?>

    <?= $form->field($model, 'created_time')->textInput() ?>

    <?= $form->field($model, 'neirong')->textarea(['rows' => 6]) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '创建' : '更新', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
