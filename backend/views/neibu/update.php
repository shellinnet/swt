<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\NeibuModel */

$this->title = 'Update Neibu Model: ' . $model->Id;
$this->params['breadcrumbs'][] = ['label' => 'Neibu Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Id, 'url' => ['view', 'id' => $model->Id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="neibu-model-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
