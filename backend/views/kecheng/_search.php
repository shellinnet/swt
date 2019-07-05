<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\KechengSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kecheng-model-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'keid') ?>

    <?= $form->field($model, 'kname') ?>

    <?= $form->field($model, 'zks') ?>


    <?php // echo $form->field($model, 'teacherid') ?>

    <?php // echo $form->field($model, 'ktime_id') ?>

    <?php // echo $form->field($model, 'jwid') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
