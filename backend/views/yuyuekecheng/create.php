<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\YuyuekechengModel */

$this->title = '创建预约';
$this->params['breadcrumbs'][] = ['label' => '预约管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="yuyuekecheng-model-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
