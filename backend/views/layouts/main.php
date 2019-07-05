<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use backend\widgets\sidebar\SidebarWidget;
use common\models\AdminModel;
use yii\base\Model;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<style type="text/css">
.top2{
    width:1120px;
    height:30px;
}
.leftbig{
  width: 400px;
  float:left;
  display: inline;
  height:30px;
}
.ziti{
  font-size: 16px;
  font-family: 微软雅黑;
}
.left22{
  width: 20px;
  float:left;
  display: inline;
}

</style>
<body>
<?php $this->beginBody() ?>

<div class="headerpanel">
        <div class="logopanel">
            <h2><a href="#">四物堂管理系统</a></h2>
        </div><!-- logopanel -->
        
        <div class="headerbar">
            <!-- <a id="menuToggle" class="menutoggle"><i class="fa fa-home">首页</i></a> -->

        <a href="/swtmanager/backend/web/index.php?r=site/index" class="menutoggle" style="width:100px;"><i class="fa fa-home" aria-hidden="true" style="font-size: 16px;">首页</i></a>

            <div class="header-right">
                <ul class="headermenu">
                    <li>
                    <div id="noticePanel" class="btn-group">
                       
                    </div>
                    </li>
                    
                    <li>
                        <div class="btn-group">

                             <button type="button" class="btn btn-logged" data-toggle="dropdown">
                                <img src="<?=Yii::$app->params['avatar']['small'] ?>" alt="头像">
                                <?=Yii::$app->user->identity->username?>
                                <span class="caret"></span>
                            </button> 
                             <ul class="dropdown-menu pull-right">
                                <li><a href="index.php?r=manage/changeemail"><i class="fa fa-user"></i> 个人中心</a></li>
                                <li><a href="index.php?r=manage/changepass"><i class="fa fa-cog"></i> 修改密码</a></li>
                                <li><a href="<?php echo Yii\helpers\Url::to(['site/logout'])?>"><i class="fa fa-cog" ></i> 退出</a></li>                                                 
                            </ul> 
                        </div>
                    </li>
                </ul>
            </div><!-- header-right -->
        </div><!-- headerbar -->
    </div><!-- header-->
</header>

<section>

<div class="leftpanel">
    <div class="leftpanelinner">

      <!-- ################## LEFT PANEL PROFILE ################## -->


    <div class="tab-content">
    
        <div class="tab-pane active" id="mainmenu">
            
            <!-- sidebar组件 -->
            <?=SidebarWidget::widget([
                'encodeLabels' => false,
            ])?>
        </div>
    </div><!-- tab-content -->

    </div><!-- leftpanelinner -->
</div><!-- leftpanel -->

  <div class="mainpanel">
    <div class="contentpanel">
        <?= Breadcrumbs::widget([
            'homeLink'=>[
                'label' => '<i class="fa fa-home mr5"></i> '.Yii::t('yii', 'Home'),
                'url' => 'http://www.siwutang.vip/swtmanager/backend/web/index.php?r=site/index',
                'encode' => false,
            ],
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            'tag'=>'ol',
            'options' => ['class' => 'breadcrumb breadcrumb-quirk']
        ]) ?>  
            
      
        <?= Alert::widget() ?>

        <?=$content?>
    </div>
    
  </div><!-- mainpanel -->

</section>

<?php Modal::begin([    
    'id' => 'create-modal',    
    'header' => '<h4 class="modal-title"></h4>',    
]); 
Modal::end();
?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
