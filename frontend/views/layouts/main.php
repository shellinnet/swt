<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;


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
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::t('common','MY Application'),//使用语言包
        'brandUrl' => ['/site/index'],
      
    ]);
    $leftMenus = [
        ['label' => Yii::t('yii','Home'), 'url' => ['/site/index']],//默认语言包
       
        ['label' => Yii::t('common','Article'), 'url' => ['/post/index']],
        ['label' => Yii::t('common','About'), 'url' => ['/site/about']],
        ['label' => Yii::t('common','Contact'), 'url' => ['/site/contact']],
    ];
    if (Yii::$app->user->isGuest) {
        $rightMenus[] = ['label' => Yii::t('common','Signup'), 'url' => ['/site/signup']];
        $rightMenus[] = ['label' => Yii::t('common','Login'), 'url' => ['/site/login']];
    } else {
        $rightMenus[] = [
             'label' => '<img src="'.Yii::$app->params['avatar']['small'].'" alt="'.Yii::$app->user->identity->username.'">',  
             //'url'=>['/site/logout'],          
             'linkOptions'=>['class'=>'avatar'],
             'items'=>[
                 ['label'=>'<i class="fa fa-user-md"></i>个人中心','url'=>['/site/member']],
                 ['label'=> '<i class="fa fa-sign-out"></i>退出','url'=>['/site/logout'],'linkOptions'=>['data-method'=>'post']],//点击退出
                
             ],
             
        ];
    }
     echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-left'],
        'encodeLabels' => false,  //取消代码过滤，比如img生效
        'items' => $leftMenus,
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'encodeLabels' => false,  //取消代码过滤，比如img生效
        'items' => $rightMenus,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
