<?php
 
?>
    <!-- main container -->
        <div class="container-fluid">
            <div id="pad-wrapper" class="new-user">
                <div class="row-fluid header">
                    <h3>分配权限</h3>
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
                                    'fieldConfig' => [
                                        'template' => '<div class="span12 field-box">{label}{input}</div>{error}',
                                    ],
                                    'options' => [
                                        'class' => 'new_user_form inline-input',
                                    ],
                                ]);
                                /*echo $form->field($model, 'username')->textInput(['class' => 'span9']);
                                echo $form->field($model, 'useremail')->textInput(['class' => 'span9']);
                                echo $form->field($model, 'userpass')->passwordInput(['class' => 'span9']);
                                echo $form->field($model, 'repass')->passwordInput(['class' => 'span9']);
                                 */
?>
                                <div class="span12 field-box">
                                <?php echo Html::label('角色名称:', null). Html::encode($parent); ?>
                                </div>
                                <div class="span12 field-box">
                                <?php echo Html::label('角色子节点', null). Html::checkboxList('children', $children['roles'], $roles); ?>
                                </div>
                                <div class="span12 field-box">
                                <?php echo Html::label('权限子节点', null). Html::checkboxList('children',$children['permissions'], $permissions); ?>
                                </div>
                                
                                <div class="span11 field-box actions">
                                    <?php echo Html::submitButton('分配', ['class' => 'btn-glow primary']); ?>
                                    <span>OR</span>
                                    <?php echo Html::resetButton('取消', ['class' => 'reset']); ?>
                                </div>
                            <?php ActiveForm::end();
                               //echo($children['permissions'][0]); 
                                //var_dump($permissions) ;
                              //  Html::checkbox('children',$children['permissions'],  "教务人员管理所有操作"); 
                            ?>
                        </div>
                    </div>

                
                </div>
            </div>
        </div>

