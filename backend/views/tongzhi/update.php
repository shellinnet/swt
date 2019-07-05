<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TongzhiModel */

$this->title = '更新通知 ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => '通知管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '更新通知';
?>
<div class="tongzhi-model-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

   
</div>
<div style="width: 200px;height: 30px;"></div>
<form action="index.php?r=tongzhi/upload&id=<?php echo $model->id?>" method="post" enctype="multipart/form-data">
    <input type="file" name="file" />上传图片
    <input type="submit" value="上传图片"  name="上传图片"/>
</form>


