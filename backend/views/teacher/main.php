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

.juli{
  width: 300px;
  height: 15px;
}
.julibig{
  width: 300px;
  height:30px;
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

  margin-top:5px;
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
    width:90%;
    height:600px;
    float:left;
    color:#000;
     }
.nei{
  margin:12px;
  background-color:#eee;
  width:98%;
    height:95%;
}
.kuan{
  width:95%;
  height:30px;
 margin: auto;
} 
.inline{
  margin: auto;
  width:70%;
  height: 30px;
  background-color:#eee;
} 
.left{
  display:inline;
  width:400px;
  line-height: 30px;
  background-color:#eee;
  float:left;
}
.shuru{
  width: 150px;
  height: 30px;
}
.right{
  display:inline;
  width: 200px;
  line-height: 30px;
  background-color:#eee;
  float:right;
}
.center{
  width:80%;
  margin: auto;
 
}
.ziti{
  font-size: 16px;
  font-family: 微软雅黑;
}
</style>

<div class="main ziti">
<div class="nei">
<div class="juli"></div>
  <div class="kuan ziti"><a href="http://www.siwutang.vip/swtmanager/backend/web/index.php?r=teacher/main">老师课程信息管理</a></div>

   <div class="juli"></div>
  <div class="inline">        
            
            <form action="/swtmanager/backend/teacherlist.php" method="post" target="showstu">
            <div class="left">
                <select name="week" >
                    <option value ="ALL">全部</option>
                    <option value ="周三">周三</option>
                    <option value ="周四">周四</option>
                    <option value ="周五">周五</option>
                    <option value ="周六">周六</option>
                    <option value ="周日">周日</option>
                </select>
               
               &nbsp;
                <input type="text" name="name" placeholder="请输入老师姓名" class="shuru"/>&nbsp;
                <input type="submit" name="submit2" value="搜索" class="button" />
               
           
            </div>
             </form>
            <div class="right" >　</div>
</div>
 
      <div class="center">
         <div id="page_content2" class="div2">
       <iframe id="menuFrame2" name="showstu" src="http://www.siwutang.vip/swtmanager/backend/teacherlist.php" style="overflow:visible;" scrolling="no" frameborder="no" width="1100px;" height="100%; float:left">
            
        </iframe>
        </div>
      </div>

</div>
</div>



