<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\YuyuekechengSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '预约课程管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="yuyuekecheng-model-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('创建预约', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
      

            //'kid',
            'biaoti',
            'kecheng',
            'teacherid',
            'teacher.tname',
            'keshi',
            'sum',
            'datetime',
            'nsum',
            
           // 'jieshao'

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
