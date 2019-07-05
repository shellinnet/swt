<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\AdminSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '管理员信息管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="admin-model-index">

    <p>
        <?= Html::a('添加', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
           // 'id',
            //'m_weixin',
           // 'm_name',
           // 'm_sex',
           // 'm_rzdate',
            'username',
             'm_tel',
             
            // 'm_qx_id',
            
           //'password',
            // 'password_hash',
             'created_at:datetime',
            // 'status',
            // 'role',
            // 'avatar',
            // 'auth_key',
            // 'updated_at',
            'm_beizhu:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
