<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\KechengModel */

$this->title = '课程添加';
$this->params['breadcrumbs'][] = ['label' => '课程管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kechengmodel-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
