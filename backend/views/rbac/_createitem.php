<?php
    use yii\bootstrap\ActiveForm;
    use yii\helpers\Html;
   
  //  $this->registerCssFile('admin/css/compiled/new-user.css');
  
?>
<style>
 .zitired{
    font-size: 14px;
    color:red;
 }
 .ziti{
    font-size: 14px;
 }
</style>
    <!-- main container -->
        <div class="container-fluid">
            <div id="pad-wrapper" class="new-user">
              
                <div class="row-fluid form-wrapper">
                    <!-- left column -->
                    <div class="span9 with-sidebar">
                        <div class="container">
                                <?php
                                if (Yii::$app->session->hasFlash('info')) {
                                    echo Yii::$app->session->getFlash('info');
                                }
                                $form = ActiveForm::begin([
                                    'fieldConfig' => [
                                        'template' => '<div class="span12 field-box">{label}{input}</div>{error}',
                                    ],
                                    'options' => [
                                        'class' => 'new_user_form inline-input',
                                    ],
                                ]);
                          
?>
                                <div class="span12 field-box ziti">
                                <?php echo Html::label('　　　　　　职位：', null). Html::textInput('description', '', ['class' => 'span9']); ?>
                                </div>
                                <div class="span12 field-box ziti">
                                <?php echo Html::label('基本默认权限名称：', null). Html::textInput('name', '', ['class' => 'span9']); ?>
                                </div>
                                <div class="zitired">(注：添加基本权限的名称，已添加：超级管理员，教务主管，教务，老师。基本权限名称不能重复添加)</div>
                                <p></p>
                                <p></p>
                                <div class="span11 field-box actions">
                                　　<text>&nbsp;　　　　  　</text>
                                    <?php echo Html::submitButton('添加', ['class' => 'btn-glow primary ziti']); ?>
                                    <span>OR</span>
                                    <?php echo Html::resetButton('取消', ['class' => 'reset ziti']); ?>
                                </div>
                            <?php ActiveForm::end(); ?>
                        </div>
                    </div>

                
                </div>
            </div>
        </div>
  
    <!-- end main container -->
