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
   
  //如果有pageNow就使用，没有就默认第一页。
  if (!empty($_GET['id'])){
    $pageNow = $_GET['id'];
  }


  // $sql2 = "select * from student order by date desc limit $pre,$pageSize ";
  // $res2 = mysqli_query($conn,$sql2);


//搜索功能
$submit=isset($_POST["submit2"])?$_POST["submit2"]:'';
$name=isset($_POST["name"])?$_POST["name"]:'';

if($submit<>''){
    //获取总记录
     $sql1 = "select count(id) from admin where leibie='老师' and m_name like '%".$name."%'";
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

    $xinxi="select * from admin  where leibie='老师' and m_name like '%".$name."%' order by id desc limit $pre,$pageSize";
    $mesage=mysqli_query($conn,$xinxi);
}else{
  //获取总记录
 $sql1 = "select count(id) from admin where leibie='老师'";
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
 
$xinxi="select * from admin  where leibie='老师' order by id desc limit $pre,$pageSize";
$mesage=mysqli_query($conn,$xinxi);
}

// echo "<script>alert('添加成功');location.reload();</script>";//本页面刷新

//恢复原始密码
  $submit2=isset($_POST["submit4"])?$_POST["submit4"]:'';
  $mimaid=isset($_POST["mimaid"])?$_POST["mimaid"]:'';
  echo $mimaid;
  $update="UPDATE admin SET password='000000' where id='".$mimaid."'";
  $ok=mysqli_query($conn,$update);

 
?>

<script type="text/javascript" src="http://www.siwutang.vip/swtmanager/backend/web/statics/js/jquery-1.4.2.min.js"></script>
<style>

.juli{
  width: 300px;
  height: 15px;
}
.julibig{
  width: 300px;
  height:300px;
}

.ziti{
  font-size: 16px;
  font-family: 微软雅黑;
} 

.left2{
  width: 20%;
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
  width: 17%;
  float:left;
  display: inline;
  line-height:30px;
}
.leftcenter{
  width: 100px;
  float:left;
  display: inline;
  height:30px;
  text-align:center;
  margin-top:5px;
}


.kuan{
  width:95%;
  height:30px;
 margin: auto;
} 
.inline{
  margin: auto;
  width:80%;
  height: 30px;
  background-color:#eee;
} 
.left{
  display:inline;
  width: 230px;
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
.nei{
  margin:12px;
  background-color:#eee;
  width:98%;
    height:95%;
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
.center{
  width:80%;
  margin: auto;
}
.juli3{
          width:500px;
          height: 50px;
      }
</style>


<div class="main">
<div class="nei">
<div class="juli3"></div>
  <div class="kuan ziti"><a href="http://www.siwutang.vip/swtmanager/backend/web/index.php?r=teacher/teachermsg">老师课程添加</a></div>
  <div class="left">&nbsp;</div>

    <div class="juli"></div>
        <div class="kuan">
         
            
   
            <form action="/swtmanager/backend/web/index.php?r=teacher/teachermsg" method="post">
        
            <div class="leftmiddle">
                <input type="text" name="name" placeholder="请输入老师姓名" style="height: 25px;width: 120px;display: inline;"/>
                <div style="width: 20px ;height: 20px;display: inline;"></div>
                
            </div class="leftmiddle">
                  <input type="submit" name="submit2" value="搜索" class="button" />         
            <div>
            </div>
            </form>
        </div>
    <div class="juli"></div>
        <div class="center">

            <table border="1" width=90% style="background-color: white;">
              <thead>
                <tr>   
                   <th>注册时间</th>                                 
                   <th>老师名</th>
                   <th>手机号</th> 
                   <th>是否关闭</th>         
                   <th>查看</th>
                </tr>
              </thead>
              <?php 
                while($teach=mysqli_fetch_array($mesage)){
                    $ltime=$teach['created_at'];
                    $ldate = date("Y-m-d",$ltime);
                    $m_name=$teach['m_name'];
                    $m_tel=$teach['m_tel'];
                    $status=$teach['status'];         
                    $sid=$teach['id'];  //学员id
              ?>
              <tr>
          
                <td><?php echo $ldate?></td>
     
                <td><?php echo $m_name?></td>
                <td><?php echo $m_tel?></td>
                <td><?php if($status==10){echo "开启状态";}else{ echo "关闭状态";}?></td>
            
                <td><a href="javascript:void(0)" onclick = "openWindow('http://www.siwutang.vip/swtmanager/backend/xiugai.php?id=<?php echo $sid;?>')"><?php echo "修改手机号"?></a>　/　<a href="http://www.siwutang.vip/swtmanager/backend/web/index.php?r=teacher/addkecheng&id=<?php echo $sid;?>"  target="_parent"><?php if($status==10){echo "添加课程";}else{ echo "";}?></a>　 </td>
             <?php }?>
              </tr>
            </table>
            <p></p>
        <div class="center-in-center">
        <?php
          if($pageNow>1){
    $prePage = $pageNow-1;
    echo "<a href='http://www.siwutang.vip/swtmanager/backend/web/index.php?r=teacher/teachermsg&id=$prePage'>上一页</a> ";
    echo "&nbsp;&nbsp;&nbsp;";
  }
  if($pageNow<$pageCount){
    $nextPage = $pageNow+1;
    echo "<a href='http://www.siwutang.vip/swtmanager/backend/web/index.php?r=teacher/teachermsg&id=$nextPage'>下一页</a> ";
    echo "&nbsp;&nbsp;&nbsp;";
    echo "当前第{$pageNow}页/共{$pageCount}页";
  }
  echo "<br/><br/>";
        ?>
     
        </div>

    <div class="julibig"></div>
        <div class="kuan"></div>
  </div>

</div>
</div>
</div>
<script type="text/javascript">
$(document).ready(function(){ 
   $("#button_text1").click(function(){  
                var result1 = $("#input_text1").val();
                url='http://www.siwutang.vip/swtmanager/backend/studentlist.php?id=';  

                 location.href=url+result1; 
                 console.log(location.href);

            }); 
  });

 function openWindow(url){  
       window.open(url,"openWindow","height=200,width=400,menubar=no,titlebar=no,toolbar=no,location=no,left=200,top=200,status=no");  
   }
  function openWindow2(url){  
       window.open(url,"openWindow","height=200,width=400,menubar=no,titlebar=no,toolbar=no,location=no,left=200,top=200,status=no");  
   }  
</script>


