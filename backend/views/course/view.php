<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\CourseModel */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => '课程信息管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="course-model-view">

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
            //'id',
            'time',
            'shiduan.shiduan',
            'course.kname',
            'total',
            'teacher.tname',
           
            'member.username',
            'syks',
         
          
        ],
    ]) ?>

</div>
