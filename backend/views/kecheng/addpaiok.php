<?php 
use yii\helpers\Html;
$conn=mysqli_connect('hdm121115553.my3w.com','hdm121115553','swt62899308swt','hdm121115553_db');
  if($conn->connect_errno){
      die('连接失败'.$conn->connect_errno);
  }
  $conn->set_charset('utf8');

//添加
$submit=isset($_POST["submit3"])?$_POST["submit3"]:'';
$date=isset($_POST["date"])?$_POST["date"]:'';
$teacherid=isset($_POST["teacherid"])?$_POST["teacherid"]:'';
$knameid=isset($_POST["knameid"])?$_POST["knameid"]:'';  //课程id
$tiao=isset($_POST["tiao"])?$_POST["tiao"]:'';
$xueyuan=isset($_POST["xueyuan"])?$_POST["xueyuan"]:'';
$sd= isset($_POST["sd"])?$_POST["sd"]:'';
$bu= isset($_POST["bu"])?$_POST["bu"]:'';

if($date<>''){

  foreach ((array)$sd as $v){
      $sql="insert into course(time,ktime,kid,teacherid,xueyuan) values('".$date."','".$v."','".$knameid."','".$teacherid."','".$xueyuan."')";
      $result=mysqli_query($conn,$sql);
      $ma="select max(id)  from kecheng";
      $max=mysqli_query($conn,$ma);
      $shu=mysqli_fetch_array($max);
      $maxid=$shu['max(id)'];
   
        //获取时间
     $sj="select date,zks,duan,id,teacherid from kecheng where id='".$maxid."'";
    $dates=mysqli_query($conn,$sj);
    $date2=mysqli_fetch_array($dates);

    $datetime=$date2['date'];    

   //算出周几
   
    $zho=mysqli_query($conn,"select dayofweek('".$datetime."');");
    $zhou=mysqli_fetch_array($zho);
  
    $week2=$zhou[0];

    switch ($week2){
      case 1:
         $weekmsg='周日';
         break;
      case 2:
         $weekmsg='周一';
         break;
      case 3:
         $weekmsg='周二';
         break;
      case 4:
         $weekmsg='周三';
         break;
      case 5:
         $weekmsg='周四';
         break;
      case 6:
         $weekmsg='周五';
         break;
      case 7:
         $weekmsg='周六';
         break;
      default:
         $weekmsg='';
         break;
    }
    $kecheng=mysqli_query($conn,"update course set week='".$weekmsg."' where id='".$maxid."'");

  }
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
  <div class="ziti">四物堂---排课添加成功</div>
    <img src="/swtmanager/backend/web/statics/images/top.jpg" width="1100" height="82" border="0" usemap="#Map" />
<map name="Map" id="Map"><area shape="rect" coords="3,3,192,78" href="/swtmanager/backend/web/index.php?r=usermobile/register" />
<area shape="rect" coords="229,4,420,78" href="/swtmanager/backend/web/index.php?r=usermobile/main" /><area shape="rect" coords="454,3,643,79" href="/swtmanager/backend/web/index.php?r=teacher/main" /><area shape="rect" coords="679,5,863,80" href="/swtmanager/backend/web/index.php?r=tongzhi/main" /><area shape="rect" coords="902,4,1091,78" href="/swtmanager/backend/web/index.php?r=admin/main" /></map>
  <div class="juli"></div>
</div>
<div class="juli"></div>

<div class="main">
   <div style="width: 697px;height: 467px;background-image: url(/swtmanager/backend/web/statics/images/zhuceok.jpg);margin: auto;"></div>
</div>
