<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ZhihudataModel */

$this->title = 'Create Zhihudata Model';
$this->params['breadcrumbs'][] = ['label' => 'Zhihudata Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="zhihudata-model-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
