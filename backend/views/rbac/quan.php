<?php 
ini_set("error_reporting","E_ALL & ~E_NOTICE");  
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
$quan="SELECT b.id,b.username,b.m_name,a.item_name FROM auth_assignment a,admin b where a.user_id=b.id and a.type=1 order by a.item_name desc";
$quanxs=mysqli_query($conn,$quan);
  if($row1=mysqli_num_rows($quanxs)){
    $rowCount = $row1;

    echo "<br>";
  }else{
     echo "no";
  }

//计算共有多少页，ceil取进1
  $pageCount = ceil(($rowCount/$pageSize));
   
  $pre = ($pageNow-1)*$pageSize;
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

<div class="main">
 <div class="juli"></div>
   <div class="kuan ziti"><a href="http://www.siwutang.vip/swtmanager/backend/web/index.php?r=rbac/quan">人员权限管理</a></div>
   <div class="juli"></div> 
<div class="kuan">
<div class="left"></div>
    <table border="1" width="1000" style="background-color: white;">
              <thead>
                <tr>
                   <th>登录名</th>
                   <th>姓名</th>
                 
                   <th>基本权限名</th>                 
                    <th>操作</th>
                </tr>
              </thead>
              <?php 
                while($teach=mysqli_fetch_array($quanxs)){
                    $kname=$teach['m_name'];
                    $kmobile=$teach['username'];
                    $kbeizhu=$teach['item_name'];
                    $kid=$teach['id'];                   
              ?>
              <tr>
                <td><?php echo $kmobile?></td>
                <td><?php echo $kname?></td>
                <td><?php echo $kbeizhu?> </td>
           
                <td><a href="http://www.siwutang.vip/swtmanager/backend/web/index.php?r=rbac/xiugai&id=<?php echo $kid;?>">修改</a> &nbsp;&nbsp; /&nbsp;&nbsp;  <button onclick="del()"> 删除 </button></td>
             <?php }?>
              </tr>
    </table>
            <p></p>
    <div class="center-in-center">
        <?php
          if($pageNow>1){
    $prePage = $pageNow-1;
    echo "<a href='http://www.siwutang.vip/swtmanager/backend/web/index.php?r=rbac/quan&id=$prePage'>上一页</a> ";
    echo "&nbsp;&nbsp;&nbsp;";
  }
  if($pageNow<$pageCount){
    $nextPage = $pageNow+1;
    echo "<a href='http://www.siwutang.vip/swtmanager/backend/web/index.php?r=rbac/quan&id=$nextPage'>下一页</a> ";
    echo "&nbsp;&nbsp;&nbsp;";
    echo "当前第{$pageNow}页/共{$pageCount}页";
  }
  echo "<br/><br/>";
        ?>
     
        </div>
        </div>
</div>
<script >
function del(){
if(confirm('确定要删除吗？')){
   
      location.href='http://www.siwutang.vip/swtmanager/backend/web/index.php?r=rbac/del&id=<?php echo $kid;?>'
   
    return true; 
  }else{
    location.href='http://www.siwutang.vip/swtmanager/backend/web/index.php?r=rbac/quan'
    alert('不删除！');
    return false; 
  }
}
  </script>
