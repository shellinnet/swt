<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ShopUserModel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="shop-user-model-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'shiduanid')->textInput() ?>

 

    <?= $form->field($model, 'itemid')->textInput() ?>


    <?= $form->field($model, 'truename')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mobile')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'teacherid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lastkeshi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'riqi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'total')->textInput(['maxlength' => true]) ?>

  

    <?= $form->field($model, 'liuyan')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
