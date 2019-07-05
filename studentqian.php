<?php 
header("Content-type: text/html; charset=utf-8"); 
$conn=mysqli_connect('hdm121115553.my3w.com','hdm121115553','swt62899308swt','hdm121115553_db');
  if($conn->connect_errno){
      die('连接失败'.$conn->connect_errno);
  }
  $conn->set_charset('utf8');

$id=$_REQUEST['id'];
$teach="select * from course where id='".$id."'";
$teacher=mysqli_query($conn,$teach);
while($tt=mysqli_fetch_array($teacher)){
     $qian=$tt['qian'];

}

//学生签到
$submit=isset($_POST["submit"])?$_POST["submit"]:'';


$tid=isset($_POST["tid"])?$_POST["tid"]:'';
echo $tid;
if($submit<>''){
	if($qian==0){
        $ls="UPDATE course SET  qian='1' where id='".$tid."'";
		$teachers=mysqli_query($conn,$ls);

		   if($teachers=='true'){
		    echo "<script>alert('学员签到修改成功！');window.close(this);</script>";
		   }
	}else{
		$ls="UPDATE course SET  qian='0' where id='".$tid."'";
		$teachers=mysqli_query($conn,$ls);

		   if($teachers=='true'){
		    echo "<script>alert('学员签到修改成功！');window.close(this);</script>";
		   }
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
      <form action="http://www.siwutang.vip/studentqian.php?id=<?php echo $id?>" method="post">
      <div class="juli"></div>
      <div class="juli"><span style="font-size:14px;color:red;">*</span><span style="font-size:14px;">&nbsp;是否签到：　&nbsp;</span>
      <select   class="input" type="text" name="qian"   >

           <option  value=<?php echo $qian?>><?php if($qian==0){echo "未签到";}else{ echo "已签到";}?></option>
           <option value ="0">未签到</option>
           <option value ="1">签到</option>
      </select>
       </div>
      <div class="juli"></div>
      <input  type="hidden"  name="tid"    value=<?php echo $id?>>
       <div class="juli"></div>
     
         <div class="juli"></div>
         <p></p>
        <div class="width:500px;height:30px;margin: 0px auto;" aligin="center"><input type="submit" name="submit" value="修 改" class="button" /></div>

  
    </form>
    </div>
</div>



