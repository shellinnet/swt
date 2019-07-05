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
 $sql1 = "select count(id) from tongzhi";
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


//搜索功能
$submit=isset($_POST["submit"])?$_POST["submit"]:'';
$date=isset($_POST["date"])?$_POST["date"]:'';
if($submit<>''){
      $tz="select * from tongzhi where created_time='".$date."' order by id desc limit $pre,$pageSize";
      $tongzhi=mysqli_query($conn,$tz);
}else{
  $tz="select * from tongzhi order by id desc limit $pre,$pageSize";
  $tongzhi=mysqli_query($conn,$tz);
}


//通知添加
$submitadd=isset($_POST["submitadd"])?$_POST["submitadd"]:'';
$text=isset($_POST["text"])?$_POST["text"]:'';
$begintime=isset($_POST["begintime"])?$_POST["begintime"]:'';
$endtime=isset($_POST["endtime"])?$_POST["endtime"]:'';
$content=isset($_POST["content"])?$_POST["content"]:'';
if($submitadd<>''){
  $add="INSERT INTO tongzhi(biaoti,created_time,neirong,endtime) values('".$text."','".$begintime."','".$content."','".$endtime."')";
  $addtongzhi=mysqli_query($conn,$add);

  echo '<script language="JavaScript">;alert("通知添加成功！");location.href="http://www.siwutang.vip/swtmanager/backend/web/index.php?r=tongzhi/main";</script>';

}

//通知修改
$submitxiu=isset($_POST["submitxiu"])?$_POST["submitxiu"]:'';
$textxiu=isset($_POST["textxiu"])?$_POST["textxiu"]:'';
$begintime=isset($_POST["begintime"])?$_POST["begintime"]:'';
$endtime=isset($_POST["endtime"])?$_POST["endtime"]:'';
$contentxiu=isset($_POST["contentxiu"])?$_POST["contentxiu"]:'';
$idxiu=isset($_POST["idxiu"])?$_POST["idxiu"]:'';
if($submitxiu<>''){
  $xiu="UPDATE tongzhi set biaoti='".$textxiu."',created_time='".$begintime."',neirong='".$contentxiu."',endtime='".$endtime."' where id='".$idxiu."'";
  $xiugai=mysqli_query($conn,$xiu);

  echo '<script language="JavaScript">;alert("通知修改成功！");location.href="http://www.siwutang.vip/swtmanager/backend/web/index.php?r=tongzhi/main";</script>';

}

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
.zikuan{
  width: 120px;
}
.kuan2{
    width:73%;
  height:30px;
 margin: auto;
}
.juli3{
          width:500px;
          height: 40px;
      }

</style>


<div class="main">
<div class="juli"></div>
    <div class="left">&nbsp;</div>
     <div class="kuan ziti"><a href="http://www.siwutang.vip/swtmanager/backend/web/index.php?r=tongzhi/main">小程序通知内容管理</a></div>

    <div class="kuan2">
    <div class="left">&nbsp;</div>
     <div class="juli"></div>
   
       <form action="/swtmanager/backend/web/index.php?r=tongzhi/main" method="post">

          <div class="leftcenter"><input id='date' type="date" name="date" /></div>
          <div class="left" style="width: 50px;height: 50px;"></div>
          <div class="leftmiddle"> <input type="submit" name="submit" value="搜索" class="button" /></div>
       </form>

      <div class="right" > <a   href="http://www.siwutang.vip/swtmanager/backend/web/index.php?r=tongzhi/addtongzhi"> 添加通知信息</a></div>
    </div>
  <div class="juli3"></div>
    <div class="kuan2">
            <table border="1" width="1100" style="background-color: white;">
              <thead>
                <tr>             
                   <th>发布时间</th>
                   <th>标题</th>
                   <th>简介</th>                 
                    <th>操作</th>
                </tr>
              </thead>
              <?php 
                while($teach=mysqli_fetch_array($tongzhi)){
                    $ktime=$teach['created_time'];
                    $kbiaoti=$teach['biaoti'];
                    $kneirong=$teach['neirong'];
                    $kid=$teach['id'];
                    
              ?>
              <tr>

                <td><?php echo $ktime?></td>
                <td><?php echo $kbiaoti?></td>
                <td><?php echo $kneirong?></td>
           
                <td><a href="http://www.siwutang.vip/swtmanager/backend/web/index.php?r=tongzhi/xiu&id=<?php echo $kid;?>">修改</a> &nbsp;&nbsp; /&nbsp;&nbsp;<a  href="http://www.siwutang.vip/swtmanager/backend/web/index.php?r=tongzhi/del&id=<?php echo $kid;?>"> 删除</a></td>
             <?php }?>
              </tr>
            </table>
            <p></p>
        <div class="center-in-center">
        <?php
          if($pageNow>1){
    $prePage = $pageNow-1;
    echo "<a href='http://www.siwutang.vip/swtmanager/backend/web/index.php?r=tongzhi/main&id=$prePage'>上一页</a> ";
    echo "&nbsp;&nbsp;&nbsp;";
  }
  if($pageNow<$pageCount){
    $nextPage = $pageNow+1;
    echo "<a href='http://www.siwutang.vip/swtmanager/backend/web/index.php?r=tongzhi/main&id=$nextPage'>下一页</a> ";
    echo "&nbsp;&nbsp;&nbsp;";
    echo "当前第{$pageNow}页/共{$pageCount}页";
  }
  echo "<br/><br/>";
        ?>
     
        </div>
        </div>



</div>