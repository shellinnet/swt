<?php 
header("Content-type: text/html; charset=utf-8"); 
$conn=mysqli_connect('hdm121115553.my3w.com','hdm121115553','swt62899308swt','hdm121115553_db');
  if($conn->connect_errno){
      die('连接失败'.$conn->connect_errno);
  }
  $conn->set_charset('utf8');

$id=$_REQUEST['id'];

$zt="select * from admin where id='".$id."'";
$ztx=mysqli_query($conn,$zt);
while($st=mysqli_fetch_array($ztx)){
     $stid=$st['status'];
}

if($stid==10){
$teach="update admin set status=0 where id='".$id."'";
$teacher=mysqli_query($conn,$teach);
if($teacher=='true'){
    echo "<script>alert('老师状态修改成功！');window.close(this);</script>";
   }
}else{
  $teach="update admin set status=10 where id='".$id."'";
$teacher=mysqli_query($conn,$teach);
if($teacher=='true'){
    echo "<script>alert('老师状态修改成功！');window.close(this);</script>";
   }
}

 ?>
<script type="text/javascript" src="http://www.qingyingtech.cn/swt/backend/web/statics/js/jquery-1.4.2.min.js"></script>
<style>
.juli{
  width: 300px;
  height: 15px;
}
.kuang{
  width:400px;
  height:30px;
}
.left{
  width: 50px;
  float:left;
  display: inline;
}
.leftbig{
  width: 200px;
  float:left;
  display: inline;
}
.button{

background:#7CC7EA;;/*背景色*/
font-size: 14px;
color:white;/*字体颜色*/
width:80px;
height:30px;

}
.ziti{
  font-size: 14px;
  font-family: 微软雅黑;
}
.input{
  width: 100px;
  height: 30px;
}
</style>

<div class="left">&nbsp;</div>
  <div class="leftbig">
   <div class="juli"></div>
    <div class="juli"></div>
<div class="kuan"></div>
<div class="juli zitired">
老师状态修改成功！
</div>
</div>






