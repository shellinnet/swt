<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\YuyueModel */

$this->title = '创建预约信息';
$this->params['breadcrumbs'][] = ['label' => '预约管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="yuyue-model-create">

   

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
