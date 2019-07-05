<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\KcfbModel */

$this->title = '发布新课程通知';
$this->params['breadcrumbs'][] = ['label' => '发布课程管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kcfb-model-create">

  

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
