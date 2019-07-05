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
     .font{
  font-size: 14px;
  font-family: 微软雅黑;
}
.juli{
  width: 300px;
  height: 15px;
}
.julibig{
  width: 300px;
  height:20px;
}

.div2{
    width:1050px;
    height:600px;
    float:left;
    color:#000;
     }
.left2{
  width: 50px;
  float:left;
  display: inline;
}


.leftbig{
  width: 90%;
  float:left;
  display: inline;
  height:60px;
}
.leftmiddle{
  width: 350px;
  float:left;
  display: inline;
  line-height:30px;
}
.leftmiddle2{
  width: 80%;
  float:left;
  display: inline;
  line-height:30px;
}
.leftcenter{
  width: 10%;
  float:left;
  display: inline;
  height:30px;
  text-align:center;
  margin-top:5px;
}

.leftcenter2{
  width: 2%;
  float:left;
  display: inline;
  height:30px;
  text-align:center;
  margin-top:5px;
}


.kuan2{
  width:75%;
  height:30px;
 margin: auto;
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
          width: 120px;
          height: 30px;
        }
        .font{
  font-size: 14px;
  font-family: 微软雅黑;
}
        .nei{
  margin:12px;
  background-color:#eee;
  width:98%;
    height:95%;
}
.inline{
  margin: auto;
  width:66%;
  height: 30px;
  background-color:#eee;
} 
.left{
  display:inline;
  width: 250px;
  line-height: 30px;
  background-color:#eee;
  float:left;
}
.right{
  display:inline;
  width: 100px;
  line-height: 30px;
  background-color:#eee;
  float:right;
}
.center{
  width:92%;
  margin: auto;
 
}
.middle{
  width:90%;
  margin: auto;
    background-color:#eee;
  height:350px;  
}
.dangzhong{
  display:inline;
  width: 200px;

  line-height: 30px;
  background-color:#eee;
 
}
.ziti{
  font-size: 14px;
  font-family: 微软雅黑;
}        
</style>

<div class="main font">
<div class="nei">
    <div class="julibig"></div>
    <div class="kuan ziti"><a href="http://www.siwutang.vip/swtmanager/backend/web/index.php?r=usermobile/main">所有学员上课信息</a></div>

    <div class="inline">
       <div class="left"><form action="http://www.siwutang.vip/swtmanager/backend/studentlist.php" method="post" target="showstu">
            <div class="leftmiddle">
                <input type="text" name="tel" placeholder="请输入手机号" class="jump_text" />　　<input type="submit" name="submit3" value="搜索" class="button" />　               
            </div>            
           </form></div>
       <div class="dangzhong"><form action="http://www.siwutang.vip/swtmanager/backend/studentlist.php" method="post" target="showstu">
          <div class="leftcenter"></div>
            <div class="leftmiddle">
                <input type="text" name="name" placeholder="请输入学生姓名" class="jump_text" />　　　<input type="submit" name="submit2" value="搜索" class="button" />
                
            </div>
         
            </form>
       </div>
    </div>
    <div class="kuan2">
        <div class="middle" id="page_content2">            
            <iframe id="menuFrame2" name="showstu" src="http://www.siwutang.vip/swtmanager/backend/studentlist.php" style="overflow:visible;" scrolling="no" frameborder="no" width="1100px;" height="100%; float:left">         
            </iframe>
         
        </div>

    </div>
</div>             

</div>
  