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
 $sql1 = "select count(id) from admin where leibie='教务' ";
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
$jname=isset($_POST["jname"])?$_POST["jname"]:'';
if($submit<>''){
      $tz="select * from admin where m_name='".$jname."' and leibie='教务' order by id desc";
      $tongzhi=mysqli_query($conn,$tz);
}else{
  $tz="select * from admin where leibie='教务' order by id desc";
  $tongzhi=mysqli_query($conn,$tz);
}

$submitadd=isset($_POST["submitadd"])?$_POST["submitadd"]:'';
$name=isset($_POST["name"])?$_POST["name"]:'';
$time=isset($_POST["time"])?$_POST["time"]:'';
$mobile=isset($_POST["mobile"])?$_POST["mobile"]:'';
$username=isset($_POST["username"])?$_POST["username"]:'';
$password=isset($_POST["password"])?$_POST["password"]:'';

$now=time();
if($submitadd<>''){
  $add="INSERT INTO admin(m_name,m_tel,username,password,created_at,leibie) values('".$name."','".$mobile."','".$mobile."','".$password."','".$time."','教务')";
  $addtongzhi=mysqli_query($conn,$add);
  
}

$cx="select id from admin where m_name='".$name."' and m_tel='".$mobile."' order by id desc limit 1";
$cxs=mysqli_query($conn,$cx);
while($chaxun=mysqli_fetch_array($cxs)){
     $chaid=$chaxun['id'];
     $quan="INSERT INTO auth_assignment(item_name,user_id,created_at,type) VALUES('教务','".$chaid."','".$now."','1')";
      $quans=mysqli_query($conn,$quan);

  echo '<script language="JavaScript">;alert("教务添加成功！");location.href="http://www.siwutang.vip/swtmanager/backend/web/index.php?r=admin/main";</script>';
}

//修改
$submitxiu=isset($_POST["submitxiu"])?$_POST["submitxiu"]:'';
$chname=isset($_POST["chname"])?$_POST["chname"]:'';
$timexiu=isset($_POST["timexiu"])?$_POST["timexiu"]:'';
$chusername=isset($_POST["chusername"])?$_POST["chusername"]:'';
$chmobile=isset($_POST["chmobile"])?$_POST["chmobile"]:'';
$chpassword=isset($_POST["chpassword"])?$_POST["chpassword"]:'';
$idxiu=isset($_POST["idxiu"])?$_POST["idxiu"]:'';
if($submitxiu<>''){
  $xiu="UPDATE admin set m_name='".$chname."',updated_at='".$timexiu."',username='".$chusername."',m_tel='".$chmobile."' ,password='".$chpassword."' where id='".$idxiu."'";
  $xiugai=mysqli_query($conn,$xiu);
  echo '<script language="JavaScript">;alert("教务修改成功！");location.href="http://www.siwutang.vip/swtmanager/backend/web/index.php?r=admin/main";</script>';

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
.juli3{
          width:500px;
          height: 40px;
      }
    
</style>
<div class="main">
    <div class="left">&nbsp;</div>

    <div class="kuan">
     <div class="juli"></div>
       <div class="left zikuan" ><a  href="http://www.siwutang.vip/swtmanager/backend/web/index.php?r=admin/main"> 教务人员信息</a></div>
    </div>
           <div class="kuan">
           <div class="juli3"></div>
       <div style="width: 295px;height: 50px;float:left;display: inline;"></div>
       <form action="/swtmanager/backend/web/index.php?r=admin/main" method="post">
          <div class="leftcenter"><input  type="text" name="jname" placeholder="请输入教务人员姓名"/></div>
          <div class="left" style="width: 150px;height: 50px;"></div>
          <div class="leftmiddle"> <input type="submit" name="submit" value="搜索" class="button" /></div>
       </form>
       <div class="right">&nbsp;</div>
       <a  href="http://www.siwutang.vip/swtmanager/backend/web/index.php?r=admin/addjiaowu"> 添加教务人员</a>
    </div>
  
    <div class="kuan">

            <table border="1" width="1000" style="background-color: white;">
              <thead>
                <tr>

                   <th>姓名</th>
                   <th>手机</th>
                   <th>备注</th>                 
                    <th>操作</th>
                </tr>
              </thead>
              <?php 
                while($teach=mysqli_fetch_array($tongzhi)){
                    $kname=$teach['m_name'];
                     $kmobile=$teach['m_tel'];
                    $kbeizhu=$teach['m_beizhu'];
                    $kid=$teach['id'];
                    
              ?>
              <tr>

                <td><?php echo $kname?></td>
                <td><?php echo $kmobile?> </td>
                <td><?php echo $kbeizhu?></td>
           
                <td><a href="http://www.siwutang.vip/swtmanager/backend/web/index.php?r=admin/xiu&id=<?php echo $kid;?>">修改</a> &nbsp;&nbsp; /&nbsp;&nbsp;  <button onclick="del()"> 删除 </button></td>
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
<script >
function del(){
if(confirm('确定要删除吗？')){
   
      location.href='http://www.siwutang.vip/swtmanager/backend/web/index.php?r=admin/del&id=<?php echo $kid;?>'
   
    return true; 
  }else{
    location.href='http://www.siwutang.vip/swtmanager/backend/web/index.php?r=admin/main'
    alert('不删除！');
    return false; 
  }
}
  </script>