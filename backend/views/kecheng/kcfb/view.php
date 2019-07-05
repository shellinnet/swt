<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\KcfbModel */

$this->title = $model->Id;
$this->params['breadcrumbs'][] = ['label' => '发布新课程通知', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kcfb-model-view">


    <p>
        <?= Html::a('更新', ['update', 'id' => $model->Id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->Id], [
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
            'Id',
            'biaoti',
            //'time:datetime',
           // 'neirong:ntext',
           // 'head:ntext',
           'img1',
            'img2',
            'img3',
            'img4',
            'kcname',
            'kcname2',
            'kcname3',
            'kcname4',
        ],
    ]) ?>

</div>
