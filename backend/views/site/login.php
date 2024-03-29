<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = '登录';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sign-overlay"></div>
<div class="signpanel"></div>

<div class="panel signin">
    <div class="panel-heading">
        <h4 class="panel-title">欢迎登陆四物堂管理系统</h4>
    </div>
    
    <div class="panel-body">
         <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>


                <?= $form->field($model, 'username',[
                    'inputOptions'=>[
                        'placeholder'=>'请输入用户名',
                    ],
                    'inputTemplate'=>
                    '<div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-user"></i></span>{input}
                    </div>',
                ])->label(false)?>

                <?= $form->field($model, 'password',[
                     'inputOptions'=>[
                        'placeholder'=>'请输入密码',
                    ],
                    'inputTemplate'=>
                    '<div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-lock"></i></span>{input}
                    </div>',
                ])->label(false)?>

                <?= $form->field($model, 'rememberMe')->checkbox() ?>
                <div><a class="forgot">忘记密码</a></div>
                <div class="form-group">
                    <?= Html::submitButton('登录', ['class' => 'btn btn-primary btn-success btn-quirk btn-block', 'name' => 'login-button']) ?>
                </div>


            <?php ActiveForm::end(); ?>
            <hr class="invisible">
          <!--   <div class="form-group">
            <a href="#" class="btn btn-default btn-quirk btn-stroke btn-stroke-thin btn-block"></a>
            </div> -->
    </div>
</div><!-- panel -->

 
        
        
       

