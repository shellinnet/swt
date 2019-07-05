<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\NeibuSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="neibu-model-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'Id') ?>

    <?= $form->field($model, 'username') ?>

    <?= $form->field($model, 'userpassword') ?>

    <?= $form->field($model, 'liebie') ?>

    <?= $form->field($model, 'createtime') ?>

    <?php // echo $form->field($model, 'kehu') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
