<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\StudentModelSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '学员信息管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="student-model-index">
        <?= Html::a('添加学员信息', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [

            //'s_id',
            's_weixin',
            's_name',
            //'s_sex',
            's_state',
             'c_id',
             't_id',
             's_telephone',
            // 's_note',
             's_ctimes:datetime',
             't_beizhu',
            // 'c_leibie',
            // 'password',
            // 'password_hash',
             'created_at',
            // 'update_at',
            // 'l_lei_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
