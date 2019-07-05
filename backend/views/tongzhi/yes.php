<?php 
header("Content-Type: text/html;charset=utf-8");
use yii\helpers\Html;
$conn=mysqli_connect('hdm121115553.my3w.com','hdm121115553','swt62899308swt','hdm121115553_db');
  if($conn->connect_errno){
      die('连接失败'.$conn->connect_errno);
  }
  $conn->set_charset('utf8');

$id=$_GET['id'];
echo $id;

$cx="DELETE from  tongzhi where id='".$id."'";

$cha=mysqli_query($conn,$cx);
var_dump($cha);
?> 
<script type="text/javascript" src="http://www.qingyingtech.cn/swt/backend/web/statics/js/jquery-1.4.2.min.js"></script>
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
  width: 230px;
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
 
}
.leftcenter2{
  width: 300px;
  float:left;
  display: inline;
  height:30px;
  text-align:center;
}
.button{
background:#259dab;/*背景色*/
font-size: 14px;
color:#fff;/*字体颜色*/
width:100px;
height:28px;
border-radius:10px;
cursor:pointer;
border:2px;
text-align: center;
line-height: 28px;

}
.button link{
  font:#fff !important;
}


.kuan{
  width:1000px;
  height: 50px;
  text-align: center;
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

         table  
        {  
            border-collapse: collapse;  
            margin: 0 auto;  
            text-align: center;
             border-color:#fff;  
        }  
        table td, table th  
        {  
            border: 2px solid #fff;  
            color: #666;  
            height: 30px;  
        }  
        table thead th  
        {  
            background-color: #7CC7EA; 
           
            text-align: center;
            color:#fff; 
        }  
        table tr:nth-child(odd)  
        {  
            background: #ECF5FB;  
        }  
        table tr:nth-child(even)  
        {  
            background: #CBE9F7;  
        }

</style>

<div class="container">
  <div class="juli"></div>
  <div class="ziti">四物堂---删除通知成功</div>
    <img src="/swtmanager/backend/web/statics/images/top.jpg" width="1100" height="82" border="0" usemap="#Map" />
<map name="Map" id="Map"><area shape="rect" coords="3,3,192,78" href="/swtmanager/backend/web/index.php?r=usermobile/register" />
<area shape="rect" coords="229,4,420,78" href="/swtmanager/backend/web/index.php?r=usermobile/main" /><area shape="rect" coords="454,3,643,79" href="/swtmanager/backend/web/index.php?r=teacher/main" /><area shape="rect" coords="679,5,863,80" href="/swtmanager/backend/web/index.php?r=tongzhi/main" /><area shape="rect" coords="902,4,1091,78" href="#" /></map>
  <div class="juli"></div>
</div>
<div class="juli"></div>
<div class="main">
<div class="kuan">
  <div class="juli"></div>
  <div class="juli"></div>
    <div class="left">&nbsp;</div>
   <div class="ziti">删除通知成功！</div>
   <div class="juli">&nbsp;</div>
  
</div>
<div class="kuan">
<div class="left">&nbsp;</div>
<div class="juli">&nbsp;</div>
<div class="ziti"><a href="http://www.siwutang.vip/swtmanager/backend/web/index.php?r=tongzhi/main">点击返回！</a></div>
</div>
</div>