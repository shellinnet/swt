<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\TeacherleiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '老师类别管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="teacherlei-model-index">

        <?= Html::a('添加', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'tl_id',
            'tl_name',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
