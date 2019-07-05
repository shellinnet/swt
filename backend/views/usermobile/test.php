<?php
use yii\helpers\Html;
ini_set("display_errors", "On");
error_reporting(E_ALL);
$conn=mysqli_connect('hdm121115553.my3w.com','hdm121115553','swt62899308swt','hdm121115553_db');
  if($conn->connect_errno){
      die('连接失败'.$conn->connect_errno);
  }
  $conn->set_charset('utf8');

$zai="select * from student where close='0' and end='0' group by mobile   ";
  $zaidu=mysqli_query($conn,$zai);
  $i=0;
  while($zd=mysqli_fetch_array($zaidu)){
      $i=$i+1;
  }

//分页显示

  $pageSize = 10;   //每页显示的数量
  $rowCount = 0;   //要从数据库中获取
  $pageNow = 1;    //当前显示第几页
   
  

  // $sql2 = "select * from student order by date desc limit $pre,$pageSize ";
  // $res2 = mysqli_query($conn,$sql2);


//搜索功能
$submit=isset($_POST["submit2"])?$_POST["submit2"]:'';
$name=isset($_POST["name"])?$_POST["name"]:'';

$submit2=isset($_POST["submit3"])?$_POST["submit3"]:'';
$tel=isset($_POST["tel"])?$_POST["tel"]:'';

if($submit<>'' ){

  //获取总记录
 $sql1 = "select count(id) from student where sname like '%".$name."%' and close='0'";
  $res1 = mysqli_query($conn,$sql1);
   
  if($row1=mysqli_fetch_row($res1)){
    $rowCount = $row1[0];
 
    echo "<br>";
  }else{
     echo "no";
  }

//计算共有多少页，ceil取进1
  $pageCount = ceil(($rowCount/$pageSize));
   
  $pre = ($pageNow-1)*$pageSize;

    $xinxi="select a.id,a.date,a.created_at,a.week,a.sname,a.mobile,b.m_name,c.kname from student a,admin b,ke c where a.teacherid=b.id and a.knameid=c.id and a.sname like '%".$name."%'   order by a.id desc limit $pre,$pageSize";
    $mesage=mysqli_query($conn,$xinxi);
}else{

  //获取总记录
 $sql1 = "select count(id) from student where close='0'";
  $res1 = mysqli_query($conn,$sql1);
   
  if($row1=mysqli_fetch_row($res1)){
    $rowCount = $row1[0];
 
    echo "<br>";
  }else{
     echo "no";
  }

//计算共有多少页，ceil取进1
  $pageCount = ceil(($rowCount/$pageSize));
   
  $pre = ($pageNow-1)*$pageSize;
 
$xinxi="select a.id,a.date,a.sname,a.created_at,a.week,a.mobile,b.m_name,c.kname from student a,admin b,ke c where a.teacherid=b.id and a.knameid=c.id  and a.close='0' order by a.id desc limit $pre,$pageSize";
$mesage=mysqli_query($conn,$xinxi);
}

if($submit2<>'' ){

  //获取总记录
 $sql1 = "select count(id) from student where mobile like '%".$tel."%' and close='0' ";
  $res1 = mysqli_query($conn,$sql1);
   
  if($row1=mysqli_fetch_row($res1)){
    $rowCount = $row1[0];
 
    echo "<br>";
  }else{
     echo "no";
  }

//计算共有多少页，ceil取进1
  $pageCount = ceil(($rowCount/$pageSize));
   
  $pre = ($pageNow-1)*$pageSize;

    if (!empty($_GET['id'])){

    $pageNow = $_GET['id'];
    if($pageNow>$pageCount){
      echo '<script language="JavaScript"> alert("输入页码错误！");history.back();</script>';
    }
  }


    $xinxi="select a.id,a.date,a.created_at,a.week,a.sname,a.mobile,b.m_name,c.kname from student a,admin b,ke c where a.teacherid=b.id and a.knameid=c.id and a.mobile like '%".$tel."%' and a.close='0'  order by a.id desc limit $pre,$pageSize";
    $mesage=mysqli_query($conn,$xinxi);
}

// echo "<script>alert('添加成功');location.reload();</script>";//本页面刷新

//恢复原始密码
  $submit2=isset($_POST["submit4"])?$_POST["submit4"]:'';
  $mimaid=isset($_POST["mimaid"])?$_POST["mimaid"]:'';

  $update="UPDATE student SET password='000000' where id='".$mimaid."'";
  $ok=mysqli_query($conn,$update);

 
?>



<script type="text/javascript" src="http://www.siwutang.vip/swtmanager/backend/web/statics/js/jquery-1.4.2.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){ 
   $("#button_text1").click(function(){  
                var result1 = $("#input_text1").val();
                url='http://www.siwutang.vip/swtmanager/backend/web/index.php?r=usermobile/main&id=';  

                 location.href=url+result1; 
            }); 
  });
</script>
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
  height:50px;
}
.main{
    width:1120px;
    height:500px;
    border:1px #8A8A8A solid;
    background-color:#fff;
    margin-left:15px;
    border-radius:5px;
}
.div2{
    width:1050px;
    height:600px;
    float:left;
    color:#000;
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
  margin-top:5px;
}
.button{

background:green;/*背景色*/
font-size: 14px;
color:white;/*字体颜色*/
width:50px;
height:25px;

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
.top{
    width:1120px;
    height:50px;

    margin-left:15px;
    border-radius:5px;
}
    .jump_text{
          width: 60px;
          height: 20px;
        }
</style>


<div class="container">
  <div class="juli"></div>
  <div class="ziti">四物堂---学员管理</div>
    <img src="/swtmanager/backend/web/statics/images/top.jpg" width="1100" height="82" border="0" usemap="#Map" />
<map name="Map" id="Map"><area shape="rect" coords="3,3,192,78" href="/swtmanager/backend/web/index.php?r=usermobile/register" />
<area shape="rect" coords="229,4,420,78" href="/swtmanager/backend/web/index.php?r=usermobile/main" /><area shape="rect" coords="454,3,643,79" href="/swtmanager/backend/web/index.php?r=teacher/main" /><area shape="rect" coords="679,5,863,80" href="/swtmanager/backend/web/index.php?r=tongzhi/main" /><area shape="rect" coords="902,4,1091,78" href="/swtmanager/backend/web/index.php?r=admin/main" /></map>
  <div class="juli"></div>
</div>

<div class="juli"></div>

<div class="main">
  <div class="left">&nbsp;</div>
  <div class="leftbig">
    <div class="juli"></div>
        <div class="kuan">
            <div class="left"></div>
             <div class="left" style="width: 220px;height: 50px;">目前在读人数： <?php 
           echo $i;
          ?></div>
     
            <div class="left" style="width: 220px;height: 50px;"></div>
             <form action="http://www.siwutang.vip/swtmanager/backend/studentlist.php" method="post" target="showstu">
            <div class="leftmiddle">
                <input type="text" name="tel" placeholder="请输入手机号" />
                <input type="submit" name="submit3" value="搜索" class="button" />
            </div>
           </form>

            <form action="http://www.siwutang.vip/swtmanager/backend/studentlist.php" method="post" target="showstu">
    
            <div class="leftmiddle">
                <input type="text" name="name" placeholder="请输入学生姓名" />
                <input type="submit" name="submit2" value="搜索" class="button" />
            </div>
            </form>
        </div>

          
</div>
   <div class="julibig"></div>

   <div class="left">&nbsp;</div>
   <div class="leftgig">
   <div class="juli"></div>
      <div class="kuan">
         <div id="page_content2" class="div2">
       <iframe id="menuFrame2" name="showstu" src="http://www.siwutang.vip/swtmanager/backend/studentlist.php" style="overflow:visible;" scrolling="no" frameborder="no" width="1050px;" height="100%; float:left">
            
        </iframe>
        </div>
      </div>
   </div>


</div>