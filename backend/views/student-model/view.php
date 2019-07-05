<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\StudentModel */

$this->title = $model->s_id;
$this->params['breadcrumbs'][] = ['label' => '学员信息管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="student-model-view">

    <p>
        <?= Html::a('更新', ['update', 'id' => $model->s_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->s_id], [
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
            's_id',
            's_weixin',
            's_name',
            's_sex',
            's_state',
            'c_id',
            't_id',
            's_telephone',
            's_note',
            's_ctimes:datetime',
            't_beizhu',
            'c_leibie',
            'password',
            'password_hash',
            'created_at',
            'update_at',
            'l_lei_id',
        ],
    ]) ?>

</div>
