<?php 
use yii\helpers\Html;
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
echo $stid;
if($stid==10){
$teach="update admin set status=0 where id='".$id."'";
$teacher=mysqli_query($conn,$teach);
}else{
  $teach="update admin set status=10 where id='".$id."'";
$teacher=mysqli_query($conn,$teach);
}

 ?>
<script type="text/javascript" src="http://www.qingyingtech.cn/swt/backend/web/statics/js/jquery-1.4.2.min.js"></script>
<style>
.container{
    width:1120px;
    height:150px;
    border:1px #8A8A8A solid;
    background-color:#fff;
    margin-left:15px;
    border-radius:5px;
   }
.ziti{
  font-size: 16px;
  font-family: 微软雅黑;
}

.zitired{
  font-size: 16px;
  font-family: 微软雅黑;
  color:red;
}
.juli{
  width: 300px;
  height: 15px;
}
.main{
    width:1120px;
    height:500px;
    border:1px #8A8A8A solid;
    background-color:#fff;
    margin-left:15px;
    border-radius:5px;
}
.left{
  width: 50px;
  float:left;
  display: inline;
}
.leftbig{
  width: 400px;
  float:left;
  display: inline;
}
.button{
background:green;/*背景色*/
font-size: 16px;
color:white;/*字体颜色*/
width:150px;
height:40px;

}
</style>

<div class="container">
  <div class="juli"></div>
  <div class="ziti">四物堂---老师状态修改</div>
    <img src="/swtmanager/backend/web/statics/images/top.jpg" width="1100" height="82" border="0" usemap="#Map" />
<map name="Map" id="Map"><area shape="rect" coords="3,3,192,78" href="/swtmanager/backend/web/index.php?r=usermobile/register" />
<area shape="rect" coords="229,4,420,78" href="/swtmanager/backend/web/index.php?r=usermobile/main" /><area shape="rect" coords="454,3,643,79" href="/swtmanager/backend/web/index.php?r=teacher/main" /><area shape="rect" coords="679,5,863,80" href="/swtmanager/backend/web/index.php?r=tongzhi/main" /><area shape="rect" coords="902,4,1091,78" href="/swtmanager/backend/web/index.php?r=admin/main" /></map>
  <div class="juli"></div>
</div>

<div class="juli"></div>

<div class="main">
<div class="left">&nbsp;</div>
  <div class="leftbig">
   <div class="juli"></div>
    <div class="juli"></div>
<div class="kuan"></div>
<div class="juli zitired">
老师状态修改成功！
</div>
</div>

<div class="leftbig">
<div class="kuan"></div>
 <div class="juli"></div>
  <div class="juli"></div>
<div class="juli ziti">
<a href="http://www.siwutang.vip/swtmanager/backend/web/index.php?r=teacher/teachermsg">返回</a>
</div>
</div>
  
</div>



