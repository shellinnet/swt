<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\UsermobileSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '学员管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usermobile-model-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <!-- <p>
        <?= Html::a('创建学员信息', ['create'], ['class' => 'btn btn-success']) ?>
    </p> -->
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
         

           // 'userid',
           //'user_id',
            'username',
            //'password',
            'email:email',
            
            // 'openid',
            // 'created_at',
             //'shiduanid',
            // 'password_hash',
            // 'itemid',
            // 'auth_key',
            // 'avator',
            // 'updated_at',
            // 'truename',
             'mobile',
             'nickname',
            // 'teacherid',
            // 'tname',
            // 'adminid',
            // 'adminname',
            // 'lastkeshi',
            // 'riqi',
            // 'total',
            // 'city',
            // 'liuyan:ntext',
            // 'formId',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
