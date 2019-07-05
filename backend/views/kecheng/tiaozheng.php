2<?php 
use yii\helpers\Html;
$conn=mysqli_connect('hdm121115553.my3w.com','hdm121115553','swt62899308swt','hdm121115553_db');
  if($conn->connect_errno){
      die('连接失败'.$conn->connect_errno);
  }
  $conn->set_charset('utf8');

$submit=isset($_POST["submit"])?$_POST["submit"]:'';
$date=isset($_POST["text"])?$_POST["text"]:'';
$teacher=isset($_POST["teacher"])?$_POST["teacher"]:'';
$kecheng=isset($_POST["kecheng"])?$_POST["kecheng"]:'';
$xueyuan=isset($_POST["xueyuan"])?$_POST["xueyuan"]:'';
$shiduan=isset($_POST["shiduan"])?$_POST["shiduan"]:'';
$teacherid=isset($_POST["teacherid"])?$_POST["teacherid"]:'';
$keid=isset($_POST["keid"])?$_POST["keid"]:'';
$close=isset($_POST["jieshou"])?$_POST["jieshou"]:'';


if($xueyuan<>''){
  $cx="select sname from student where sname='".$xueyuan."' and close=0 group by sname";
  $cha=mysqli_query($conn,$cx);
  $row=mysqli_num_rows($cha);
  if($row!=0){
    while($mm=mysqli_fetch_array($cha)){
      $mname=$mm['sname'];  
      if($mname==$xueyuan ){
        //添加上课课程里学员名，该学员最后一节课删除
        echo "有这个学员";
        //查询该课程所有信息，根据输入的字段
        $xin="SELECT * FROM course where time='".$date."' and ktime='".$shiduan."' and kid='".$keid."' and teacherid='".$teacherid."'  group by time ";
        $xinxi=mysqli_query($conn,$xin);
       
        while($all=mysqli_fetch_array($xinxi)){
              $astate=$all['state'];
              echo $astate.'state';
        }
        $xue="select * from student where sname='".$xueyuan."' and teacherid='".$teacherid."' and knameid='".$keid."'  and close=0";
        $xy=mysqli_query($conn,$xue);
        
        while($xs=mysqli_fetch_array($xy)){
             $today=date('Y-m-d');
             $xsoktime=$xs['oktime'];
             if($xsoktime<$today){
                echo '<script language="JavaScript">;alert("该学员该课程有效期已到，是否跳转到注册页面重新注册？");location.href="http://www.siwutang.vip/swtmanager/backend/web/index.php?r=usermobile/register";</script>';
             }else{
                $xsweek=$xs['week'];
                $xszks=$xs['zkeshi'];
                $xssyks=$xs['syks'];              
                //add course
                $add="INSERT INTO course(time,ktime,kid,teacherid,xueyuan,syks,total,state,week) VALUES('".$date."','".$shiduan."','".$keid."','".$teacherid."','".$xueyuan."','".$xssyks."','".$xszks."','".$astate."','".$xsweek."')";
                $adds=mysqli_query($conn,$add);
                var_dump($adds);
                echo "</br>";
                //删除该学生最后一次排课信息
                //在course里查询该学生最后一次排课日期信息
                $pai="select * from course where xueyuan='".$xueyuan."' and teacherid='".$teacherid."' and kid='".$keid."'  order by time desc limit 1";
                $pk=mysqli_query($conn,$pai);
                while($paike=mysqli_fetch_array($pk)){
                     $pdate=$paike['time'];
                     $pduan=$paike['ktime']; 
                     echo $pduan;               
                }
                //删除它
                $del="DELETE from course where xueyuan='".$xueyuan."' and teacherid='".$teacherid."' and kid='".$keid."' and week='".$xsweek."' and ktime='".$pduan."' and time='".$pdate."'";
                $delit=mysqli_query($conn,$del);
                var_dump($delit);
                echo "</br>";
             }
        }
        
       echo '<script language="JavaScript">;alert("该学员上课信息添加成功！");location.href="http://www.siwutang.vip/swtmanager/backend/web/index.php?r=kecheng/kebiao";</script>';
      }
    }
  }else{
       //弹出信息显示该学员未注册，是否跳转到注册页面
        echo '<script language="JavaScript">;alert("该学员未注册，是否跳转到注册页面？");location.href="http://www.siwutang.vip/swtmanager/backend/web/index.php?r=usermobile/register";</script>';   
  }
}

if($close=='1'){
 
  // 查询该课程，老师在该日期上课的所有学员，并且关闭课程，close=1
   $xj="UPDATE course SET closed=1 WHERE teacherid='".$teacherid."' and kid='".$keid."' and ktime='".$shiduan."' and time='".$date."' ";

  $xjs=mysqli_query($conn,$xj);
 
   $cc="SELECT * FROM course WHERE teacherid='".$teacherid."' and kid='".$keid."' and ktime='".$shiduan."' and time='".$date."' and xueyuan<>'' "; 
   $ccs=mysqli_query($conn,$cc);
 
   while($xy=mysqli_fetch_array($ccs)){
        $xyxueyuan=$xy['xueyuan'];
        echo "xueyuan:".$xyxueyuan."<br>";
        //查询该课程，老师，这些学员最后一次上课日期
        $ls="SELECT * FROM course WHERE teacherid='".$teacherid."' and kid='".$keid."' and ktime='".$shiduan."'  and xueyuan='".$xyxueyuan."' order by time desc limit 1";
     
        $lst=mysqli_query($conn,$ls);
        while($lasts=mysqli_fetch_array($lst)){
            $lweek=$lasts['week']; 
            $ltime=$lasts['time'];
          
            $ltotal=$lasts['total'];
            $lsyks=$lasts['syks'];
            $lstate=$lasts['state'];
            $endtime=date("Y-m-d",strtotime("+1 week",strtotime($ltime)));
              //在最后一次上课时间+7天
            $in2="INSERT INTO course(time,week,ktime,kid,total,teacherid,xueyuan,syks,state,closed) VALUES('".$endtime."','".$lweek."','".$shiduan."','".$keid."','".$ltotal."','".$teacherid."','".$xyxueyuan."','".$lsyks."','".$lstate."',0)";
            $in2s=mysqli_query($conn,$in2);
             var_dump($in2s);
        }
       
   }
   
}

echo "<script>alert('排课修改成功');window.location.href='http://www.siwutang.vip/swtmanager/backend/web/index.php?r=kecheng/kebiao';</script>";
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
  <div class="ziti">四物堂---排课修改成功</div>
    <img src="/swtmanager/backend/web/statics/images/top.jpg" width="1100" height="82" border="0" usemap="#Map" />
<map name="Map" id="Map"><area shape="rect" coords="3,3,192,78" href="/swtmanager/backend/web/index.php?r=usermobile/register" />
<area shape="rect" coords="229,4,420,78" href="/swtmanager/backend/web/index.php?r=usermobile/main" /><area shape="rect" coords="454,3,643,79" href="/swtmanager/backend/web/index.php?r=teacher/main"/><area shape="rect" coords="679,5,863,80" href="#" /><area shape="rect" coords="902,4,1091,78" href="#" /></map>
  <div class="juli"></div>
</div>
<div class="juli"></div>

<div class="main">
   <div style="width: 697px;height: 467px;background-image: url(/swtmanager/backend/web/statics/images/zhuceok.jpg);margin: auto;"></div>
</div>
