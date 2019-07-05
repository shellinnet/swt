<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\UsermobileModel */

$this->title = 'Create Usermobile Model';
$this->params['breadcrumbs'][] = ['label' => 'Usermobile Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usermobile-model-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
