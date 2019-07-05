<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\TongzhiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tongzhi-model-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'biaoti') ?>

    <?= $form->field($model, 'topbiaoti') ?>

    <?= $form->field($model, 'created_time') ?>

    <?= $form->field($model, 'neirong') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
