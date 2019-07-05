<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\CourseLeiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '数据类别管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="course-lei-model-index">

    <p>
        <?= Html::a('添加数据类别', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
                      
            'c_leibie',
            'c_leiname',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
