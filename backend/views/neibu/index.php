<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\NeibuSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '内部人员信息';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="neibu-model-index">

    <p>
        <?= Html::a('添加人员', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'Id',
            'username',
            //'userpassword',
            'liebie',
            'createtime',
            //'kehu',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
