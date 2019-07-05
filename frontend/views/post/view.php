<?php
  $this->title = $data['title'];
  $this->params['breadcrumbs'][] = ['label'=>'文章','url'=>['post/index']];
  $this->params['breadcrumbs'][] = $this->title;
  echo 'View界面';
?>
<div class="row">
   <div class="col-lg-9">
        <h1><?=$data['title']?></h1>
   </div>
   <span>作者：<?=$data['user_name']?></span>
   <span>发布：<?=date('Y-m-d',$data['created_at']);?></span>
   <span>浏览：0次</span>
</div>
<div class="page-content">
<?=$data['content']?>
</div>
<div class="page-tag">
标签：
</div>
<div class="col-lg-3">
</div>
