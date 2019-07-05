<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\YuyueSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="yuyue-model-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'kid') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'mobile') ?>

    <?= $form->field($model, 'time') ?>

    <?php // echo $form->field($model, 'sid') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
