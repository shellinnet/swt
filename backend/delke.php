<?php 
use yii\helpers\Html;
$conn=mysqli_connect('hdm121115553.my3w.com','hdm121115553','swt62899308swt','hdm121115553_db');
  if($conn->connect_errno){
      die('连接失败'.$conn->connect_errno);
  }
$conn->set_charset('utf8');

$id=$_REQUEST['id'];
$week=$_REQUEST['week'];
$duan=$_REQUEST['duan'];
$keid=$_REQUEST['keid'];

$delke="DELETE FROM kecheng WHERE  keid='".$keid."' and teacherid='".$id."' and zq='".$week."' and duan='".$duan."'";

$delkes=mysqli_query($conn,$delke);

$delke2="DELETE FROM course WHERE  kid='".$keid."' and teacherid='".$id."' and week='".$week."' and ktime='".$duan."'";

$delkes2=mysqli_query($conn,$delke2);
?>
<style>
body{
  font-size: 12px;
  font-family: 微软雅黑;
  
}
.container{
    width:1120px;
    height:150px;
    border:1px #8A8A8A solid;
    background-color:#fff;
    margin-left:15px;
    border-radius:5px;
   }
.ziti{
  font-size: 14px;
  font-family: 微软雅黑;
  color:red;
}
.juli{
  width: 300px;
  height: 15px;
}
.julibig{
  width: 300px;
  height:300px;
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
  height:30px;
}
.leftmiddle{
  width: 250px;
  float:left;
  display: inline;
  height:30px;
}
.leftcenter{
  width: 100px;
  float:left;
  display: inline;
  height:30px;
  text-align:center;
  margin-top:5px;
}
.button{
background:#259dab;/*背景色*/
font-size: 14px;
color:#fff;/*字体颜色*/
width:95px;
height:28px;
border-radius:10px;
cursor:pointer;
border:2px;
}

.kuan{
  width:1000px;
  height: 50px;
}
.black_overlay{ 
    display: none; 
    position: absolute; 
    top: 0%; 
    left: 0%; 
    width: 100%; 
    height: 100%; 
    background-color: black; 
    z-index:1001; 
    -moz-opacity: 0.8; 
    opacity:.80; 
    filter: alpha(opacity=88); 
    } 
.white_content { 
    display: none; 
    position: absolute; 
    top: 25%; 
    left: 25%; 
    width: 55%; 
    height: 55%; 
    padding: 20px; 
   border-radius: 30px;
    background-color: white; 
    z-index:1002; 
    overflow: auto; 
} 

</style>
<div class="left">&nbsp;</div>
  <div class="leftbig">

<div class="juli ziti">
老师课程删除成功！
</div>
</div>
