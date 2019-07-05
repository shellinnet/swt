<?php
use yii\helpers\Html;
$conn=mysqli_connect('hdm121115553.my3w.com','hdm121115553','swt62899308swt','hdm121115553_db');
  if($conn->connect_errno){
      die('连接失败'.$conn->connect_errno);
  }
  $conn->set_charset('utf8');

$name="SELECT keid,kname FROM kecheng group by keid;";
$kechengname=mysqli_query($conn,$name);

$this->title = '创建老师信息';
$this->params['breadcrumbs'][] = ['label' => '老师管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="teacher-model-create">
<div style="width:700px;height: 80px;">
 <form action='index.php?r=teacher/index' method='post'  enctype="multipart/form-data" name="form1" onsubmit="return sumbit_sure()">
 老师Id：<input type="text" name="teacherid" ></input>
老师名：<input type="text" name="tname"></input>
密码：<input type="text" name="password" ></input>
<!-- 课程名：<input type="text" name="kname" ></input> -->

 <div style="float:left;" >&ensp;
     课程名：<select name="kname" style="width:150px;height: 30px;">

        <?php foreach ($kechengname as $kname)
{?>
    <option value="<?=$kname['keid']?>"><?=$kname['kname']?></option>
 <?php
 }
 ?>
    </select>
    </div> 

<input type ="submit"  name="submit" value="创建" style="background:#eee;width:85px;height:28px;border-radius:10px;cursor:pointer;border:2px;font:14px Arial, Helvetica, sans-serif;"  />

</form>
<script>
function sumbit_sure(){  
var gnl=confirm("确定要提交?");  
if (gnl==true){  
return true;  
}else{  
return false;  
}  
} 
</script>
</div>
</div>
