<?php 
use yii\helpers\Html;
$conn=mysqli_connect('hdm121115553.my3w.com','hdm121115553','swt62899308swt','hdm121115553_db');
  if($conn->connect_errno){
      die('连接失败'.$conn->connect_errno);
  }
$conn->set_charset('utf8');

$id=$_REQUEST['id'];

$chaxun="select * from student where id='".$id."'";
$ca=mysqli_query($conn,$chaxun);
while($student=mysqli_fetch_array($ca)){
     $name=$student['sname'];
     $teacherid=$student['teacherid'];
     $kid=$student['knameid'];
     $week=$student['week'];
   
}

$delke="DELETE FROM student WHERE   id='".$id."' ";
$delkes=mysqli_query($conn,$delke);

$delstu="DELETE FROM course WHERE xueyuan='".$name."' and teacherid='".$teacherid."' and kid='".$kid."' and week='".$week."'";
$delstus=mysqli_query($conn,$delstu);


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
<div class="container">
  <div class="juli"></div>
  <div class="ziti">四物堂---学员信息删除</div>
    <img src="/swtmanager/backend/web/statics/images/top.jpg" width="1100" height="82" border="0" usemap="#Map" />
<map name="Map" id="Map"><area shape="rect" coords="3,3,192,78" href="/swtmanager/backend/web/index.php?r=usermobile/register" />
<area shape="rect" coords="229,4,420,78" href="/swtmanager/backend/web/index.php?r=usermobile/main" /><area shape="rect" coords="454,3,643,79" href="/swtmanager/backend/web/index.php?r=teacher/main" /><area shape="rect" coords="679,5,863,80" href="/swtmanager/backend/web/index.php?r=tongzhi/main" /><area shape="rect" coords="902,4,1091,78" href="/swtmanager/backend/web/index.php?r=admin/main" /></map>
  <div class="juli"></div>
</div>
<div class="juli"></div>
<div class="main">
学员信息删除成功！
</div>