<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\AleibieModel */

$this->title = '添加会员类别';
$this->params['breadcrumbs'][] = ['label' => '会员类别管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="aleibie-model-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
