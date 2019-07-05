<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\KechengModel */

$this->title = $model->keid;
$this->params['breadcrumbs'][] = ['label' => '课程管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kecheng-model-view">

    <p>
        <?= Html::a('更新', ['update', 'id' => $model->keid], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->keid], [
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
            'keid',
            'kname',
            'zks',
            'teacherid',
            'teacher.tname',
               
        ],
    ]) ?>

</div>
