<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\CourseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Course Models';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="course-model-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Course Model', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'time',
            'ktime_id:datetime',
            'kid',
            'total',
            // 'tqian',
            // 'tsyks',
            // 'xueyuanid',
            // 'syks',
            // 'tnote:ntext',
            // 'status',
            // 'formId',
            // 'jwid',
            // 'openid',
            // 'wid8',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
