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
$zks=isset($_POST["xskeshi"])?$_POST["xskeshi"]:'';
$yuanshiduan=isset($_POST["yuanshiduan"])?$_POST["yuanshiduan"]:'';
$yuanteacherid=isset($_POST["yuanteacherid"])?$_POST["yuanteacherid"]:'';
$yuankid=isset($_POST["yuankid"])?$_POST["yuankid"]:'';
$yuandate=isset($_POST["yuandate"])?$_POST["yuandate"]:'';
$yuanweek=isset($_POST["yuanweek"])?$_POST["yuanweek"]:'';

//计算有效时间
  $youxiaotime=$studenttime;
  echo $teacher."<br>";
$createdtime=date("Y-m-d",time());

$oktime=date("Y-m-d",strtotime($studentdate."+".$youxiaotime." day"));
echo $oktime."<br>";

if($submit<>''){
  // $xue2="UPDATE student SET knameid='".$kname."',teacherid='".$teacher."',duan='".$shiduan."',date='".$studentdate."',oktime='".$oktime."',syks='".$studentkeshi."' where knameid='".$kname."' and teacherid='".$teacher."' and duan='".$yuanshiduan."' and id='".$studentid."'";
  $xue2="INSERT INTO student(knameid,teacherid,duan,date,oktime,syks,mobile,sname,password,created_at,zkeshi) VALUES('".$kname."','".$teacher."','".$shiduan."','".$studentdate."','".$oktime."','".$studentkeshi."','".$studentphone."','".$studentname."','".$password."','".$createdtime."','".$studentkeshi."')";
   $xues=mysqli_query($conn,$xue2);
   var_dump($xues);
      //获取时间
$top="select * from student order by id desc limit 1";
$tops=mysqli_query($conn,$top);
while($tt=mysqli_fetch_array($tops)){
      $ttid=$tt['id'];
}

    $datetime=$studentdate;
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
    $kecheng=mysqli_query($conn,"update student set week='".$weekmsg."' where id='".$ttid."'");
   //已签到次数
   $qd="SELECT count(*) from course where xueyuan='".$studentname."' and week='".$yuanweek."' and kid='".$yuankid."' and teacherid='".$yuanteacherid."' and qian=1 ";
   $qds=mysqli_query($conn,$qd);
   while($sks=mysqli_fetch_array($qds)){
         $allqd=$sks['count(*)'];
   }

   
    //先删除原先的学员上课信息,未签到，从指定日删除
    $gx="UPDATE student SET syks=0,close=1,zkeshi='".$allqd."' where mobile='".$studentphone."' and teacherid='".$yuanteacherid."' and knameid='".$yuankid."' and date='".$yuandate."'";
    $gxs=mysqli_query($conn,$gx);
    var_dump($gxs);
    $del="DELETE from course where  teacherid='".$yuanteacherid."' and qian=0 and kid='".$yuankid."' and ktime='".$yuanshiduan."' and xueyuan='".$studentname."'";
    $dels=mysqli_query($conn,$del);

    //查出从指定日开始一共几个具体日期
    // $rq="select time from course where kid='".$kname."' and teacherid='".$teacher."' and ktime='".$yuanshiduan."' and xueyuan='".$studentname."' and qian=0";
    // echo $rq."<br>";
    // $riqi=mysqli_query($conn,$rq);
    // while($zd=mysqli_fetch_array($riqi)){
    //     $zdr=$zd['time'];
    //     $sc="DELETE from course where kid='".$kname."' and teacherid='".$teacher."' and ktime='".$yuanshiduan."' and xueyuan='".$studentname."' and qian=0 and time='".$zdr."'";
    //     $shanchu=mysqli_query($conn,$sc);
    //     var_dump($shanchu);
    //     echo "<br>";
    // }

    
    //查询该课程的座位总数,上课学生总数
    $zs="SELECT state,count(xueyuan) FROM course where time='".$studentdate."' and kid='".$kname."' and ktime='".$shiduan."' and teacherid='".$teacher."' group by time,kid,ktime,teacherid";
    $zong=mysqli_query($conn,$zs);
    $row= mysqli_num_rows($zong);
    
     if($row<>0){
         while($state=mysqli_fetch_array($zong)){
         $weizi=$state['state'];
         $totalxue=$state['count(xueyuan)'];
       
          }
             
          //有空位则添加，否则跳到注册不成功界面
          if($totalxue<$weizi){
              
              //读取输入的总课时和时间,计算时间，循环每次+7天
               //排课
              $pk="INSERT INTO course(time,kid,ktime,teacherid,xueyuan,total,syks) VALUES('".$studentdate."','".$kname."','".$shiduan."','".$teacher."','".$studentname."','".$studentkeshi."','".$studentkeshi."') ";
              $pks=mysqli_query($conn,$pk);
             
              for($i=2;$i<=$studentkeshi;$i++){
                 $studentdate=date("Y-m-d",strtotime($studentdate."+7day"));
                
                 echo $studentdate;
                 echo "<br>";
                 $pk2="INSERT INTO course(time,kid,ktime,teacherid,xueyuan,total,syks) VALUES('".$studentdate."','".$kname."','".$shiduan."','".$teacher."','".$studentname."','".$studentkeshi."','".$studentkeshi."') ";
                 $pks2=mysqli_query($conn,$pk2);
                 var_dump($pks2);
              }
                           
          }else{
            echo "<script>alert('该课程已满');window.location.href='http://www.siwutang.vip/swtmanager/backend/web/index.php?r=usermobile/register';</script>";

          } 
            
    } else{
          $weizi=8;
        
          $xs="INSERT INTO course(time,kid,ktime,total,teacherid,xueyuan,state,syks,week) VALUES('".$studentdate."','".$kname."','".$shiduan."','".$studentkeshi."','".$teacher."','".$studentname."','".$weizi."','".$studentkeshi."','".$weekmsg."')";
          $xue=mysqli_query($conn,$xs);

          for($i=2;$i<=$studentkeshi;$i++){
             
                 $studentdate=date("Y-m-d",strtotime($studentdate."+7day"));
                 $pk2="INSERT INTO course(time,kid,ktime,teacherid,xueyuan,total,syks,week) VALUES('".$studentdate."','".$kname."','".$shiduan."','".$teacher."','".$studentname."','".$studentkeshi."','".$studentkeshi."','".$weekmsg."') ";
                 $pks2=mysqli_query($conn,$pk2);
                 var_dump($pks2);
                 echo "<br>";
              }
         }

}

// echo "<script>alert('学员修改成功!');window.location.href='http://www.siwutang.vip/swtmanager/backend/web/index.php?r=site/index';</script>";
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
  <div class="ziti">四物堂---学员修改成功</div>
    <img src="/swtmanager/backend/web/statics/images/top.jpg" width="1100" height="82" border="0" usemap="#Map" />
<map name="Map" id="Map"><area shape="rect" coords="3,3,192,78" href="/swtmanager/backend/web/index.php?r=usermobile/register" />
<area shape="rect" coords="229,4,420,78" href="/swtmanager/backend/web/index.php?r=usermobile/main" /><area shape="rect" coords="454,3,643,79" href="/swtmanager/backend/web/index.php?r=teacher/main"/><area shape="rect" coords="679,5,863,80" href="#" /><area shape="rect" coords="902,4,1091,78" href="#" /></map>
  <div class="juli"></div>
</div>
<div class="juli"></div>

<div class="main">
   <div>学员修改成功！</div>
</div>
