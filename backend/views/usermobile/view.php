<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\UsermobileModel */

$this->title = $model->userid;
$this->params['breadcrumbs'][] = ['label' => '学员管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usermobile-model-view">

    <p>
        <?= Html::a('更新', ['update', 'id' => $model->userid], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->userid], [
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
           
            'username',
           
            'email:email',
                
            'mobile',
            'nickname',
        
        ],
    ]) ?>

</div>
