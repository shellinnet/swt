<?php 
use yii\helpers\Html;
$conn=mysqli_connect('hdm121115553.my3w.com','hdm121115553','swt62899308swt','hdm121115553_db');
  if($conn->connect_errno){
      die('连接失败'.$conn->connect_errno);
  }
  $conn->set_charset('utf8');

  //课程添加
$submit=isset($_POST["submit"])?$_POST["submit"]:'';
$course=isset($_POST["kecheng"])?$_POST["kecheng"]:'';
$leibie=isset($_POST["leibie"])?$_POST["leibie"]:'';

var_dump($_FILES["file"]);
echo "<br>";


//判断上传的文件是否出错,是的话，返回错误
if($_FILES["file"]["error"])
{
    echo $_FILES["file"]["error"];    
}
else
{
    //没有出错
    //加限制条件
    //判断上传文件类型为png或jpg且大小不超过1024000B
    if(($_FILES["file"]["type"]=="image/png"||$_FILES["file"]["type"]=="image/jpeg")&&$_FILES["file"]["size"]<1024000)
    {
            //防止文件名重复
            $filename ="./img/".time().$_FILES["file"]["name"];
            //转码，把utf-8转成gb2312,返回转换后的字符串， 或者在失败时返回 FALSE。
            $filename =iconv("UTF-8","gb2312",$filename);
             //检查文件或目录是否存在
            if(file_exists($filename))
            {
                echo"该文件已存在";
            }
            else
            {  
               echo "<br>";

                //保存文件,   move_uploaded_file 将上传的文件移动到新位置  
                move_uploaded_file($_FILES["file"]["tmp_name"],$filename);//将临时地址移动到指定地址

            }        
    }
    else
    {
        echo"文件类型不对";
    }
}

$files="/web/img/".$_FILES["file"]["tmp_name"];
echo $files;

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
  <div class="ziti">四物堂---课程添加成功</div>
    <img src="/swtmanager/backend/web/statics/images/top.jpg" width="1100" height="82" border="0" usemap="#Map" />
<map name="Map" id="Map"><area shape="rect" coords="3,3,192,78" href="/swtmanager/backend/web/index.php?r=usermobile/register" />
<area shape="rect" coords="229,4,420,78" href="/swtmanager/backend/web/index.php?r=usermobile/main" /><area shape="rect" coords="454,3,643,79" href="/swtmanager/backend/web/index.php?r=teacher/main" /><area shape="rect" coords="679,5,863,80" href="/swtmanager/backend/web/index.php?r=tongzhi/main" /><area shape="rect" coords="902,4,1091,78" href="/swtmanager/backend/web/index.php?r=admin/main" /></map>
  <div class="juli"></div>
</div>
<div class="juli"></div>

<div class="main">
   <div style="width: 697px;height: 467px;background-image: url(/swtmanager/backend/web/statics/images/zhuceok.jpg);margin: auto;"></div>
</div>
