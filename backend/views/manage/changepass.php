<?php
    use yii\bootstrap\ActiveForm;
    use yii\helpers\Html;
    $this->title = '修改密码';
    $this->params['breadcrumbs'][] = ['label' => '管理员管理', 'url' => ['/manage/managers']];
    $this->params['breadcrumbs'][] = $this->title;
    $this->registerCssFile('admin/css/compiled/new-user.css');
?>
    <!-- main container -->
        
        <div class="container-fluid">
            <div id="pad-wrapper" class="new-user">
                <div class="row-fluid header">
                    <h3>修改密码</h3>
                </div>

                <div class="row-fluid form-wrapper">
                    <!-- left column -->
                    <div class="span9 with-sidebar">
                        <div class="container">
<?php
    if (Yii::$app->session->hasFlash('info')) {
        echo Yii::$app->session->getFlash('info');
    }
    $form = ActiveForm::begin([
        'options' => ['class' => 'new_user_form inline-input'],
        'fieldConfig' => [
            'template' => '<div class="span12 field-box">{label}{input}</div>{error}'
        ],
    ]);
?>
<?php echo $form->field($model, 'username')->textInput(['class' => 'span9', 'disabled' => true]); ?>
<?php echo $form->field($model, 'password')->passwordInput(['class' => 'span9']); ?>
<?php echo $form->field($model, 'repass')->passwordInput(['class' => 'span9']); ?>
<div class="span11 field-box actions">
    <?php echo Html::submitButton('修改', ['class' => 'btn-glow primary']); ?>
    <span>或者</span>
    <?php echo Html::resetButton('取消', ['class' => 'reset']); ?>
</div>
<?php ActiveForm::end(); ?>
                        </div>
                    </div>

                  
                    </div>
                </div>
            </div>
        </div>
    <!-- end main container -->

