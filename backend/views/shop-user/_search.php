<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ShopUserSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="shop-user-model-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'userid') ?>

    <?= $form->field($model, 'username') ?>

    <?= $form->field($model, 'password') ?>

    <?= $form->field($model, 'email') ?>

    <?= $form->field($model, 'openid') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'password_hash') ?>

    <?php // echo $form->field($model, 'itemid') ?>

    <?php // echo $form->field($model, 'auth_key') ?>

    <?php // echo $form->field($model, 'avator') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'truename') ?>

    <?php // echo $form->field($model, 'mobile') ?>

    <?php // echo $form->field($model, 'zhiwei') ?>

    <?php // echo $form->field($model, 'company') ?>

    <?php // echo $form->field($model, 'diqu') ?>

    <?php // echo $form->field($model, 'gumobile') ?>

    <?php // echo $form->field($model, 'city') ?>

    <?php // echo $form->field($model, 'liuyan') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
