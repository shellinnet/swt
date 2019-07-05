<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\AleibieModel */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => '会员类别管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="aleibie-model-view">

    <p>
        <?= Html::a('更新', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'l_leibie',
            'l_name',
        ],
    ]) ?>

</div>
