<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
 
$this->title = $model->kid;
$this->params['breadcrumbs'][] = ['label' => '预约管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="yuyuekecheng-model-view">

    <p>
        <?= Html::a('更新', ['update', 'id' => $model->kid], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->kid], [
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
            'kid',
            'kecheng',
            'teacherid',
            'keshi',
            'sum',
            'datetime',
            'nsum',
            'img',
        ],
    ]) ?>

</div>
