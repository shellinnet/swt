<?php
use yii\helpers\Html;
header("Content-Type: text/html;charset=utf-8");
$conn=mysqli_connect('hdm121115553.my3w.com','hdm121115553','swt62899308swt','hdm121115553_db');
  if($conn->connect_errno){
      die('连接失败'.$conn->connect_errno);
  }
  $conn->set_charset('utf8');


//分页显示

  $pageSize = 9;   //每页显示的数量
  $rowCount = 0;   //要从数据库中获取
  $pageNow = 1;    //当前显示第几页
   


  // $sql2 = "select * from student order by date desc limit $pre,$pageSize ";
  // $res2 = mysqli_query($conn,$sql2);


//搜索功能
$submit=isset($_POST["submit2"])?$_POST["submit2"]:'';
$name=isset($_POST["name"])?$_POST["name"]:'';
$week=isset($_POST["week"])?$_POST["week"]:'';

if($submit<>''){
  if($week=='ALL'){
  if (!empty($_GET['id'])){
    $pageNow = $_GET['id'];
  }
     //获取总记录
 $sql1 = "SELECT count(a.id) FROM admin a,kecheng b,ke c where b.teacherid=a.id and b.close=0  and b.keid=c.id and a.m_name like '%".$name."%' order by b.id desc,b.zq ";
  $res1 = mysqli_query($conn,$sql1);

   if($row1=mysqli_fetch_row($res1)){
    $rowCount = $row1[0];  
  }else{
     echo "no";
  }
  //计算共有多少页，ceil取进1
  $pageCount = ceil(($rowCount/$pageSize));
  $pre = ($pageNow-1)*$pageSize;

  $xinxi="SELECT a.m_name,a.m_tel,b.keid,c.kname,c.tiao,b.zq ,b.duan,a.id FROM admin a,kecheng b,ke c where b.teacherid=a.id and b.close=0  and b.keid=c.id and a.m_name like '%".$name."%' order by b.id desc,b.zq limit $pre,$pageSize";
    $mesage=mysqli_query($conn,$xinxi);


 }else{
     if (!empty($_GET['id'])){
    $pageNow = $_GET['id'];
  }
       //获取总记录
 $sql1 = "SELECT count(a.id) FROM admin a,kecheng b,ke c where b.teacherid=a.id and b.close=0  and b.keid=c.id and a.m_name like '%".$name."%' and b.zq='".$week."' order by b.id desc,b.zq ";
  $res1 = mysqli_query($conn,$sql1);

   if($row1=mysqli_fetch_row($res1)){
    $rowCount = $row1[0];  
  }else{
     echo "no";
  }
    //计算共有多少页，ceil取进1
  $pageCount = ceil(($rowCount/$pageSize));
  $pre = ($pageNow-1)*$pageSize;
   $xinxi="SELECT a.m_name,a.m_tel,b.keid,c.kname,c.tiao,b.zq ,b.duan,a.id FROM admin a,kecheng b,ke c where b.teacherid=a.id and b.close=0  and b.keid=c.id and a.m_name like '%".$name."%' and b.zq='".$week."' order by b.id desc,b.zq limit $pre,$pageSize";
    $mesage=mysqli_query($conn,$xinxi);


 }


}else{
if (!empty($_GET['id'])){
    $pageNow = $_GET['id'];


  }
 echo $week;

 if (!empty($_GET['name'])){
    $name = $_GET['name'];

    if($_GET['week']=='ALL' || empty($_GET['week'])){


         //获取总记录
 $sql1 = "SELECT count(a.id) FROM admin a,kecheng b,ke c where b.teacherid=a.id and b.close=0  and b.keid=c.id and a.m_name like '%".$name."%' order by b.id desc,b.zq ";
  $res1 = mysqli_query($conn,$sql1);

   if($row1=mysqli_fetch_row($res1)){
    $rowCount = $row1[0];  
  }else{
     echo "no";
  }
  //计算共有多少页，ceil取进1
  $pageCount = ceil(($rowCount/$pageSize));
  $pre = ($pageNow-1)*$pageSize;

  $xinxi="SELECT a.m_name,a.m_tel,b.keid,c.kname,c.tiao,b.zq ,b.duan,a.id FROM admin a,kecheng b,ke c where b.teacherid=a.id and b.close=0  and b.keid=c.id and a.m_name like '%".$name."%' order by b.id desc,b.zq limit $pre,$pageSize";
    $mesage=mysqli_query($conn,$xinxi);
  }else{

    $week=$_GET['week'];
            //获取总记录
 $sql1 = "SELECT count(a.id) FROM admin a,kecheng b,ke c where b.teacherid=a.id and b.close=0  and b.keid=c.id and a.m_name like '%".$name."%' and b.zq='".$week."' order by b.id desc,b.zq ";
  $res1 = mysqli_query($conn,$sql1);

   if($row1=mysqli_fetch_row($res1)){
    $rowCount = $row1[0];  
  }else{
     echo "no";
  }
  //计算共有多少页，ceil取进1
  $pageCount = ceil(($rowCount/$pageSize));
  $pre = ($pageNow-1)*$pageSize;

  $xinxi="SELECT a.m_name,a.m_tel,b.keid,c.kname,c.tiao,b.zq ,b.duan,a.id FROM admin a,kecheng b,ke c where b.teacherid=a.id and b.close=0  and b.keid=c.id and a.m_name like '%".$name."%' and b.zq='".$week."' order by b.id desc,b.zq limit $pre,$pageSize";
    $mesage=mysqli_query($conn,$xinxi);
  }

  }else{


    //获取总记录
 $sql1 = "SELECT count(a.id) FROM admin a,kecheng b,ke c where b.teacherid=a.id and b.close=0  and b.keid=c.id  order by b.id desc,b.zq ";
  $res1 = mysqli_query($conn,$sql1);

   if($row1=mysqli_fetch_row($res1)){
    $rowCount = $row1[0];
 
  
  }else{
     echo "no";
  }


//计算共有多少页，ceil取进1
  $pageCount = ceil(($rowCount/$pageSize));

  $pre = ($pageNow-1)*$pageSize;


    $xinxi="SELECT a.m_name,a.m_tel,b.keid,c.kname,c.tiao,b.zq ,b.duan,a.id FROM admin a,kecheng b,ke c where b.teacherid=a.id and b.close=0  and b.keid=c.id  order by b.id desc,b.zq limit $pre,$pageSize";
    $mesage=mysqli_query($conn,$xinxi);
}
  }
?>



<script type="text/javascript" src="http://www.siwutang.vip/swtmanager/backend/web/statics/js/jquery-1.4.2.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){ 
   $("#button_text1").click(function(){  
                var result1 = $("#input_text1").val();

            
               var names='<?php echo "$name";?>';
                
                var keeks='<?php echo "$week";?>';


                url='http://www.siwutang.vip/swtmanager/backend/teacherlist.php?name=';  
                uu='&week=';
                ff='&id=';
                 location.href=url+names+uu+weeks+ff+result1;
                 console.log(location.href);
            }); 
  });
 function openWindow(url){  
       window.open(url,"openWindow","height=200,width=1000,menubar=no,titlebar=no,toolbar=no,location=no,left=200,top=200,status=no");  
   }
</script>
<style>
body{
  font-size: 12px;
  font-family: 微软雅黑;
  
}
a{
  text-decoration:none;
}
.container{
    width:1120px;
    height:150px;
    border:1px #8A8A8A solid;
    background-color:#fff;
    margin-left:15px;
    border-radius:5px;
   }
.ziti{
  font-size: 14px;
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
.zi{
  font-size: 12px;
  font-family: 微软雅黑;
}
.button{

background:#7CC7EA;/*背景色*/
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
              font-size: 14px;
             font-family: 微软雅黑;
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
<div class="left">&nbsp;</div>
  <div class="leftbig">

    
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
              <tr class="zi">

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
               
                <td><a href="javascript:void(0)" target="_parent"  onclick = "openWindow('http://www.siwutang.vip/teacherxiang.php?id=<?php echo $tid;?>&week=<?php echo $tezhouqi?>&duan=<?php echo $teduan?>&keid=<?php echo $tkeid?>')"><?php echo "详情"?>&nbsp;</a> </td>
             <?php }?>
              </tr>
            </table>
                <p></p>
        <div class="center-in-center">
   
          <div style="width: 1000px;height: 30px;text-align: right;float:left; display: inline;">
        <?php
          if($pageNow>1){
    $prePage = $pageNow-1;
    echo "<a href='http://www.siwutang.vip/swtmanager/backend/teacherlist.php?name=$name&week=$week&id=$prePage'>上一页</a> ";
    echo "&nbsp;&nbsp;&nbsp;";
  }
  if($pageNow<$pageCount){
    $nextPage = $pageNow+1;
    echo "<a href='http://www.siwutang.vip/swtmanager/backend/teacherlist.php?name=$name&week=$week&id=$nextPage'>下一页</a> ";
    echo "&nbsp;&nbsp;&nbsp;";
    echo "当前第{$pageNow}页/共{$pageCount}页";
    echo "&nbsp;";
    echo '<input type="text" class="jump_text" name="jump" id="input_text1">&nbsp;<button id="button_text1">跳转</button>  ';


  }
  echo "<br/><br/>";
        ?>
        </div>
     
        </div>
        </div>

  </div>
       
</div>