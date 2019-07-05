<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\KcfbSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kcfb-model-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'Id') ?>

    <?= $form->field($model, 'biaoti') ?>

    <?= $form->field($model, 'time') ?>

    <?= $form->field($model, 'kcname') ?>

    <?= $form->field($model, 'kcname2') ?>

     <?= $form->field($model, 'kcname3') ?>

      <?= $form->field($model, 'kcname4') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
