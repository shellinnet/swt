<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\YuyueSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '预约管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="yuyue-model-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

  
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
           

            //'id',
            'kid',
            'name',
            'mobile',
           // 'time',
            // 'sid',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
