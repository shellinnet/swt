<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\TongzhiModel */

$this->title = '创建新通知';
$this->params['breadcrumbs'][] = ['label' => '通知管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tongzhi-model-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
