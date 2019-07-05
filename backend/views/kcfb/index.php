<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\KcfbSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '课程发布管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kcfb-model-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('发布新课程通知', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
     

           // 'Id',
            'biaoti',
            'kcname',
            'kcname2',
            'kcname3',
            'kcname4',
           // 'time:date',
           // 'neirong:ntext',
           // 'neirong2:ntext',
            // 'img1',
            // 'img2',
            // 'img3',
            // 'img4',


            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
