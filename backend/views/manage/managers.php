<?php
$this->title = '管理员列表';
$this->params['breadcrumbs'][] = ['label' => '管理员管理', 'url' => ['/manage/managers']];
$this->params['breadcrumbs'][] = $this->title;
$this->registerCssFile('admin/css/compiled/user-list.css');
?>
<!-- main container -->
      
        <div class="container-fluid">
            <div id="pad-wrapper" class="users-list">
                <div class="row-fluid header">
                    <h3>管理员列表</h3>
                    <div class="span10 pull-right">
                        
                    <a href="<?php echo yii\helpers\Url::to(['manage/reg']); ?>" class="btn-flat success pull-right">
                            <span>&#43;</span>
                            添加新管理员
                        </a>
                    </div>
                </div>

                <!-- Users table -->
                <div class="row-fluid table">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="span2">
                                    管理员ID
                                </th>
                                <th class="span2">
                                    <span class="line"></span>管理员账号
                                </th>
                                <th class="span2">
                                    <span class="line"></span>管理员邮箱
                                </th>
                                <th class="span3">
                                    <span class="line"></span>注册时间
                                </th>
                                
                              
                                <th class="span2">
                                    <span class="line"></span>操作
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($managers as $manager): ?>
                        <!-- row -->
                        <tr>
                            <td>
                                <?php echo $manager->id; ?>
                            </td>
                            <td>
                                <?php echo $manager->username; ?>
                            </td>
                            <td>
                                <?php echo $manager->adminemail; ?>
                            </td>
                            
                            <td>
                                <?php echo date("Y-m-d H:i:s", $manager->created_at); ?>
                            </td>
                            <td class="align-right">
                            <?php if ($manager->id != 1): ?>
                            <a href="<?php echo yii\helpers\Url::to(['manage/del', 'id' => $manager->id]) ?>">删除</a>
                            <a href="<?php echo yii\helpers\Url::to(['manage/assign', 'id' => $manager->id]) ?>">授权</a>
                            <?php endif; ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                       </tbody>
                    </table>
                    <?php
                        if (Yii::$app->session->hasFlash('info')) {
                            echo Yii::$app->session->getFlash('info');
                        }
                    ?>
                </div>
                <div class="pagination pull-right">
                    <?php echo yii\widgets\LinkPager::widget(['pagination' => $pager, 'prevPageLabel' => '&#8249;', 'nextPageLabel' => '&#8250;']); ?>
                </div>
                <!-- end users table -->
            </div>
        </div>
    <!-- end main container -->

