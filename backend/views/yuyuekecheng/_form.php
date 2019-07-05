<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use common\models\TeacherModel;

/* @var $this yii\web\View */
/* @var $model common\models\YuyuekechengModel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="yuyuekecheng-model-form">

    <?php $form = ActiveForm::begin(); ?>
   <?= $form->field($model, 'biaoti')->textInput() ?>
    <?= $form->field($model, 'kecheng')->textInput(['maxlength' => true]) ?>

     <?= $form->field($model, 'teacherid')->dropDownList( ArrayHelper::map(TeacherModel::find()->all(), 'teacherid', 'tname')
    ,
['prompt'=>'请选择','style'=>'width:150px']) ?>


    <?= $form->field($model, 'keshi')->textInput() ?>

    <?= $form->field($model, 'sum')->textInput() ?>

    <?= $form->field($model, 'datetime')->textInput() ?>

    <?= $form->field($model, 'nsum')->textInput() ?>
   

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '创建' : '更新', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
