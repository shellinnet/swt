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
//获取总记录
 $sql1 = "select count(id) from ke";
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

   $ke="select * from ke order by id desc limit $pre,$pageSize";
 $kecheng=mysqli_query($conn,$ke);

?>
<script type="text/javascript" src="http://www.siwutang.vip/swtmanager/backend/web/statics/js/jquery-1.4.2.min.js"></script>
<style>

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
.zitismall{
  font-size: 12px;
  font-family: 微软雅黑;
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
            height: 10%;  
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
        .img{
          width: 29px;
          height:29px;
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
  width:100%;
  margin: auto;
 
}
</style>

<div class="main ziti">
<div class=nei>
<div class="juli"></div>
  <div class="kuan ziti"><a href="http://www.siwutang.vip/swtmanager/backend/web/index.php?r=kecheng/main">课程管理</a></div>


  <div class="center">     
      <div class="juli"></div>
    
    <div class="kuan">
            <table border="1" width=100%  style="background-color: white;">
              <thead>
                <tr>             
                   <th>课程名</th>
                   <th>课程类别</th>
                               
                   <th>课程缩略图</th>
            
                   <th>操作</th>
                </tr>
              </thead>
              <?php 
                while($teach=mysqli_fetch_array($kecheng)){
                    $kname=$teach['kname'];
                    $kleibie=$teach['leibie'];
                    $turl=$teach['img'];
                    $id=$teach['id'];
              ?>
              <tr class="zitismall">

                <td><?php echo $kname?></td>
                <td><?php echo $kleibie?></td>               
             
                <td><img class="img" src=<?php echo $turl?> /></td>

             
                <td><a href="http://www.siwutang.vip/swtmanager/backend/web/index.php?r=kecheng/xiu&id=<?php echo $id;?>">修改&nbsp;&nbsp;</a> </td>
             <?php }?>
              </tr>
            </table>
            <p></p>
              <div class="center-in-center">
        <?php
          if($pageNow>1){
    $prePage = $pageNow-1;
    echo "<a href='http://www.siwutang.vip/swtmanager/backend/web/index.php?r=kecheng/main&id=$prePage'>上一页</a> ";
    echo "&nbsp;&nbsp;&nbsp;";
  }
  if($pageNow<$pageCount){
    $nextPage = $pageNow+1;
    echo "<a href='http://www.siwutang.vip/swtmanager/backend/web/index.php?r=kecheng/main&id=$nextPage'>下一页</a> ";
    echo "&nbsp;&nbsp;&nbsp;";
    echo "当前第{$pageNow}页/共{$pageCount}页";
  }
  echo "<br/><br/>";
        ?>
     
        </div>
        </div>
    </div>
</div>
</div>