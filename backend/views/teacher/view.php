<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\TeacherModel */

$this->title = $model->tid;
$this->params['breadcrumbs'][] = ['label' => '老师管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="teacher-model-view">


    <p>
        <?= Html::a('更新', ['update', 'id' => $model->tid], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->tid], [
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
            'teacherid',     
          
            'tname',
            't_sex',
           
            't_telephone',
      
          
          
          
        
            't_beizhu',
       
        
        ],
    ]) ?>

</div>
