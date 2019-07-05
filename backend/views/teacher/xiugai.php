<?php 

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

 ?>
<script type="text/javascript" src="http://www.qingyingtech.cn/swt/backend/web/statics/js/jquery-1.4.2.min.js"></script>
<style>

.juli{
  width: 300px;
  height: 15px;
}
.kuang{
  width:1100px;
  height:30px;
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

<div class="main">
  <div class="juli"></div>
    <div class="left">&nbsp;</div>
    
      <form action="/swtmanager/backend/web/index.php?r=teacher/xiuok" method="post">
      <div class="juli"></div>
      <div class="juli"><span style="font-size:14px;color:red;">*</span><span style="font-size:14px;">&nbsp;手机号&nbsp;&nbsp;</span><input  type="text" name="teacherphone"    value=<?php echo $m_tel?>> </div>
      <div class="juli"></div>
      <input  type="hidden"  name="tid"    value=<?php echo $id?>>
       <div class="juli"></div>
        <div class="juli"><span style="font-size:14px;color:red;">*</span><span style="font-size:14px;">&nbsp;老师姓名&nbsp;&nbsp;</span><input type="text" name="teachername" value=<?php echo $m_name?> disabled="disabled" readonly="readonly">
         <div class="juli"></div>
        <div class="width:500px;height:30px;margin: 0px auto;" aligin="center"><input type="submit" name="submit" value="修 改" class="button" /></div>
    </div>

  
    </form>
</div>



