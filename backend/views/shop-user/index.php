<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ShopUserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '学员管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shop-user-model-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
<!-- 
    <p>
        <?= Html::a('创建学员信息', ['create'], ['class' => 'btn btn-success']) ?>
    </p> -->
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
         

            //'userid',
            'username',
            //'password',
            'email:email',
            //'openid',
            "created_at:date",
            
            // 'password_hash',
             
            // 'auth_key',
            // 'avator',
            // 'updated_at',
             
             'itemid',
              'total',
               'lastkeshi',
             'teacherid',
           
             'riqi',
            'shiduanid',
           'truename',
             'mobile',
            // 'city',
             'liuyan:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
