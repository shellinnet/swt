<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CourseModel */

$this->title = '更新课程信息: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => '课程信息管理', 'url' => ['index']];

$this->params['breadcrumbs'][] = '更新';

?>
<div class="course-model-update">
    
    <?= $this->render('_form', [
        'model' => $model,
        
    ]) 
    
    ?>

</div>
