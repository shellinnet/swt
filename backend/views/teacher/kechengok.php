<?php 
use yii\helpers\Html;
$conn=mysqli_connect('hdm121115553.my3w.com','hdm121115553','swt62899308swt','hdm121115553_db');
  if($conn->connect_errno){
      die('连接失败'.$conn->connect_errno);
  }
  $conn->set_charset('utf8');

//老师课程添加
$submit=isset($_POST["submit3"])?$_POST["submit3"]:'';
$zq=isset($_POST["date"])?$_POST["date"]:'';
$teacherid=isset($_POST["teacherid"])?$_POST["teacherid"]:'';
$knameid=isset($_POST["knameid"])?$_POST["knameid"]:'';  //课程id

$tiao=isset($_POST["tiao"])?$_POST["tiao"]:'';
$num=isset($_POST["num"])?$_POST["num"]:'';
$sd= isset($_POST["sd"])?$_POST["sd"]:'';

$keshi=104;
$nums=$num+1;
//获取当前日期
echo date('Y-m-d',time());
$date=date('Y-m-d',time());
$jj=array();

$jj=get_week();
var_dump($jj);

if($date<>''){

  foreach ((array)$sd as $v){
      $sql="insert into kecheng(teacherid,zks,tiao,duan,num,date,keid,zq) values('".$teacherid."','".$keshi."','".$tiao."','".$v."','".$nums."','".$date."','".$knameid."','".$zq."')";
      $result=mysqli_query($conn,$sql);
   
      $ma="select max(id)  from kecheng";
      $max=mysqli_query($conn,$ma);
      $shu=mysqli_fetch_array($max);
      $maxid=$shu['max(id)'];
      if($zq=='周三'){
        $shijian=$jj[3];
        pike($shijian,$teacherid,$keshi,$v,$nums,$knameid,$zq,$conn);
        for($i=2;$i<=$keshi;$i++){
                 $shijian=date("Y-m-d",strtotime($shijian."+7day"));                        
                 $shi=$shijian;
                 echo '添加的上课时间为:'.$shi.",";
                 $timestrap=strtotime($shi);
                 $month=date('m-d',$timestrap);
                 if($month=='1-1' || $month=='5-1' || $month=='10-1'){
                   $studentriqi=date("Y-m-d",strtotime($studentriqi."+7day"));
                   pike($shijian,$teacherid,$keshi,$v,$nums,$knameid,$zq,$conn);
                    $i=$i-1;
                 }else{                   
                    pike($shijian,$teacherid,$keshi,$v,$nums,$knameid,$zq,$conn);
                 }                              
              }
        }else if($zq=='周四'){
          $shijian=$jj[4];
          pike($shijian,$teacherid,$keshi,$v,$nums,$knameid,$zq,$conn);
          for($i=2;$i<=$keshi;$i++){
                 $shijian=date("Y-m-d",strtotime($shijian."+7day"));                        
                 $shi=$shijian;
                 echo '添加的上课时间为:'.$shi.",";
                 $timestrap=strtotime($shi);
                 $month=date('m-d',$timestrap);
                 if($month=='1-1' || $month=='5-1' || $month=='10-1'){
                   $studentriqi=date("Y-m-d",strtotime($studentriqi."+7day"));
                   pike($shijian,$teacherid,$keshi,$v,$nums,$knameid,$zq,$conn);
                    $i=$i-1;
                 }else{                   
                    pike($shijian,$teacherid,$keshi,$v,$nums,$knameid,$zq,$conn);
                 }                              
              }
        }else if($zq=='周五'){
          $shijian=$jj[5];
          pike($shijian,$teacherid,$keshi,$v,$nums,$knameid,$zq,$conn);
          for($i=2;$i<=$keshi;$i++){
                 $shijian=date("Y-m-d",strtotime($shijian."+7day"));                        
                 $shi=$shijian;
                 echo '添加的上课时间为:'.$shi.",";
                 $timestrap=strtotime($shi);
                 $month=date('m-d',$timestrap);
                 if($month=='1-1' || $month=='5-1' || $month=='10-1'){
                   $studentriqi=date("Y-m-d",strtotime($studentriqi."+7day"));
                   pike($shijian,$teacherid,$keshi,$v,$nums,$knameid,$zq,$conn);
                    $i=$i-1;
                 }else{                   
                    pike($shijian,$teacherid,$keshi,$v,$nums,$knameid,$zq,$conn);
                 }                              
              }
        }else if($zq=='周六'){
          $shijian=$jj[6];
          pike($shijian,$teacherid,$keshi,$v,$nums,$knameid,$zq,$conn);
          for($i=2;$i<=$keshi;$i++){
                 $shijian=date("Y-m-d",strtotime($shijian."+7day"));                        
                 $shi=$shijian;
                 echo '添加的上课时间为:'.$shi.",";
                 $timestrap=strtotime($shi);
                 $month=date('m-d',$timestrap);
                 if($month=='1-1' || $month=='5-1' || $month=='10-1'){
                   $studentriqi=date("Y-m-d",strtotime($studentriqi."+7day"));
                   pike($shijian,$teacherid,$keshi,$v,$nums,$knameid,$zq,$conn);
                    $i=$i-1;
                 }else{                   
                    pike($shijian,$teacherid,$keshi,$v,$nums,$knameid,$zq,$conn);
                 }                              
              }
        }else if($zq=='周日'){
          $shijian=$jj[7];
          pike($shijian,$teacherid,$keshi,$v,$nums,$knameid,$zq,$conn);
          for($i=2;$i<=$keshi;$i++){
                 $shijian=date("Y-m-d",strtotime($shijian."+7day"));                        
                 $shi=$shijian;
                 echo '添加的上课时间为:'.$shi.",";
                 $timestrap=strtotime($shi);
                 $month=date('m-d',$timestrap);
                 if($month=='1-1' || $month=='5-1' || $month=='10-1'){
                   $studentriqi=date("Y-m-d",strtotime($studentriqi."+7day"));
                   pike($shijian,$teacherid,$keshi,$v,$nums,$knameid,$zq,$conn);
                    $i=$i-1;
                 }else{                   
                    pike($shijian,$teacherid,$keshi,$v,$nums,$knameid,$zq,$conn);
                 }                              
              }
        }
   
    }
    
}

function pike($shijian,$teacherid,$keshi,$v,$nums,$knameid,$zq,$conn){
    $pk="INSERT INTO course(time,kid,ktime,teacherid,xueyuan,total,syks,week,state) VALUES('".$shijian."','".$knameid."','".$v."','".$teacherid."','','".$keshi."','".$keshi."','".$zq."','".$nums."') ";
    $pks=mysqli_query($conn,$pk);
    return $pks;
}

function get_week($time = '', $format='Y-m-d'){
  $time = $time != '' ? $time : time();
  //获取当前周几
  $week = date('w', $time);
  $date = [];
  for ($i=1; $i<=7; $i++){
    $date[$i] = date($format ,strtotime( '+' . $i-$week .' days', $time));
  }
  return $date;
}
echo "<script>alert('课程添加成功');window.location.href='http://www.siwutang.vip/swtmanager/backend/web/index.php?r=teacher/main';</script>";

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
  <div class="ziti">四物堂---老师添加成功</div>
    <img src="/swtmanager/backend/web/statics/images/top.jpg" width="1100" height="82" border="0" usemap="#Map" />
<map name="Map" id="Map"><area shape="rect" coords="3,3,192,78" href="/swtmanager/backend/web/index.php?r=usermobile/register" />
<area shape="rect" coords="229,4,420,78" href="/swtmanager/backend/web/index.php?r=usermobile/main" /><area shape="rect" coords="454,3,643,79" href="/swtmanager/backend/web/index.php?r=teacher/main" /><area shape="rect" coords="679,5,863,80" href="/swtmanager/backend/web/index.php?r=tongzhi/main" /><area shape="rect" coords="902,4,1091,78" href="/swtmanager/backend/web/index.php?r=admin/main" /></map>
  <div class="juli"></div>
</div>
<div class="juli"></div>

<div class="main">
   <div style="width: 697px;height: 467px;background-image: url(/swtmanager/backend/web/statics/images/zhuceok.jpg);margin: auto;"></div>
</div>
