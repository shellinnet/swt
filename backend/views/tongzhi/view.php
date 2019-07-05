<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\TongzhiModel */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => '通知管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tongzhi-model-view">



    <p>
        <?= Html::a('Update', ['更新通知', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['删除通知', 'id' => $model->id], [
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
           // 'id',
            'biaoti',
            'created_time:datetime',
            'neirong:ntext',
            'img',
           // 'img2',
        ],
    ]) ?>

</div>
