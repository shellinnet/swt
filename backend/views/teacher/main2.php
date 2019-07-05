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
   

//搜索功能
$submit=isset($_POST["submit2"])?$_POST["submit2"]:'';
$names=isset($_POST["name"])?$_POST["name"]:'';
$week=isset($_POST["week"])?$_POST["week"]:'ALL';

if ($submit==''){
    $names=$_GET['name'];
    $week=$_GET['week'];
}

$name=$names;


 if($week=='ALL'){
    //获取总记录
 $sql1 = "SELECT a.m_name,a.m_tel,b.keid,c.kname,c.tiao,b.zq ,b.duan,a.id FROM admin a,kecheng b,ke c where b.teacherid=a.id and b.close=0  and b.keid=c.id and a.m_name like '%".$name."%'  order by b.id desc,b.zq ";
  $res1 = mysqli_query($conn,$sql1);
  $row1=mysqli_num_rows($res1);
    $rowCount = $row1;
 

//计算共有多少页，ceil取进1
  $pageCount = ceil(($rowCount/$pageSize));

  $pre = ($pageNow-1)*$pageSize;

  if (!empty($_GET['id'])){

    $pageNow = $_GET['id'];
    if($pageNow>$pageCount){
      echo '<script language="JavaScript"> alert("输入页码错误！");history.back();</script>';
    }
  }

    $xinxi="SELECT a.m_name,a.m_tel,b.keid,c.kname,c.tiao,b.zq ,b.duan,a.id FROM admin a,kecheng b,ke c where b.teacherid=a.id and b.close=0  and b.keid=c.id and a.m_name like '%".$name."%' order by b.id desc,b.zq limit $pre,$pageSize";
    $mesage=mysqli_query($conn,$xinxi);
   
 }else{
    //获取总记录
 $sql1 = "SELECT a.m_name,a.m_tel,b.keid,c.kname,c.tiao,b.zq ,b.duan,a.id FROM admin a,kecheng b,ke c where b.teacherid=a.id and b.close=0  and b.keid=c.id and a.m_name like '%".$name."%' and b.zq='".$week."' order by b.id desc,b.zq";
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

    $xinxi="SELECT a.m_name,a.m_tel,b.keid,c.kname,c.tiao,b.zq ,b.duan,a.id FROM admin a,kecheng b,ke c where b.teacherid=a.id and b.close=0  and b.keid=c.id and a.m_name like '%".$name."%' and b.zq='".$week."' order by b.id desc,b.zq limit $pre,$pageSize";
    $mesage=mysqli_query($conn,$xinxi);
 }





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
                url='http://www.siwutang.vip/swtmanager/backend/web/index.php?r=teacher/main2&id=';  
                other='&name=<?php echo $name?>&week=<?php echo $week?>';
                location.href=url+result1+other; 
                 // alert(url+result1+other);
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
            <div class="leftmiddle">&nbsp;</div>
            <div class="leftmiddle" ></div>
            <form action="/swtmanager/backend/web/index.php?r=teacher/main2" method="post">
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
    <div class="juli"></div>
        <div class="kuan">
            <table border="1" width="1000" style="background-color: white;">
              <thead>
                <tr>             
                   <th>老师姓名</th>
                   <th>手机号</th>
                   <th>课程</th>
                   <th>周期</th>
                   <th>时间段</th>
                   <th>是否接受调课</th>
          
                   <th>查看</th>
                </tr>
              </thead>
              <?php 
                while($teach=mysqli_fetch_array($mesage)){
                    $laoshi=$teach['m_name'];
                    $tetel=$teach['m_tel'];
                    $tekename=$teach['kname'];
                    $tetiao=$teach['tiao'];
                    $tezhouqi=$teach['zq'];
                    $teduan=$teach['duan'];
                    $tid=$teach['id'];
                    $tkeid=$teach['keid'];
              ?>
              <tr>

                <td><?php echo $laoshi?></td>
                <td><?php echo $tetel?></td>
                <td><?php echo $tekename?></td>
                <td><?php echo $tezhouqi?></td>
                <td><?php echo $teduan?></td>
                <td><?php 
                    if ($tetiao==0){
                       echo "是";
                     }else{
                        echo "否";
                     }
                  ?></td>
               
                <td><a href="http://www.siwutang.vip/swtmanager/backend/web/index.php?r=teacher/xiang&id=<?php echo $tid;?>&week=<?php echo $tezhouqi?>&duan=<?php echo $teduan?>&keid=<?php echo $tkeid?>"><?php echo "详情"?></a></td>
             <?php }?>
              </tr>
            </table>
                <p></p>
        <div class="center-in-center">
        <?php
          if($pageNow>1){
    $prePage = $pageNow-1;
    echo "<a href='http://www.siwutang.vip/swtmanager/backend/web/index.php?r=teacher/main2&id=$prePage&name=$name&week=$week'>上一页</a> ";
    echo "&nbsp;&nbsp;&nbsp;";
  }
  if($pageNow<$pageCount){
    $nextPage = $pageNow+1;
    echo "<a href='http://www.siwutang.vip/swtmanager/backend/web/index.php?r=teacher/main2&id=$nextPage&name=$name&week=$week'>下一页</a> ";
    echo "&nbsp;&nbsp;&nbsp;";
    echo "当前第{$pageNow}页/共{$pageCount}页";
     echo '<input type="text" class="jump_text" name="jump" id="input_text1">&nbsp;<button id="button_text1">跳转</button>  ';
  }
  echo "<br/><br/>";
        ?>
     
        </div>
        </div>
    <div class="julibig"></div>
        <div class="kuan"></div>
  </div>
</div>



