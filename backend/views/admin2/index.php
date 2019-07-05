<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\Admin2Search */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Admins';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="admin-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Admin', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'm_weixin',
            'm_name',
            'm_sex',
            'm_rzdate',
            // 'm_tel',
            // 'm_beizhu:ntext',
            // 'm_qx_id',
            // 'username',
            // 'password',
            // 'password_hash',
            // 'created_at',
            // 'status',
            // 'role',
            // 'avatar',
            // 'auth_key',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
