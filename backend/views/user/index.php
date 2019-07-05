<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '客户信息';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-model-index">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
           // ['class' => 'yii\grid\SerialColumn'],

            'Id',
            'username',
            //'password',
           // 'password_hash',
            'email:email',
            // 'emal_validate',
            // 'role',
             'status'=>[
               'label'=>'状态',
               'attribute' => 'status',
               'value' => function($model){
                    return ($model->status == 10)?'VIP客户':'普通客户';
               },
               'filter' => ['0'=>'普通客户','10'=>'VIP客户'],
             ],
             'created_at:datetime',
            // 'avator',
            // 'auth_key',
            //'vip',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
