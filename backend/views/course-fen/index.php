<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\CourseFenSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '数据分类信息';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="course-fen-model-index">

   
    <p>
        <?= Html::a('添加数据信息', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
      
             'cf_id'

             ,
            'c_leibie',
           'course_lei.c_leiname',
           
            
            'cf_name',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
