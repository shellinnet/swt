<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\AdminModel */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => '管理员信息管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="admin-model-view">

    <p>
        <?= Html::a('更新', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->id], [
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
            'id',
            'username',
           // 'm_weixin',
           // 'm_name',
           // 'm_sex',
           // 'm_rzdate',
            'm_tel',
            
           // 'm_qx_id',
            
            'password',
            //'password_hash',
            //'created_at',
            //'status',
            'm_beizhu:ntext',
            //'role',
            //'avatar',
           // 'auth_key',
           // 'updated_at',
        ],
    ]) ?>

</div>
