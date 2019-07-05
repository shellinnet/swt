<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ArticleModel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="article-model-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'a_biaoti')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'a_neirong')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'a_time')->textInput() ?>

    <?= $form->field($model, 'a_liebie_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
