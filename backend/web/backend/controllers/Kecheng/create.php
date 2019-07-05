<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\KechengModel */

$this->title = 'Create Kecheng Model';
$this->params['breadcrumbs'][] = ['label' => 'Kecheng Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kecheng-model-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
