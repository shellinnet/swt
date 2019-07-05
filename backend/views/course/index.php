<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\CourseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '课程信息管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="course-model-index">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [          

            //'id',
            'time',
            'ktime_id',
            'shiduan.shiduan',
            'kid',

            'course.kname',
            'total',
             'tqian',
             'teacher.tname',
            // 'tsyks',
             'xueyuanid',
             'member.username',
            // 'syks',
             'tnote:ntext',

             //'status',
            // 'formId',
            // 'jwid',
            // 'openid',
            // 'wid8',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
