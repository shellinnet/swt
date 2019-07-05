<?php
$conn=mysqli_connect('localhost','root','root','swtmanager');
  if($conn->connect_errno){
      die('连接失败'.$conn->connect_errno);
  }
  $conn->set_charset('utf8');

use yii\helpers\Html;
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

</style>


<div class="container">
  <div class="juli"></div>
  <div class="ziti">四物堂---学员注册</div>
    <img src="/statics/images/top.jpg" width="1100" height="82" border="0" usemap="#Map" />
<map name="Map" id="Map"><area shape="rect" coords="3,3,192,78" href="/swtmanager/backend/web/index.php?r=usermobile/register" />
<area shape="rect" coords="229,4,420,78" href="#" /><area shape="rect" coords="454,3,643,79" href="#" /><area shape="rect" coords="679,5,863,80" href="#" /><area shape="rect" coords="902,4,1091,78" href="#" /></map>
  <div class="juli"></div>
</div>

<div class="juli"></div>

<div class="main">
  <div class="juli"></div>
    <div class="left">&nbsp;</div>
    <div class="left">
      <div class="juli"></div>
      <div class="juli"><span style="font-size:12px">账户设置</span> </div>
      <div class="juli"></div>
      <div >通知信息：</div>
    </div>

</div>



