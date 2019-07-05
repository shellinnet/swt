<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\YuyuekechengSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="yuyuekecheng-model-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'kid') ?>

    <?= $form->field($model, 'kecheng') ?>

    <?= $form->field($model, 'teacherid') ?>

    <?= $form->field($model, 'keshi') ?>

    <?= $form->field($model, 'sum') ?>

    <?php // echo $form->field($model, 'datetime') ?>

    <?php // echo $form->field($model, 'nsum') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
