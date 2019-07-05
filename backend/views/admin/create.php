<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\AdminModel */

$this->title = '添加管理员信息';
$this->params['breadcrumbs'][] = ['label' => '管理员信息管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="admin-model-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
