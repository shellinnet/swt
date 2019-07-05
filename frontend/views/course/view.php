<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\CourseModel */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Course Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="course-model-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
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
            'time',
            'ktime_id:datetime',
            'kid',
            'total',
            'tqian',
            'tsyks',
            'xueyuanid',
            'syks',
            'tnote:ntext',
            'status',
            'formId',
            'jwid',
            'openid',
            'wid8',
        ],
    ]) ?>

</div>
