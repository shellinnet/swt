<?php 
header("Content-type: text/html; charset=utf-8"); 
$conn=mysqli_connect('hdm121115553.my3w.com','hdm121115553','swt62899308swt','hdm121115553_db');
  if($conn->connect_errno){
      die('连接失败'.$conn->connect_errno);
  }
  $conn->set_charset('utf8');

$id=$_REQUEST['id'];
$teach="select * from admin where id='".$id."'";
$teacher=mysqli_query($conn,$teach);
while($tt=mysqli_fetch_array($teacher)){
     $m_name=$tt['m_name'];
     $m_tel=$tt['m_tel'];

}

//老师修改
$submit=isset($_POST["submit"])?$_POST["submit"]:'';
$teacherphone=isset($_POST["teacherphone"])?$_POST["teacherphone"]:'';
$teachername=isset($_POST["teachername"])?$_POST["teachername"]:'';
$tid=isset($_POST["tid"])?$_POST["tid"]:'';

if($submit<>''){
$ls="UPDATE admin SET  m_tel='".$teacherphone."' where id='".$tid."'";

$teachers=mysqli_query($conn,$ls);

   if($teachers=='true'){
    echo "<script>alert('老师更换手机号成功！');window.close(this);</script>";
   }
    
  }

 ?>
<script type="text/javascript" src="http://www.qingyingtech.cn/swt/backend/web/statics/js/jquery-1.4.2.min.js"></script>
<style>

.juli{
  width: 300px;
  height: 15px;
}
.kuang{
  width:400px;
  height:30px;
}
.left{
  width: 50px;
  float:left;
  display: inline;
}
.leftbig{
  width: 200px;
  float:left;
  display: inline;
}
.button{

background:#7CC7EA;;/*背景色*/
font-size: 14px;
color:white;/*字体颜色*/
width:80px;
height:30px;

}
.ziti{
  font-size: 14px;
  font-family: 微软雅黑;
}
.input{
  width: 100px;
  height: 30px;
}
</style>

<div class="kuang">
  <div class="juli"></div>
    <div class="left">&nbsp;</div>
      <div class="leftbig">
      <form action="http://www.siwutang.vip/swtmanager/backend/xiugai.php?id=<?php echo $id?>" method="post">
      <div class="juli"></div>
      <div class="juli"><span style="font-size:14px;color:red;">*</span><span style="font-size:14px;">&nbsp;手机号：　&nbsp;</span><input   class="input" type="text" name="teacherphone"    value=<?php echo $m_tel?>> </div>
      <div class="juli"></div>
      <input  type="hidden"  name="tid"    value=<?php echo $id?>>
       <div class="juli"></div>
        <div class="juli"><span style="font-size:14px;">&nbsp;老师姓名：&nbsp;&nbsp;</span><input  class="input" type="text" name="teachername" disabled="disabled" readonly="readonly" value=<?php echo $m_name?> ></div>
         <div class="juli"></div>
         <p></p>
        <div class="width:500px;height:30px;margin: 0px auto;" aligin="center"><input type="submit" name="submit" value="修 改" class="button" /></div>

  
    </form>
    </div>
</div>



