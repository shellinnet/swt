<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\KechengModel */

$this->title = 'Update Kecheng Model: ' . $model->keid;
$this->params['breadcrumbs'][] = ['label' => 'Kecheng Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->keid, 'url' => ['view', 'id' => $model->keid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="kecheng-model-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
