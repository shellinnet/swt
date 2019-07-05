<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ArticleleiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '文章分类管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="articlelei-model-index">

  
        <?= Html::a('添加文章分类', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
   
            'a_liebie_id',
            'lei_name',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
