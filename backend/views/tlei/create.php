<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\TLeiModel */

$this->title = 'Create Tlei Model';
$this->params['breadcrumbs'][] = ['label' => 'Tlei Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tlei-model-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
