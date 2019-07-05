<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\NeibuModel */

$this->title = 'Create Neibu Model';
$this->params['breadcrumbs'][] = ['label' => 'Neibu Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="neibu-model-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
