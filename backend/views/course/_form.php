<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\FourtimeModel;
use common\models\TeacherModel;
use common\models\KechengModel;
use common\models\UsermobileModel;

/* @var $this yii\web\View */
/* @var $model common\models\CourseModel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="course-model-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'time')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ktime_id')->dropDownList( ArrayHelper::map(FourtimeModel::find()->all(), 'sid', 'shiduan')
    ,
['prompt'=>'请选择','style'=>'width:150px']) ?>

  
    <?= $form->field($model, 'kid')->dropDownList( ArrayHelper::map(KechengModel::find()->all(), 'keid', 'kname')
    ,
['prompt'=>'请选择','style'=>'width:150px']) ?>

    <?= $form->field($model, 'total')->textInput() ?>

    <?= $form->field($model, 'tqian')->dropDownList( ArrayHelper::map(TeacherModel::find()->all(), 'teacherid', 'tname')
    ,
['prompt'=>'请选择','style'=>'width:150px']) ?>

     <?= $form->field($model, 'xueyuanid')->dropDownList( ArrayHelper::map(UsermobileModel::find()->all(), 'user_id', 'username')
    ,
['prompt'=>'请选择','style'=>'width:150px']) ?>

    <?= $form->field($model, 'tnote')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '创建' : '更新', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
