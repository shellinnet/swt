<?php
use yii\helpers\Html;
$conn=mysqli_connect('hdm121115553.my3w.com','hdm121115553','swt62899308swt','hdm121115553_db');
  if($conn->connect_errno){
      die('连接失败'.$conn->connect_errno);
  }
  $conn->set_charset('utf8');

   //分页显示

  $pageSize = 10;   //每页显示的数量
  $rowCount = 0;   //要从数据库中获取
  $pageNow = 1;    //当前显示第几页



    //获取总记录
 $sql1 = "SELECT a.m_name,a.m_tel,b.keid,c.kname,c.tiao,b.zq ,b.duan,a.id FROM admin a,kecheng b,ke c where b.teacherid=a.id and b.close=0  and b.keid=c.id  order by b.id desc,b.zq ";
  $res1 = mysqli_query($conn,$sql1);
  $row1=mysqli_num_rows($res1);
    $rowCount = $row1;


//计算共有多少页，ceil取进1
  $pageCount = ceil(($rowCount/$pageSize));

  $pre = ($pageNow-1)*$pageSize;


   //如果有pageNow就使用，没有就默认第一页。
  if (!empty($_GET['id'])){

    $pageNow = $_GET['id'];
    if($pageNow>$pageCount){
      echo '<script language="JavaScript"> alert("输入页码错误！");history.back();</script>';
    }
  }


    $xinxi="SELECT a.m_name,a.m_tel,b.keid,c.kname,c.tiao,b.zq ,b.duan,a.id FROM admin a,kecheng b,ke c where b.teacherid=a.id and b.close=0  and b.keid=c.id  order by b.id desc,b.zq limit $pre,$pageSize";
    $mesage=mysqli_query($conn,$xinxi);


// echo "<script>alert('添加成功');location.reload();</script>";//本页面刷新

//恢复原始密码
  $submit2=isset($_POST["submit4"])?$_POST["submit4"]:'';
  $mimaid=isset($_POST["mimaid"])?$_POST["mimaid"]:'';

  $update="UPDATE admin SET password='000000' where id='".$mimaid."'";
  $ok=mysqli_query($conn,$update);


?>

<script type="text/javascript" src="http://www.siwutang.vip/swtmanager/backend/web/statics/js/jquery-1.4.2.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){ 
   $("#button_text1").click(function(){  
                var result1 = $("#input_text1").val();
                url='http://www.siwutang.vip/swtmanager/backend/web/index.php?r=teacher/main&id=';  

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
  height:30px;
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
        .jump_text{
          width: 60px;
          height: 20px;
        }
        .div2{
    width:1050px;
    height:600px;
    float:left;
    color:#000;
     }

</style>

<div class="container">
  <div class="juli"></div>
  <div class="ziti">四物堂---老师管理</div>
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
         
            <div class="left" style="width: 120px;height: 50px;"></div>
            <div class="leftmiddle ziti">&nbsp;     
           <a href="http://www.siwutang.vip/swtmanager/backend/web/index.php?r=teacher/main">返回老师管理</a></div>
      
            <form action="/swtmanager/backend/teacherlist.php" method="post" target="showstu">
            <div class="leftcenter">
                <select name="week">
                    <option value ="ALL">ALL</option>
                    <option value ="周三">周三</option>
                    <option value ="周四">周四</option>
                    <option value ="周五">周五</option>
                    <option value ="周六">周六</option>
                    <option value ="周日">周日</option>
                </select>
            </div>
            <div class="leftmiddle">
                <input type="text" name="name" placeholder="请输入老师姓名" />
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
       <iframe id="menuFrame2" name="showstu" src="http://www.siwutang.vip/swtmanager/backend/teacherlist.php" style="overflow:visible;" scrolling="no" frameborder="no" width="1050px;" height="100%; float:left">
            
        </iframe>
        </div>
      </div>
   </div>

</div>



