<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\KechengSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '课程管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kecheng-model-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([

        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [            

           //'id',
            'keid',
            'kname',
            //'zks',
            //'introduce1:ntext',
            'teacherid',
            'teacher.tname',
           //  'ktime_id:datetime',
            // 'jwid',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
