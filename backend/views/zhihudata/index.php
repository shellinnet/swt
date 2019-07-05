<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ZhihudataSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '知乎数据管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="zhihudata-model-index">

        <?= Html::a('添加', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [          

            'Id',
            'customer',
            'jindu',
            'user',
            'createtime',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>


