<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\KechengSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kecheng Models';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kecheng-model-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Kecheng Model', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'keid',
            'kname',
            'zks',
            'introduce1:ntext',
            // 'teacherid',
            // 'ktime_id:datetime',
            // 'jwid',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
