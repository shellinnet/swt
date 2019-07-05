<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\AleibieSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '会员类别管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="aleibie-model-index">   

    <p>
        <?= Html::a('添加会员类别', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [

            'l_leibie',
            'l_name',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
