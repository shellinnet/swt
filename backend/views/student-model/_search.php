<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\StudentModelSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="student-model-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 's_id') ?>

    <?= $form->field($model, 's_weixin') ?>

    <?= $form->field($model, 's_name') ?>

    <?= $form->field($model, 's_sex') ?>

    <?= $form->field($model, 's_state') ?>

    <?php // echo $form->field($model, 'c_id') ?>

    <?php // echo $form->field($model, 't_id') ?>

    <?php // echo $form->field($model, 's_telephone') ?>

    <?php // echo $form->field($model, 's_note') ?>

    <?php // echo $form->field($model, 's_ctimes') ?>

    <?php // echo $form->field($model, 't_beizhu') ?>

    <?php // echo $form->field($model, 'c_leibie') ?>

    <?php // echo $form->field($model, 'password') ?>

    <?php // echo $form->field($model, 'password_hash') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'update_at') ?>

    <?php // echo $form->field($model, 'l_lei_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
