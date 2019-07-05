<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\TeacherleiModel */

$this->title = '添加老师类别';
$this->params['breadcrumbs'][] = ['label' => '老师类别管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="teacherlei-model-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
