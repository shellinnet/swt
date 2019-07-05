<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\YuyuekechengModel */

$this->title = '更新预约 ' . $model->kid;
$this->params['breadcrumbs'][] = ['label' => '预约管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->kid, 'url' => ['view', 'id' => $model->kid]];
$this->params['breadcrumbs'][] = '更新';
?>
<div class="yuyuekecheng-model-update">

    <?= $this->render('_form', [
        'model' => $model,
        
    ]) ?>

</div>
<div style="width: 200px;height: 30px;"></div>
<form action="index.php?r=yuyuekecheng/upload&id=<?php echo $model->kid?>" method="post" enctype="multipart/form-data">
    <input type="file" name="file" />上传图片
    <input type="submit" value="上传图片"  name="上传图片"/>
</form>