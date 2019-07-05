<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ShopUserModel */

$this->title = '建立学员信息';
$this->params['breadcrumbs'][] = ['label' => '学员管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shop-user-model-create">

  

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
