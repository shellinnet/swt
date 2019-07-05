<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\TongzhiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '通知管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tongzhi-model-index">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('创建新通知', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
         
            'id',
            'biaoti',
            'topbiaoti',
            'created_time:datetime',
            'neirong:ntext',


            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
