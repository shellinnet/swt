<?php 
use yii\helpers\Html;
$conn=mysqli_connect('hdm121115553.my3w.com','hdm121115553','swt62899308swt','hdm121115553_db');
  if($conn->connect_errno){
      die('连接失败'.$conn->connect_errno);
  }
  $conn->set_charset('utf8');
  //学生注册
$submit=isset($_POST["submit"])?$_POST["submit"]:'';
$studentphone=isset($_POST["studentphone"])?$_POST["studentphone"]:'';
$studentname=isset($_POST["studentname"])?$_POST["studentname"]:'';
$kname=isset($_POST["kname"])?$_POST["kname"]:'';
$teacher=isset($_POST["teacher"])?$_POST["teacher"]:'';
$shiduan=isset($_POST["shiduan"])?$_POST["shiduan"]:'';
$studentkeshi=isset($_POST["studentkeshi"])?$_POST["studentkeshi"]:'';

$youxiaotime=isset($_POST["youxiaotime"])?$_POST["youxiaotime"]:'';

$studentdate2=isset($_POST["studentdate2"])?$_POST["studentdate2"]:'';
$studentdate3=isset($_POST["studentdate3"])?$_POST["studentdate3"]:'';
$studentdate4=isset($_POST["studentdate4"])?$_POST["studentdate4"]:'';
$studentdate5=isset($_POST["studentdate5"])?$_POST["studentdate5"]:'';
$studentdate6=isset($_POST["studentdate6"])?$_POST["studentdate6"]:'';
$studentdate7=isset($_POST["studentdate7"])?$_POST["studentdate7"]:'';
$studentdate8=isset($_POST["studentdate8"])?$_POST["studentdate8"]:'';
$studentdate9=isset($_POST["studentdate9"])?$_POST["studentdate9"]:'';
$studentdate10=isset($_POST["studentdate10"])?$_POST["studentdate10"]:'';
$studentdate11=isset($_POST["studentdate11"])?$_POST["studentdate11"]:'';
$studentdate12=isset($_POST["studentdate12"])?$_POST["studentdate12"]:'';
$studentdate13=isset($_POST["studentdate13"])?$_POST["studentdate13"]:'';
$studentdate14=isset($_POST["studentdate14"])?$_POST["studentdate14"]:'';
$studentdate15=isset($_POST["studentdate15"])?$_POST["studentdate15"]:'';
$studentdate16=isset($_POST["studentdate16"])?$_POST["studentdate16"]:'';
$studentdate17=isset($_POST["studentdate17"])?$_POST["studentdate17"]:'';
$studentdate18=isset($_POST["studentdate18"])?$_POST["studentdate18"]:'';
$studentdate19=isset($_POST["studentdate19"])?$_POST["studentdate19"]:'';
$studentdate20=isset($_POST["studentdate20"])?$_POST["studentdate20"]:'';
$studentdate21=isset($_POST["studentdate21"])?$_POST["studentdate21"]:'';
$studentdate22=isset($_POST["studentdate22"])?$_POST["studentdate22"]:'';
$studentdate23=isset($_POST["studentdate23"])?$_POST["studentdate23"]:'';
$studentdate24=isset($_POST["studentdate24"])?$_POST["studentdate24"]:'';
$studentdate25=isset($_POST["studentdate25"])?$_POST["studentdate25"]:'';
$studentdate26=isset($_POST["studentdate26"])?$_POST["studentdate26"]:'';
$studentdate27=isset($_POST["studentdate27"])?$_POST["studentdate27"]:'';
$studentdate28=isset($_POST["studentdate28"])?$_POST["studentdate28"]:'';
$studentdate29=isset($_POST["studentdate29"])?$_POST["studentdate29"]:'';
$studentdate30=isset($_POST["studentdate30"])?$_POST["studentdate30"]:'';
$studentdate31=isset($_POST["studentdate31"])?$_POST["studentdate31"]:'';
$studentdate32=isset($_POST["studentdate32"])?$_POST["studentdate32"]:'';
$studentdate33=isset($_POST["studentdate33"])?$_POST["studentdate33"]:'';
$studentdate34=isset($_POST["studentdate34"])?$_POST["studentdate34"]:'';
$studentdate35=isset($_POST["studentdate35"])?$_POST["studentdate35"]:'';
$studentdate36=isset($_POST["studentdate36"])?$_POST["studentdate36"]:'';
$studentdate37=isset($_POST["studentdate37"])?$_POST["studentdate37"]:'';
$studentdate38=isset($_POST["studentdate38"])?$_POST["studentdate38"]:'';
$studentdate39=isset($_POST["studentdate39"])?$_POST["studentdate39"]:'';
$studentdate40=isset($_POST["studentdate40"])?$_POST["studentdate40"]:'';
$studentdate41=isset($_POST["studentdate41"])?$_POST["studentdate41"]:'';
$studentdate42=isset($_POST["studentdate42"])?$_POST["studentdate42"]:'';
$studentdate43=isset($_POST["studentdate43"])?$_POST["studentdate43"]:'';
$studentdate44=isset($_POST["studentdate44"])?$_POST["studentdate44"]:'';
$studentdate45=isset($_POST["studentdate45"])?$_POST["studentdate45"]:'';
//获取当前日期
$date=date('Y-m-d',time());
//算出周几

for($i=2;$i<=$studentkeshi;$i++){
  $xtime=${"studentdate".$i};
  echo $xtime;
$datetime=$xtime;   
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


$createdtime=date("Y-m-d",time());

//根据$teacher查询老师id号
$ls="select * from admin where m_name='".$teacher."'";
$laoshi=mysqli_query($conn,$ls);
while($tt=mysqli_fetch_array($laoshi)){
     $teas=$tt['id'];
}

if($studentphone<>''){

    $ma="select max(id)  from student";
    $max=mysqli_query($conn,$ma);
    $shu=mysqli_fetch_array($max);
    $maxid=$shu['max(id)'];
      //获取时间
    $sj="select date,id from student where id='".$maxid."'";
    $dates=mysqli_query($conn,$sj);
    $date2=mysqli_fetch_array($dates);
 
    //查询该课程的座位总数,上课学生总数
    $zs="SELECT state,count(xueyuan) FROM course where time='".$xtime."' and kid='".$kname."' and ktime='".$shiduan."' and teacherid='".$teas."' group by time,kid,ktime,teacherid";
    $zong=mysqli_query($conn,$zs);
    $row= mysqli_num_rows($zong);
   
     if($row<>0){
         while($state=mysqli_fetch_array($zong)){
         $weizi=$state['state'];
         $totalxue=$state['count(xueyuan)'];
       
          }
             
          //有空位则添加，否则跳到注册不成功界面
          if($totalxue<$weizi){
              
               //排课
              $pk="INSERT INTO course(time,kid,ktime,teacherid,xueyuan,total,syks,week) VALUES('".$xtime."','".$kname."','".$shiduan."','".$teas."','".$studentname."','".$studentkeshi."','".$studentkeshi."','".$weekmsg."') ";
              $pks=mysqli_query($conn,$pk);
             
                           
          }else{
            echo "<script>alert('该课程已满');window.location.href='http://www.siwutang.vip/swtmanager/backend/web/index.php?r=usermobile/vipregister';</script>";

          } 
            
    } else{
          $weizi=8;
        
          $xs="INSERT INTO course(time,kid,ktime,total,teacherid,xueyuan,state,syks,week) VALUES('".$xtime."','".$kname."','".$shiduan."','".$studentkeshi."','".$teas."','".$studentname."','".$weizi."','".$studentkeshi."','".$weekmsg."')";
          $xue=mysqli_query($conn,$xs);

}

}
}
?>
<style>

.ziti{
  font-size: 16px;
  font-family: 微软雅黑;
}
.juli{
  width: 300px;
  height: 15px;
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

</style>

<script type="text/javascript" src="http://www.siwutang.vip/swtmanager/backend/web/statics/js/jquery-1.4.2.min.js"></script>



<div class="main">
<div class="juli"></div>
   <div style="width: 697px;height: 440px;background-image: url(/swtmanager/backend/web/statics/images/zhuceok.jpg);margin: auto;"></div>
</div>
