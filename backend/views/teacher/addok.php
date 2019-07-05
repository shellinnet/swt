<?php 
use yii\helpers\Html;
$conn=mysqli_connect('hdm121115553.my3w.com','hdm121115553','swt62899308swt','hdm121115553_db');
  if($conn->connect_errno){
      die('连接失败'.$conn->connect_errno);
  }
  $conn->set_charset('utf8');

//老师注册
$submit=isset($_POST["submit"])?$_POST["submit"]:'';
$teacherphone=isset($_POST["teacherphone"])?$_POST["teacherphone"]:'';
$teachername=isset($_POST["teachername"])?$_POST["teachername"]:'';
$createdtime=time();

if($teacherphone<>'' && $teachername<>''){
  //查询老师是否重复
  $te="select count(id) from admin where m_name='".$teachername."'";
  $tea=mysqli_query($conn,$te);
  while($tt=mysqli_fetch_array($tea)){
        $ttname=$tt['count(id)'];
     }
if($ttname==0){
$ls="INSERT INTO admin(username,password,created_at,m_tel,m_name,status,leibie) VALUES('".$teacherphone."','000000','".$createdtime."','".$teacherphone."','".$teachername."','10','老师')";
$teacher=mysqli_query($conn,$ls);

$cx="select id from admin where m_name='".$teachername."' and m_tel='".$teacherphone."' order by id desc limit 1";
$cxs=mysqli_query($conn,$cx);
while($ht=mysqli_fetch_array($cxs)){
      $hts=$ht['id'];
      $gg="INSERT INTO auth_assignment(item_name,user_id,created_at,type) VALUES('老师','".$hts."','".$createdtime."','1')";
      $ggs=mysqli_query($conn,$gg);
   }
echo "<script>alert('注册成功');window.location.href='http://www.siwutang.vip/swtmanager/backend/web/index.php?r=teacher/teachermsg';</script>";

}else{
  echo "<script>alert('老师姓名重复！');window.location.href='http://www.siwutang.vip/swtmanager/backend/web/index.php?r=teacher/register';</script>";
}

}else{
  echo "<script>alert('请输入老师信息！');window.location.href='http://www.siwutang.vip/swtmanager/backend/web/index.php?r=teacher/register';</script>";
}


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
  <div class="ziti">四物堂---老师添加成功</div>
    <img src="/swtmanager/backend/web/statics/images/top.jpg" width="1100" height="82" border="0" usemap="#Map" />
<map name="Map" id="Map"><area shape="rect" coords="3,3,192,78" href="/swtmanager/backend/web/index.php?r=usermobile/register" />
<area shape="rect" coords="229,4,420,78" href="/swtmanager/backend/web/index.php?r=usermobile/main" /><area shape="rect" coords="454,3,643,79" href="/swtmanager/backend/web/index.php?r=teacher/main" /><area shape="rect" coords="679,5,863,80" href="/swtmanager/backend/web/index.php?r=tongzhi/main" /><area shape="rect" coords="902,4,1091,78" href="/swtmanager/backend/web/index.php?r=admin/main" /></map>
  <div class="juli"></div>
</div>
<div class="juli"></div>

<div class="main">
   <div style="width: 697px;height: 467px;background-image: url(/swtmanager/backend/web/statics/images/zhuceok.jpg);margin: auto;"></div>
</div>
