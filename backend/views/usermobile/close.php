<?php 
use yii\helpers\Html;
$conn=mysqli_connect('hdm121115553.my3w.com','hdm121115553','swt62899308swt','hdm121115553_db');
  if($conn->connect_errno){
      die('连接失败'.$conn->connect_errno);
  }
  $conn->set_charset('utf8');
  //学生信息修改
$submit=isset($_POST["submit"])?$_POST["submit"]:'';
$studentid=isset($_POST["studentid"])?$_POST["studentid"]:'';
$studentname=isset($_POST["studentname"])?$_POST["studentname"]:'';
$kname=isset($_POST["kname"])?$_POST["kname"]:'';
$teacher=isset($_POST["teacher"])?$_POST["teacher"]:'';
$shiduan=isset($_POST["shiduan"])?$_POST["shiduan"]:'';
$studentkeshi=isset($_POST["studentkeshi"])?$_POST["studentkeshi"]:'';
$studentdate=isset($_POST["studentdate"])?$_POST["studentdate"]:'';
$studenttime=isset($_POST["studenttime"])?$_POST["studenttime"]:'';
$studentphone=isset($_POST["studentphone"])?$_POST["studentphone"]:'';
$password=isset($_POST["password"])?$_POST["password"]:'';
$zks=isset($_POST["zks"])?$_POST["zks"]:'';
$yuanshiduan=isset($_POST["yuanshiduan"])?$_POST["yuanshiduan"]:'';


//计算有效时间
  $youxiaotime=$studenttime;

$createdtime=date("Y-m-d",time());

if($studentid<>''){
  
    //先删除原先的学员上课信息,未签到，从指定日删除
    //查出从指定日开始一共几个具体日期
    $rq="select time from course where kid='".$kname."' and teacherid='".$teacher."' and ktime='".$yuanshiduan."' and xueyuan='".$studentname."' and qian=0";
    $riqi=mysqli_query($conn,$rq);
    while($zd=mysqli_fetch_array($riqi)){
        $zdr=$zd['time'];
        $sc="DELETE from course where kid='".$kname."' and teacherid='".$teacher."' and ktime='".$yuanshiduan."' and xueyuan='".$studentname."' and qian=0 and time='".$zdr."'";
        $shanchu=mysqli_query($conn,$sc);
     
    }

   //关闭课程
   $gb="UPDATE student set close=1  where knameid='".$kname."' and teacherid='".$teacher."' and duan='".$yuanshiduan."' and id='".$studentid."' ";
   $guanbi=mysqli_query($conn,$gb);
   var_dump($guanbi);
}
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
  <div class="ziti">四物堂---学员课程关闭成功</div>
    <img src="/swtmanager/backend/web/statics/images/top.jpg" width="1100" height="82" border="0" usemap="#Map" />
<map name="Map" id="Map"><area shape="rect" coords="3,3,192,78" href="/swtmanager/backend/web/index.php?r=usermobile/register" />
<area shape="rect" coords="229,4,420,78" href="/swtmanager/backend/web/index.php?r=usermobile/main" /><area shape="rect" coords="454,3,643,79" href="/swtmanager/backend/web/index.php?r=teacher/main"/><area shape="rect" coords="679,5,863,80" href="#" /><area shape="rect" coords="902,4,1091,78" href="#" /></map>
  <div class="juli"></div>
</div>
<div class="juli"></div>

<div class="main">
   <div style="width: 697px;height: 467px;margin: auto;">学员课程关闭成功!</div>
</div>
