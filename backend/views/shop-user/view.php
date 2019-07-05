<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\ShopUserModel */

$this->title = $model->userid;
$this->params['breadcrumbs'][] = ['label' => 'Shop User Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shop-user-model-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->userid], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->userid], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'userid',
            'username',
            'password',
            'email:email',
            'openid',
            'created_at',
            'status',
            'password_hash',
            'itemid',
            'auth_key',
            'avator',
            'updated_at',
            'truename',
            'mobile',
            'zhiwei',
            'company',
            'diqu',
            'gumobile',
            'city',
            'liuyan:ntext',
        ],
    ]) ?>

</div>
