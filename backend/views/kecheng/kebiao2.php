<?php 
use yii\helpers\Html;

$lj='/data/home/hyu4458630001/htdocs/swtmanager';
echo $lj;
require $lj. '/vendor/PHPExcel/PHPExcel.php';
require $lj. '/vendor/PHPExcel/PHPExcel/IOFactory.php';
require $lj. '/vendor/PHPExcel/PHPExcel/Reader/Excel5.php';
$conn=mysqli_connect('hdm121115553.my3w.com','hdm121115553','swt62899308swt','hdm121115553_db');
  if($conn->connect_errno){
      die('连接失败'.$conn->connect_errno);
  }
  $conn->set_charset('utf8');

  //课程
$kc="SELECT id,kname FROM ke where tiao='0' ";
$keke=mysqli_query($conn,$kc);

//搜索功能
$submit=isset($_POST["submit"])?$_POST["submit"]:'';

$ktname=isset($_POST["kname"])?$_POST["kname"]:'';  //kid
$lname=isset($_POST["tname"])?$_POST["tname"]:'';

if ($submit==''){
    $ktname=$_GET['ktname'];
    $lname=$_GET['lname'];
}

$ssarray=array();
if($submit<>''){
  $qk="truncate table search_course";
    $qing=mysqli_query($conn,$qk);
}
    
    $ke="SELECT b.m_name,c.kname,a.* FROM course a,admin b,ke c where time>current_date() and b.id=a.teacherid and c.id=a.kid and b.m_name like '%".$lname."%' and a.kid='".$ktname."'  and a.xueyuan<>'' order by time,ktime ";
    $kecheng=mysqli_query($conn,$ke);
    while($teach=mysqli_fetch_array($kecheng)){
                            $kname=$teach['kname'];
                            $teacher=$teach['m_name'];
                            $tid=$teach['teacherid'];
                            $time=$teach['time'];
                            
                            $week=$teach['week'];
                            $keid=$teach['kid'];
                            $ktime=$teach['ktime'];
                            $state=$teach['state'];
                            $cx="select count(xueyuan) from course where time='".$time."' and ktime='".$ktime."' and kid='".$keid."' and teacherid='".$tid."' and xueyuan<>'' ";
                            $cha=mysqli_query($conn,$cx);
                            while($chaxun=mysqli_fetch_array($cha)){
                                 $xun=$chaxun['count(xueyuan)'];
                            }
                            $last=$state-$xun;
                            //插入新表
                            $in="INSERT INTO search_course(time,week,kid,kname,ktime,teacherid,m_name,xueyuannum,kong) VALUES('".$time."','".$week."',".$keid.",'".$kname."','".$ktime."',".$tid.",'".$teacher."',".$xun.",".$last.")";
                            $insert=mysqli_query($conn,$in);
                            
          }



     //分页显示
          $pageSize = 10;   //每页显示的数量
          $rowCount = 0;   //要从数据库中获取
          $pageNow = 1;    //当前显示第几页
           
          //如果有pageNow就使用，没有就默认第一页。
          if (!empty($_GET['id'])){
            $pageNow = $_GET['id'];
          }

        //获取总记录
          $sql1 = "SELECT count(*) FROM search_course";
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

 $ssarray=fenye($conn,$pre,$pageSize,$pageNow,$rowCount,$pageCount,$pre);
      function fenye($conn,$pre,$pageSize,$pageNow,$rowCount,$pageCount,$pre){
         
          $sql2="SELECT * FROM search_course order by time,week,kid,ktime limit $pre,$pageSize";
        
          $res2=mysqli_query($conn,$sql2);  
         
         $sql3 = "SELECT * FROM search_course order by time,week,kid,ktime";
          $res3 = mysqli_query($conn,$sql3);

        $order=array();
        if($res3){
         while($row_order=mysqli_fetch_array($res3)){
          $order[ ]=$row_order;
          }

        //从数据库获取数据
        $objPHPExcel=new PHPExcel();
        $data=$order;

        //设置excel列名
          $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1','上课时间');
          $objPHPExcel->setActiveSheetIndex(0)->setCellValue('B1','周期');
          $objPHPExcel->setActiveSheetIndex(0)->setCellValue('C1','课程名');
          $objPHPExcel->setActiveSheetIndex(0)->setCellValue('D1','时间段');
          $objPHPExcel->setActiveSheetIndex(0)->setCellValue('E1','任课老师');
          $objPHPExcel->setActiveSheetIndex(0)->setCellValue('F1','上课学员数');
          $objPHPExcel->setActiveSheetIndex(0)->setCellValue('G1','是否满员');
            //把数据循环写入excel中
          foreach($data as $key => $value){
              $key+=2;
              $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A'.$key,$value['time']);
              $objPHPExcel->setActiveSheetIndex(0)->setCellValue('B'.$key,$value['week']);
              $objPHPExcel->setActiveSheetIndex(0)->setCellValue('C'.$key,$value['kname']);
              $objPHPExcel->setActiveSheetIndex(0)->setCellValue('D'.$key,$value['ktime']);
              $objPHPExcel->setActiveSheetIndex(0)->setCellValue('E'.$key,$value['m_name']);
              $objPHPExcel->setActiveSheetIndex(0)->setCellValue('F'.$key,$value['xueyuannum']);
              $objPHPExcel->setActiveSheetIndex(0)->setCellValue('G'.$key,$value['kong']);
          }
          $objPHPExcel->getActiveSheet() -> setTitle('Course');
          $objPHPExcel-> setActiveSheetIndex(0);
          $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel,"Excel2007");
           $filename = 'Course.xlsx';
           ob_end_clean();
           ob_start();
           $objWriter -> save('Course.xlsx');
  }
  
  return array($res2,$pageNow,$rowCount,$pageSize,$pageCount); 
}


$res2=array();

$res2=$ssarray[0];
$pageNow= $ssarray[1];
$rowCount= $ssarray[2];
$pageSize= $ssarray[3];
$pageCount=$ssarray[4];

 if($pageNow>$pageCount){
    echo '<script language="JavaScript"> alert("输入页码错误！");history.back();</script>';
  }

?>
<script type="text/javascript" src="http://www.siwutang.vip/swtmanager/backend/web/statics/js/jquery-1.4.2.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){ 
   $("#button_text1").click(function(){  
                var result1 = $("#input_text1").val();
                url='http://www.siwutang.vip/swtmanager/backend/web/index.php?r=kecheng/kebiao2&id=';  
                $other='&ktname=<?php echo $ktname ?>&lname=<?php echo $lname ?>';

                 location.href=url+result1+$other; 
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
width:100px;
height:28px;
border-radius:10px;
cursor:pointer;
border:2px;
text-align: center;
line-height: 28px;
}
.button link{
  font:#fff !important;
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
  <div class="ziti">四物堂---课表信息</div>
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
    <!--   <div class="left button" ><a href="http://www.siwutang.vip/swtmanager/backend/web/index.php?r=kecheng/addpai" class="button"> 添加排课信息</a></div>    -->  
      <div class="left" style="width: 300px;height: 50px;"></div>
      <form action="/swtmanager/backend/web/index.php?r=kecheng/kebiao2" method="post">
      <div class="left"></div>
      <div style="width: 150px;height: 30px; float:left; display: inline;">
                 <input type="text" name="tname" placeholder="请输入老师姓名" value=<?php echo $lname?> >
      </div>
      <div style="width: 60px;height: 30px; float:left; display: inline;">
            <select name="kname">
              <?php
                    while($tk=mysqli_fetch_array($keke)){
                           $tkecheng=$tk['kname'];
                           $tkid=$tk['id'];

                    ?>
                <option value =<?php echo $tkid?>><?php echo $tkecheng?></option>
             <?php
                    } 
                ?>
            </select> 
      </div>
      <div style="width: 30px;height: 30px; float:left; display: inline;">
      <!--     <select name="shiduan">
           <option value ="10:00-12:00">10:00-12:00</option>
           <option value ="13:30-15:30">13:30-15:30</option>
           <option value ="15:30-17:30">15:30-17:30</option>
           <option value ="19:00-21:00">19:00-21:00</option>
           </select>
 -->      </div>
      <div style="width: 100px;height: 30px; float:left; display: inline;">
                <input type="submit" name="submit" value="搜索" class="button" />
      </div>
      </form>    
  </div>
  <div class="kuan">
      <table border="1" width="1000" style="background-color: white;">
          <thead>
            <tr>  
              <th>日期</th>
              <th>周期</th>           
              <th>课程名</th>
              <th>时间段</th>
              <th>任课老师</th>
              <th>上课学员数</th>
              <th>是否满员</th>
            
              <th>操作</th>
            </tr>
          </thead>
          <?php 
            while($teachs=mysqli_fetch_array($res2)){
                $kname=$teachs['kname'];
                $teacher=$teachs['m_name'];
                $tid=$teachs['teacherid'];
                $time=$teachs['time'];
              
                $week=$teachs['week'];
                $keid=$teachs['kid'];
                $ktime=$teachs['ktime'];
               
                $xun=$teachs['xueyuannum'];
                $last=$teachs['kong'];

          ?>
          <tr>
            <td><?php echo $time?></td>
            <td><?php echo $week?></td>
            <td><?php echo $kname?></td>
            <td><?php echo $ktime?></td>
            <td><?php echo $teacher?></td>
            <td><?php echo $xun?></td>
            <td><?php if($last<>0){echo $last.'个空位';}else{echo '满员';}?></td>
            
            <td><a href="http://www.siwutang.vip/swtmanager/backend/web/index.php?r=kecheng/tiao&tid=<?php echo $tid;?>&keid=<?php echo $keid?>&time=<?php echo $time?>&ktime=<?php echo $ktime?>&last=<?php echo $last?>">详情及调课&nbsp;&nbsp;</a></td>
         <?php }?>
          </tr>
      </table>
      <p></p>
      <div class="kuan" >
          <div style="width: 200px;height: 30px;text-align: left;float:left; display: inline;"><a href="http://www.siwutang.vip/swtmanager/backend/web/Course.xlsx"> 点击下载查看更多</a></div>
          <div style="width: 800px;height: 30px;text-align: right;float:left; display: inline;">
            <?php
          
              if($pageNow>1){
        $prePage = $pageNow-1;
        echo "<a href='http://www.siwutang.vip/swtmanager/backend/web/index.php?r=kecheng/kebiao2&id=$prePage&ktname=$ktname&lname=$lname'>上一页</a> ";
        echo "&nbsp;&nbsp;&nbsp;";
      }
      
      if($pageNow<$pageCount){
      
        $nextPage = $pageNow+1;
        echo "<a href='http://www.siwutang.vip/swtmanager/backend/web/index.php?r=kecheng/kebiao2&id=$nextPage&ktname=$ktname&lname=$lname'>下一页</a> ";
        echo "&nbsp;&nbsp;&nbsp;";
        echo "当前第{$pageNow}页/共{$pageCount}页";
           echo '<input type="text" class="jump_text" name="jump" id="input_text1">&nbsp;<button id="button_text1">跳转</button>  ';
      }
      echo "<br/><br/>";
            ?>
          </div>
          
     </div>
  </div>
  </div>
</div>