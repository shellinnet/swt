<?php 
use yii\helpers\Html;
$conn=mysqli_connect('hdm121115553.my3w.com','hdm121115553','swt62899308swt','hdm121115553_db');
  if($conn->connect_errno){
      die('连接失败'.$conn->connect_errno);
  }
  $conn->set_charset('utf8');
$submit=isset($_POST["submit"])?$_POST["submit"]:'';
$begin=isset($_POST["begin"])?$_POST["begin"]:'';
$end=isset($_POST["end"])?$_POST["end"]:'';

//计算休假天数
function diffBetweenTwoDays ($begin, $end)
{
  $second1 = strtotime($begin);
  $second2 = strtotime($end);
    
  if ($second1 < $second2) {
    $tmp = $second2;
    $second2 = $second1;
    $second1 = $tmp;
    return ($second1 - $second2) / 86400 +7;
  }elseif($second1==$second2){
      return 7;
  }

}

$diff = diffBetweenTwoDays($begin, $end);
echo "rest:".$diff;
//插入休息表
$inreset="UPDATE rest SET begintime='".$begin."' ,endtime='".$end."'";
$inrests=mysqli_query($conn,$inreset);

$all="INSERT INTO cunrest(begintime,endtime,leibie) VALUES('".$begin."','".$end."','四物堂放假')";
$alls=mysqli_query($conn,$all);

//查询这段时间内所有上课学员信息
$allkc="SELECT xueyuan FROM course where time>='".$begin."' and time<='".$end."' and xueyuan<>''  and qian=0 group by xueyuan,teacherid,kid order by time";
$allkcs=mysqli_query($conn,$allkc);
while($kecheng=mysqli_fetch_array($allkcs)){
     $xue=$kecheng['xueyuan'];

     //查询该学员这段时间内上课信息
     $cx="SELECT * FROM course where time>='".$begin."' and time<='".$end."' and xueyuan<>'' and qian=0 and xueyuan='".$xue."' order by time";
     $cxs=mysqli_query($conn,$cx);
     while($sk=mysqli_fetch_array($cxs)){
           $steacher=$sk['teacherid'];
           $skecheng=$sk['kid'];
          
           $sshiduan=$sk['ktime'];
           //查询一共多少课
           $allcx="SELECT count(*) FROM course where time>='".$begin."' and time<='".$end."'  and xueyuan='".$xue."' and qian=0 and ktime='".$sshiduan."' and teacherid='".$steacher."' and kid='".$skecheng."'";
           $cxs=mysqli_query($conn,$allcx);
           while($gg=mysqli_fetch_array($cxs)){
                $gcount=$gg['count(*)'];
           }
           
         
          //查询该学生最后一次课程时间
          $last="SELECT *,b.oktime FROM course a,student b where  a.xueyuan='".$xue."' and a.qian=0 and a.ktime='".$sshiduan."' and a.teacherid='".$steacher."' and a.kid='".$skecheng."' and b.sname=a.xueyuan and a.kid=b.knameid and a.teacherid=b.teacherid order by a.time desc limit 1";
        
          $lasts=mysqli_query($conn,$last);
          while($ltime=mysqli_fetch_array($lasts)){
               $ztime=$ltime['time'];
               $lweek=$ltime['week'];
               $lktime=$ltime['ktime'];
               $lkid=$ltime['kid'];
               $ltotal=$ltime['total'];
               $lteacherid=$ltime['teacherid'];
               $lsyks=$ltime['syks'];
               $lstate=$ltime['state'];
               $oktime=$ltime['oktime'];

               //更新有效期
              $yxiao=date("Y-m-d",strtotime($oktime."+".$diff."day"));
              $update="UPDATE student SET oktime='".$yxiao."' WHERE sname='".$xue."' and teacherid='".$steacher."' and knameid='".$skecheng."' and duan='".$sshiduan."'";
              $updates=mysqli_query($conn,$update);
                         
               //在该学员最后一次课程后一周加课程
               for($i=1;$i<=$gcount;$i++){

                  $ztime=date("Y-m-d",strtotime($ztime."+7 day"));
            
                $cr="INSERT INTO course(time,week,ktime,kid,total,teacherid,xueyuan,syks,qian,state) VALUES('".$ztime."','".$lweek."','".$lktime."','".$lkid."','".$ltotal."','".$lteacherid."','".$xue."','".$lsyks."',0,'".$lstate."')";
                 $crs=mysqli_query($conn,$cr);
                }
                       
        
           //该学员在该段时间内的课程删除
            $del="DELETE FROM course where  time>='".$begin."' and time<='".$end."' and xueyuan='".$xue."' and qian=0 and ktime='".$sshiduan."' and teacherid='".$steacher."' and kid='".$skecheng."' ";
            $dels=mysqli_query($conn,$del);
           }
     }
     
}


//删除这段时间内所有老师,学员上课信息
$tdel="delete from course where time>='".$begin."' and time<='".$end."'  and qian=0";
$tdels=mysqli_query($conn,$tdel);

// echo "<script>alert('放假课程调整成功!');window.location.href='http://www.siwutang.vip/swtmanager/backend/web/index.php?r=kecheng/main';</script>";
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
  <div class="ziti">四物堂---放假课程调整成功</div>
    <img src="/swtmanager/backend/web/statics/images/top.jpg" width="1100" height="82" border="0" usemap="#Map" />
<map name="Map" id="Map"><area shape="rect" coords="3,3,192,78" href="/swtmanager/backend/web/index.php?r=usermobile/register" />
<area shape="rect" coords="229,4,420,78" href="/swtmanager/backend/web/index.php?r=usermobile/main" /><area shape="rect" coords="454,3,643,79" href="/swtmanager/backend/web/index.php?r=teacher/main" /><area shape="rect" coords="679,5,863,80" href="/swtmanager/backend/web/index.php?r=tongzhi/main" /><area shape="rect" coords="902,4,1091,78" href="/swtmanager/backend/web/index.php?r=admin/main" /></map>
  <div class="juli"></div>
</div>
<div class="juli"></div>

<div class="main">

<div class="juli">&nbsp;</div> 
  <div class="left">&nbsp;</div>
  <div class="leftbig ziti" style=" color:red;text-align: center">放假课程调整成功！</div>
  <div>&nbsp;</div>
  <div class="juli">&nbsp;</div> 
  <div class="juli">&nbsp;</div> 
  <div class="juli">&nbsp;</div> 
  <div class="left">&nbsp;</div>
  <div class="leftbig ziti"><a href="http://www.siwutang.vip/swtmanager/backend/web/index.php?r=usermobile/main">返回学员管理！</a></div>


   
</div>
