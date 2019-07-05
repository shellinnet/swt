<?php 
 header("Content-type: text/html; charset=utf-8"); 
    ini_set('date.timezone','Asia/Shanghai');
    ini_set("display_errors", "On");
    error_reporting(E_ALL);
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
$studentdates=isset($_POST["studentdate"])?$_POST["studentdate"]:'';
$studenttime=isset($_POST["studenttime"])?$_POST["studenttime"]:'';
//算出周几
$datetime=$studentdates;   
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

//获取当前日期
$date=date('Y-m-d',time());
$jj=array();


//计算有效时间
$youxiaotime=date("Y-m-d",strtotime($studentdates."+".$studenttime."day"));

$createdtime=date("Y-m-d",time());

//根据$teacher查询老师id号
$ls="select * from admin where m_name='".$teacher."'";
$laoshi=mysqli_query($conn,$ls);
while($tt=mysqli_fetch_array($laoshi)){
     $teas=$tt['id'];
}

if($studentphone==''){
  echo "<script>alert('请输入手机号!');location.href='http://www.siwutang.vip/swtmanager/backend/web/index.php?r=usermobile/register';</script>";

}else if(strlen($studentphone)!=11){
  echo "<script>alert('手机号必须为11位!');location.href='http://www.siwutang.vip/swtmanager/backend/web/index.php?r=usermobile/register';</script>";

}else if(is_numeric($studentphone))


{
$ls="INSERT INTO student(mobile,password,sname,knameid,teacherid,duan,zkeshi,date,oktime,created_at,syks,week) VALUES('".$studentphone."','000000','".$studentname."','".$kname."','".$teas."','".$shiduan."','".$studentkeshi."','".$studentdates."','".$youxiaotime."','".$createdtime."','".$studentkeshi."','".$weekmsg."')";
$student=mysqli_query($conn,$ls);

    $ma="select max(id)  from student";
    $max=mysqli_query($conn,$ma);
    $shu=mysqli_fetch_array($max);
    $maxid=$shu['max(id)'];
      //获取时间
    $sj="select date,id from student where id='".$maxid."'";
    $dates=mysqli_query($conn,$sj);
    $date2=mysqli_fetch_array($dates);
 
    //查询该课程的座位总数,上课学生总数
    $zs="SELECT state,count(xueyuan) FROM course where time='".$studentdates."' and kid='".$kname."' and ktime='".$shiduan."' and teacherid='".$teas."' group by time,kid,ktime,teacherid";
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
              $pk="INSERT INTO course(time,kid,ktime,teacherid,xueyuan,total,syks,week) VALUES('".$studentdates."','".$kname."','".$shiduan."','".$teas."','".$studentname."','".$studentkeshi."','".$studentkeshi."','".$weekmsg."') ";
              $pks=mysqli_query($conn,$pk);
             
                           
          }else{
            echo "<script>alert('该课程已满');window.location.href='http://www.siwutang.vip/swtmanager/backend/web/index.php?r=usermobile/register';</script>";

          } 
            
    } else{
          $weizi=8;
        
          $xs="INSERT INTO course(time,kid,ktime,total,teacherid,xueyuan,state,syks,week) VALUES('".$studentdates."','".$kname."','".$shiduan."','".$studentkeshi."','".$teas."','".$studentname."','".$weizi."','".$studentkeshi."','".$weekmsg."')";
          $xue=mysqli_query($conn,$xs);

}

}else{
  echo "<script>alert('手机号必须为数字!');location.href='http://www.siwutang.vip/swtmanager/backend/web/index.php?r=usermobile/register';</script>";
}


if($studentkeshi<=10){
  $sks=$studentkeshi;
}else if($studentkeshi>10 && $studentkeshi<=20){
  $sks=10;
  $sks2=$studentkeshi;
}else if($studentkeshi>20 && $studentkeshi<=30){
  $sks=10;
  $sks2=20;
  $sks3=$studentkeshi;
}else{
   $sks=10;
  $sks2=20;
  $sks3=30;
  $sks4=$studentkeshi;
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
.julibig{
  width: 300px;
  height: 70px;
}
.julibig2{
  width: 300px;
  height: 360px;
}

.left{
  width: 50px;
  float:left;
  display: inline;
}
.leftbig{
  width: 250px;
  float:left;
  display: inline;
}
.kuan2{
  width:50%;
  height:10px;
 margin: auto;
} 
.gao{
  width: 300px;
  height: 5px;

}
</style>

<script type="text/javascript" src="http://www.siwutang.vip/swtmanager/backend/web/statics/js/jquery-1.4.2.min.js"></script>


<div class="main">
<div class="nei">
<div class="juli"></div>
  <div class="kuan ziti"><a href="http://www.siwutang.vip/swtmanager/backend/web/index.php?r=usermobile/main">返回所有学员管理</a></div>
  <div class="kuan2">
  <form action="/swtmanager/backend/web/index.php?r=usermobile/vipreply2" method="post">

    <div class="left">&nbsp;</div>
    <div class="leftbig">
 
      <div class="juli"><span style="font-size:16px">学员：</span>&nbsp;&nbsp; <span style="font-size:14px;color:blue;"><?php echo $studentname;?></span></div>
     
      <div class="juli"></div>
      
      <div class="juli"><span style="font-size:14px;">上课时间输入(从第二次上课时间开始)：&nbsp;&nbsp;</span></div>
       <div class="juli"></div>
       <div class="leftbig"><?php 
        for($i=2;$i<=$sks;$i++){
         echo "第".$i."次上课时间：";
      ?>
   
      <input  type="date" name=<?php  echo "studentdate".$i;?>><br>
 <div class="gao"></div>
      <?php 
         
         }
      ?> 

      </div>
    </div>
    <div class="leftbig">
      <div class="julibig"></div>
       <div class="juli"></div>
       <div class="leftbig"><?php 
       if(isset($sks2)){
        for($i=11;$i<=$sks2;$i++){
         echo "第".$i."次上课时间：";        
      ?>   
      <input  type="date" name=<?php  echo "studentdate".$i;?>><br>

      <?php 
         }
         }
      ?> 
      </div>
      <div class="juli"></div>
       <div class="juli"></div>     
      <input  type="hidden" name="studentphone" value=<?php echo $studentphone?>>
      <input type="hidden" name="studentname" value=<?php echo $studentname?>>
      <input type="hidden" name="kname" value=<?php echo $kname?>>
      <input type="hidden" name="teacher" value=<?php echo $teacher?>>
      <input type="hidden" name="shiduan" value=<?php echo $shiduan?>>
      <input type="hidden" name="studentkeshi" value=<?php echo $studentkeshi?>>
      <input type="hidden" name="youxiaotime" value=<?php echo $youxiaotime?>>
       <div class="juli"></div>
        <div class="juli"></div>
         <div class="juli"></div>      
        </div>
<div class="leftbig">
      <div class="julibig"></div>
       <div class="juli"></div>
       <div class="leftbig"><?php 
       if(isset($sks3)){
        for($i=21;$i<=$sks3;$i++){
         echo "第".$i."次上课时间：";        
      ?>   
      <input  type="date" name=<?php  echo "studentdate".$i;?>><br>

      <?php 
         }
         }
      ?> 
      </div>
      <div class="juli"></div>
       <div class="juli"></div>     
      <input type="hidden" name="studentphone" value=<?php echo $studentphone?>>
      <input type="hidden" name="studentname" value=<?php echo $studentname?>>
      <input type="hidden" name="kname" value=<?php echo $kname?>>
      <input type="hidden" name="teacher" value=<?php echo $teacher?>>
      <input type="hidden" name="shiduan" value=<?php echo $shiduan?>>
      <input type="hidden" name="studentkeshi" value=<?php echo $studentkeshi?>>
      <input type="hidden" name="youxiaotime" value=<?php echo $youxiaotime?>>
       <div class="juli"></div>
        <div class="juli"></div>
         <div class="juli"></div>      
        </div>

    <div class="leftbig">
      <div class="julibig"></div>
       <div class="juli"></div>
       <div class="leftbig"><?php 
       if(isset($sks4)){
        for($i=31;$i<=$sks4;$i++){
         echo "第".$i."次上课时间：";        
      ?>   
      <input  type="date" name=<?php  echo "studentdate".$i;?>><br>

      <?php 
         }
         }
      ?> 
      </div>
      <div class="juli"></div>
       <div class="juli"></div>     
      <input type="hidden" name="studentphone" value=<?php echo $studentphone?>>
      <input type="hidden" name="studentname" value=<?php echo $studentname?>>
      <input type="hidden" name="kname" value=<?php echo $kname?>>
      <input type="hidden" name="teacher" value=<?php echo $teacher?>>
      <input type="hidden" name="shiduan" value=<?php echo $shiduan?>>
      <input type="hidden" name="studentkeshi" value=<?php echo $studentkeshi?>>
      <input type="hidden" name="youxiaotime" value=<?php echo $youxiaotime?>>
       <div class="juli"></div>
        <div class="juli"></div>
         <div class="juli"></div>      
        </div>
   <div class="julibig2"></div>
    <div class="left">&nbsp;</div>
    <div class="leftbig">
    
    <div class="left">&nbsp;</div>
   
        <div style="width:500px;height:30px;margin: 0px auto;" aligin="center"><input type="submit" name="submit" value="确认" class="button" /></div> 
        </div> 

  </form>
  </div>
</div>
</div>
