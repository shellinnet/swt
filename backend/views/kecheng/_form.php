<?php
 
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use common\models\TeacherModel;

/* @var $this yii\web\View */
/* @var $model common\models\KechengModel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kecheng-model-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'kname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'zks')->textInput() ?>

    <?= $form->field($model, 'teacherid')->dropDownList( ArrayHelper::map(TeacherModel::find()->all(), 'teacherid', 'tname')
    ,
['prompt'=>'请选择','style'=>'width:150px']) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '创建' : '更新', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
