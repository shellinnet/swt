<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\KechengModel */

$this->title = $model->keid;
$this->params['breadcrumbs'][] = ['label' => 'Kecheng Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kecheng-model-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->keid], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->keid], [
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
            'introduce1:ntext',
            'teacherid',
            'ktime_id:datetime',
            'jwid',
        ],
    ]) ?>

</div>
