<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ArticleModel */

$this->title = '更新文章: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => '文章管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '更新';
?>
<div class="article-model-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
