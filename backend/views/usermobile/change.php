<?php 
use yii\helpers\Html;
$conn=mysqli_connect('hdm121115553.my3w.com','hdm121115553','swt62899308swt','hdm121115553_db');
  if($conn->connect_errno){
      die('连接失败'.$conn->connect_errno);
  }
  $conn->set_charset('utf8');
  //学生信息修改

$studentid=isset($_GET["id"])?$_GET["id"]:'';
$studenttel=isset($_GET["tel"])?$_GET["tel"]:'';


?>
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

<script type="text/javascript" src="http://www.qingyingtech.cn/swt/backend/web/statics/js/jquery-1.4.2.min.js"></script>
<div class="container">
  <div class="juli"></div>
  <div class="ziti">四物堂---学员手机号修改</div>
    <img src="/swtmanager/backend/web/statics/images/top.jpg" width="1100" height="82" border="0" usemap="#Map" />
<map name="Map" id="Map"><area shape="rect" coords="3,3,192,78" href="/swtmanager/backend/web/index.php?r=usermobile/register" />
<area shape="rect" coords="229,4,420,78" href="/swtmanager/backend/web/index.php?r=usermobile/main" /><area shape="rect" coords="454,3,643,79" href="/swtmanager/backend/web/index.php?r=teacher/main"/><area shape="rect" coords="679,5,863,80" href="#" /><area shape="rect" coords="902,4,1091,78" href="#" /></map>
  <div class="juli"></div>
</div>
<div class="juli"></div>

<div class="main">
     <div class="juli"></div>
      <div class="juli"><span style="font-size:16px">学员手机</span>&nbsp;&nbsp; </div>
      <div class="juli"></div>
      <form action="/swtmanager/backend/web/index.php?r=usermobile/changeok" method="post">
      <div class="juli"></div>
      <div class="juli">&nbsp;手机号&nbsp;&nbsp;</span><input  type="text" name="studentphone" value="<?php echo $studenttel?>" > </div>
        <div class="juli"></div>
        <div class="juli"></div>
        <input  type="hidden" name="studentid" value="<?php echo $studentid?>" >
      <div class="juli"></div>
      <div class="width:500px;height:30px;margin: 0px auto;" aligin="center"><input type="submit" name="submit" value="确认" class="button" /></div>
        </div>
      </form>
</div>
