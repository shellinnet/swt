<?php
use yii\helpers\Html;
$conn=mysqli_connect('hdm121115553.my3w.com','hdm121115553','swt62899308swt','hdm121115553_db');
  if($conn->connect_errno){
      die('连接失败'.$conn->connect_errno);
  }
  $conn->set_charset('utf8');
  $createdtime=date("Y-m-d",time()); //获取今天日期

$jb="select a.*,b.m_name,c.kname from student a,admin b,ke c where a.teacherid=b.id and a.knameid=c.id  ";
  $ls=mysqli_query($conn,$jb);
  while($teach=mysqli_fetch_array($ls)){
       $student=$teach['sname'];
       $tel=$teach['mobile'];
       $weixin=$teach['nickname'];
       $date=$teach['date'];
       $week=$teach['week'];
       $duan=$teach['duan'];
       $kname=$teach['kname'];
       $m_name=$teach['m_name'];
       $zkeshi=$teach['zkeshi'];
       $syks=$teach['syks'];
       $end=$teach['end']; 
       $id=$teach['id']; 
       $oktime=$teach['oktime']; 
       $close=$teach['close']; //课程是否关闭 
       $knameid=$teach['knameid'];
       $teacherid=$teach['teacherid'];

 $allready=$zkeshi-$syks;
  //查询该学生课程是否结束

  if($oktime<$createdtime || $allready==$zkeshi){
     $end=1;
  }else{
    $end=0;
  }
 
$up="UPDATE student SET end='".$end."' WHERE sname='".$student."' and knameid='".$knameid."' and teacherid='".$teacherid."'";
$ups=mysqli_query($conn,$up);
  }
//分页显示

  $pageSize = 8;   //每页显示的数量
  $rowCount = 0;   //要从数据库中获取
  $pageNow = 1;    //当前显示第几页
   


//搜索功能
$submit=isset($_POST["submit2"])?$_POST["submit2"]:'';
$name=isset($_POST["name"])?$_POST["name"]:'';

$submit2=isset($_POST["submit3"])?$_POST["submit3"]:'';
$tel=isset($_POST["tel"])?$_POST["tel"]:'';

if($submit<>''){

  if($name<>''){
     if (!empty($_GET['id'])){
    $pageNow = $_GET['id'];
  }
//获取总记录
 $sql1 = "select count(a.sname) from student a,admin b,ke c where a.teacherid=b.id and a.knameid=c.id and a.sname like '%".$name."%'  and a.close='0' order by a.created_at desc";

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

    $xinxi="select a.id,a.date,a.created_at,a.week,a.sname,a.mobile,b.m_name,c.kname,a.close,a.end from student a,admin b,ke c where a.teacherid=b.id and a.knameid=c.id and a.sname like '%".$name."%'  order by a.created_at desc limit $pre,$pageSize";
    $mesage=mysqli_query($conn,$xinxi);
  }elseif($name=='' && $tel==''){

      if (!empty($_GET['id'])){
    $pageNow = $_GET['id'];
  }
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

    $xinxi="select a.id,a.date,a.sname,a.created_at,a.week,a.mobile,b.m_name,c.kname,a.close,a.end from student a,admin b,ke c where a.teacherid=b.id and a.knameid=c.id   order by a.id desc limit $pre,$pageSize";
    $mesage=mysqli_query($conn,$xinxi);
  }else{
      if (!empty($_GET['id'])){
    $pageNow = $_GET['id'];
  }
//获取总记录
 $sql1 = "select count(a.mobile) from student a,admin b,ke c where a.teacherid=b.id and a.knameid=c.id and a.mobile like '%".$tel."%'  and a.close='0' order by a.created_at desc";

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

    $xinxi="select a.id,a.date,a.created_at,a.week,a.sname,a.mobile,b.m_name,c.kname,a.close,a.end from student a,admin b,ke c where a.teacherid=b.id and a.knameid=c.id and a.mobile like '%".$tel."%' and   order by a.created_at desc limit $pre,$pageSize";
    $mesage=mysqli_query($conn,$xinxi);

  }
}elseif ($submit2<>'') {
  if($tel<>''){


   if (!empty($_GET['id'])){
    $pageNow = $_GET['id'];
  }
//获取总记录
 $sql1 = "select count(a.mobile) from student a,admin b,ke c where a.teacherid=b.id and a.knameid=c.id and a.mobile like '%".$tel."%'  and a.close='0' order by a.created_at desc";

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

    $xinxi="select a.id,a.date,a.created_at,a.week,a.sname,a.mobile,b.m_name,c.kname,a.close,a.end from student a,admin b,ke c where a.teacherid=b.id and a.knameid=c.id and a.mobile like '%".$tel."%' and   order by a.created_at desc limit $pre,$pageSize";
    $mesage=mysqli_query($conn,$xinxi);

  }else{
       if (!empty($_GET['id'])){
    $pageNow = $_GET['id'];
  }
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

    $xinxi="select a.id,a.date,a.sname,a.created_at,a.week,a.mobile,b.m_name,c.kname,a.close,a.end from student a,admin b,ke c where a.teacherid=b.id and a.knameid=c.id   order by a.id desc limit $pre,$pageSize";
    $mesage=mysqli_query($conn,$xinxi);

  }

        //如果有pageNow就使用，没有就默认第一页。
 
}elseif($name=='' && $tel==''){
   //如果有pageNow就使用，没有就默认第一页。
  
  if (!empty($_GET['id'])){
    $pageNow = $_GET['id'];
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

$xinxi="select a.id,a.date,a.sname,a.created_at,a.week,a.mobile,b.m_name,c.kname,a.close,a.end from student a,admin b,ke c where a.teacherid=b.id and a.knameid=c.id   order by a.created_at desc limit $pre,$pageSize";
$mesage=mysqli_query($conn,$xinxi);
}

?>

<script type="text/javascript" src="http://www.siwutang.vip/swtmanager/backend/web/statics/js/jquery-1.4.2.min.js"></script>
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
       window.open(url,"openWindow","height=200,width='100%',menubar=no,titlebar=no,toolbar=no,location=no,left=200,top=200,status=no");
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

.zi{
  font-size: 12px;
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


.kuan{
  width:900px;
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

        <div class="kuan">
            <table border="1" width="900" style="background-color: white;">
              <thead>
                <tr>   
                   <th>注册时间</th>          
                   <th>开始上课时间</th>
                   <th>周期</th>
                   <th>学生名</th>
                   <th>手机号</th>
                   <th>上课课程</th>
                   <th>上课老师</th>
                   <th>课程是否结束</th>
                   <th>课程是否关闭</th>
             
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
                    $zclose=$teach['close'];
                    $zend=$teach['end'];
                    $sid=$teach['id'];  //学员id
              ?>
              <tr class="zi">
                <td><?php echo $zctime?></td>
                <td><?php echo $ldate?></td>
                <td><?php echo $sweek?></td>
                <td><?php echo $sname?></td>
                <td><?php echo $tetel?></td>
                <td><?php echo $kname?></td>
                <td><?php echo $m_name?></td>
                <td><?php if($zend==0){echo "否";}else{echo "是";} ?></td>
                <td><?php if($zclose==0){echo "否";}else{echo "是";} ?></td>
           
                <td><a href="javascript:void(0)"  target="_parent"  onclick = "openWindow('http://www.siwutang.vip/studentxiang.php?id=<?php echo $sid;?>')"><?php echo "详情"?></a>&nbsp;　</td>
             <?php }?>
              </tr>
            </table>
            <p></p>
        <div class="center-in-center">
 
          <div style="width: 100%;height: 30px;text-align: right;float:left; display: inline;">
        <?php
          if($pageNow>1){
    $prePage = $pageNow-1;
    echo "<a href='http://www.siwutang.vip/swtmanager/backend/studentlist.php?id=$prePage'>上一页</a> ";
    echo "&nbsp;&nbsp;&nbsp;";
  }
  if($pageNow<$pageCount){
    $nextPage = $pageNow+1;
    echo "<a href='http://www.siwutang.vip/swtmanager/backend/studentlist.php?id=$nextPage'>下一页</a> ";
    echo "&nbsp;&nbsp;&nbsp;";
    echo "当前第{$pageNow}页/共{$pageCount}页";
    echo "&nbsp;";
    echo '<input type="text" class="jump_text" name="jump" id="input_text1">&nbsp;<button id="button_text1">跳转</button>  ';
  }
  echo "<br/><br/>";
        ?>
        </div>
     
        </div>

        <div class="kuan"></div>
  </div>
</div>





