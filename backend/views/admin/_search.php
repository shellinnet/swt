<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\AdminSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="admin-model-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>


    <?= //$form->field($model, 'm_weixin') ?>

    <?= $form->field($model, 'username') ?>

    <?= $form->field($model, 'm_tel') ?>

    <?= //$form->field($model, 'm_rzdate') ?>

    <?php // echo $form->field($model, 'm_tel') ?>

    <?php // echo $form->field($model, 'm_beizhu') ?>

    <?php // echo $form->field($model, 'm_qx_id') ?>

    <?php // echo $form->field($model, 'username') ?>

    <?php // echo $form->field($model, 'password') ?>

    <?php // echo $form->field($model, 'password_hash') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'role') ?>

    <?php // echo $form->field($model, 'avatar') ?>

    <?php // echo $form->field($model, 'auth_key') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
