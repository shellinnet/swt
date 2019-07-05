<?php

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
  if (!empty($_GET['pageNow'])){
    $pageNow = $_GET['pageNow'];
  }
//获取总记录
 $sql1 = "select count(id) from student";
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

  // $sql2 = "select * from student order by date desc limit $pre,$pageSize ";
  // $res2 = mysqli_query($conn,$sql2);


//搜索功能
$submit=isset($_POST["submit2"])?$_POST["submit2"]:'';
$name=isset($_POST["name"])?$_POST["name"]:'';
$week=isset($_POST["week"])?$_POST["week"]:'周三';

if($submit<>''){
    $xinxi="select a.id,a.date,a.created_at,a.week,a.sname,a.mobile,b.m_name,c.kname from student a,admin b,ke c where a.teacherid=b.id and a.knameid=c.id and a.sname='".$name."' and a.week='".$week."' and  a.close='0' order by a.created_at desc limit $pre,$pageSize";
    $mesage=mysqli_query($conn,$xinxi);
}else{
 
$xinxi="select a.id,a.date,a.sname,a.created_at,a.week,a.mobile,b.m_name,c.kname from student a,admin b,ke c where a.teacherid=b.id and a.knameid=c.id  and a.close='0' order by a.created_at desc limit $pre,$pageSize";
$mesage=mysqli_query($conn,$xinxi);
}






// echo "<script>alert('添加成功');location.reload();</script>";//本页面刷新

//恢复原始密码
  $submit2=isset($_POST["submit4"])?$_POST["submit4"]:'';
  $mimaid=isset($_POST["mimaid"])?$_POST["mimaid"]:'';
  echo $mimaid;
  $update="UPDATE student SET password='000000' where id='".$mimaid."'";
  $ok=mysqli_query($conn,$update);

  //关闭学员
  $submit2=isset($_POST["submit5"])?$_POST["submit5"]:'';
  $studentid=isset($_POST["studentid"])?$_POST["studentid"]:'';
  echo $studentid;
  $updatestudent="UPDATE student SET close='1' where id='".$studentid."'";
  $okstudent=mysqli_query($conn,$updatestudent);
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

</style>




<div class="juli"></div>

<div class="main">
  <div class="left">&nbsp;</div>
  <div class="leftbig">
   <div class="juli"></div>
        <div class="kuan">
            <table border="1" width="1000" style="background-color: white;">
              <thead>
                <tr>   
                   <th>注册时间</th>          
                   <th>开始上课时间</th>
                   <th>周期</th>
                   <th>学生名</th>
                   <th>手机号</th>
                   <th>上课课程</th>
                   <th>上课老师</th>
             
                   <th>查看</th>
                </tr>
              </thead>
              <?php 
                while($teach=mysqli_fetch_array($mesage)){
                    $ldate=$teach['date'];
                    $tetel=$teach['mobile'];
                    $sweek=$teach['week'];
                    $sname=$teach['sname'];
                    $m_name=$teach['m_name'];
                    $kname=$teach['kname'];
                    $zctime=$teach['created_at'];
                
                    $sid=$teach['id'];  //学员id
              ?>
              <tr>
                <td><?php echo $zctime?></td>
                <td><?php echo $ldate?></td>
                <td><?php echo $sweek?></td>
                <td><?php echo $sname?></td>
                <td><?php echo $tetel?></td>
                <td><?php echo $kname?></td>
                <td><?php echo $m_name?></td>
           
                <td><a href="http://www.siwutang.vip/swtmanager/backend/web/index.php?r=usermobile/xiang&id=<?php echo $sid;?>"><?php echo "详情"?>&nbsp;/&nbsp;<a href="http://www.siwutang.vip/swtmanager/backend/web/index.php?r=usermobile/del&id=<?php echo $sid;?>">删除</a></a></td>
             <?php }?>
              </tr>
            </table>
            <p></p>
        <div class="center-in-center">
        <?php
          if($pageNow>1){
    $prePage = $pageNow-1;
    echo "<a href='http://www.siwutang.vip/swtmanager/backend/web/index.php?r=usermobile/main&id=$prePage'>上一页</a> ";
    echo "&nbsp;&nbsp;&nbsp;";
  }
  if($pageNow<$pageCount){
    $nextPage = $pageNow+1;
    echo "<a href='http://www.siwutang.vip/swtmanager/backend/web/index.php?r=usermobile/main&id=$nextPage'>下一页</a> ";
    echo "&nbsp;&nbsp;&nbsp;";
    echo "当前第{$pageNow}页/共{$pageCount}页";
    echo "&nbsp;";
    echo '<input type="text" class="jump_text" name="jump" id="input_text1">&nbsp;<button id="button_text1">跳转</button>  ';
  }
  echo "<br/><br/>";
        ?>
     
        </div>
    <div class="julibig"></div>
        <div class="kuan"></div>
  </div>
</div>
</div>



