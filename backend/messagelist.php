<?php 
use yii\helpers\Html;
$lj='/data/home/hyu4458630001/htdocs/swtmanager';
require $lj. '/vendor/PHPExcel/PHPExcel.php';
require $lj. '/vendor/PHPExcel/PHPExcel/IOFactory.php';
require $lj. '/vendor/PHPExcel/PHPExcel/Reader/Excel5.php';
$conn=mysqli_connect('hdm121115553.my3w.com','hdm121115553','swt62899308swt','hdm121115553_db');
  if($conn->connect_errno){
      die('连接失败'.$conn->connect_errno);
  }
  $conn->set_charset('utf8');
   $qk="truncate table message ";
  $qing=mysqli_query($conn,$qk);

  //分页显示

  $pageSize = 9;   //每页显示的数量
  $rowCount = 0;   //要从数据库中获取
  $pageNow = 1;    //当前显示第几页

   
     // 获取POST的数据
   $submit=isset($_POST["submit"])?$_POST["submit"]:'';
   $begin=isset($_POST["begin"])?$_POST["begin"]:'';
   $end=isset($_POST["end"])?$_POST["end"]:'';

   $tname=isset($_POST["tname"])?$_POST["tname"]:''; 

if($end<>'' && $begin<>''){

  if($tname=='ALL'){
    if (!empty($_GET['id'])){
    $pageNow = $_GET['id'];
  }
 
      //获取总记录
 $sql1 = "select * from course a,student b,admin c,ke d where  a.teacherid=c.id and a.kid=d.id and a.xueyuan=b.sname and a.time between '".$begin."' and '".$end."' group by b.sname,b.mobile,c.m_name,d.kname order by a.time ";

  $res1 = mysqli_query($conn,$sql1);
   
  if($row1= mysqli_num_rows($res1)){
     $rowCount=$row1;
 
  }else{
     echo " ";
  }

  //计算共有多少页，ceil取进1
  $pageCount = ceil(($rowCount/$pageSize));

  $pre = ($pageNow-1)*$pageSize; 

    $cha="select a.time,c.m_name,d.kname,a.ktime,b.sname,b.mobile,b.note,a.qian from course a,student b,admin c,ke d where  a.teacherid=c.id and a.kid=d.id and a.xueyuan=b.sname and a.time between '".$begin."' and '".$end."' group by b.sname,b.mobile,c.m_name,d.kname order by a.time limit $pre,$pageSize";
  
    $chaxun=mysqli_query($conn,$cha);

    $cha2="select a.time,c.m_name,d.kname,a.ktime,b.sname,b.mobile,b.note,a.qian from course a,student b,admin c,ke d where  a.teacherid=c.id and a.kid=d.id and a.xueyuan=b.sname and a.time between '".$begin."' and '".$end."' group by b.sname,b.mobile,c.m_name,d.kname order by a.time ";
    $chaxun2=mysqli_query($conn,$cha2);
    $hh=mysqli_num_rows($chaxun);
    if($hh>0){  
      while($tj=mysqli_fetch_array($chaxun2)){
           $kname=$tj['kname'];
           $teacher=$tj['m_name'];
           $duan=$tj['ktime'];
           $student=$tj['sname'];
           $mobile=$tj['mobile'];
           $qian=$tj['qian'];
           $note=$tj['note'];
           $ktime=$tj['time'];
           if($qian==1){
             $qiandao='签到';
           }elseif($qian==0){
            $qiandao='未签到';
           }

        $in="INSERT INTO message(begintime,kecheng,duan,student,mobile,qian,note,teacher) VALUES('".$ktime."','".$kname."','".$duan."','".$student."','".$mobile."','".$qiandao."','".$note."','".$teacher."')";
         echo $in;
      
        $insert=mysqli_query($conn,$in); 

        $kk="select * from message ";
          $kks=mysqli_query($conn,$kk); 
      }

    }else{
      echo "no kecheng!";
    }

    student($conn);

  }else{
          //获取总记录
     $sql1 = "select * from course a,student b,admin c,ke d where  a.teacherid=c.id and a.kid=d.id and a.xueyuan=b.sname and a.time between '".$begin."' and '".$end."' and c.m_name='".$tname."' group by b.sname,b.mobile,c.m_name,d.kname order by a.time";

      $res1 = mysqli_query($conn,$sql1);
       
      if($row1= mysqli_num_rows($res1)){
         $rowCount=$row1;
     
      }else{
         echo " ";
      }

           //计算共有多少页，ceil取进1
      $pageCount = ceil(($rowCount/$pageSize));

      $pre = ($pageNow-1)*$pageSize; 


      $cha="select a.time,c.m_name,d.kname,a.ktime,b.sname,b.mobile,b.note,a.qian from course a,student b,admin c,ke d where  a.teacherid=c.id and a.kid=d.id and a.xueyuan=b.sname and a.time between '".$begin."' and '".$end."' and c.m_name='".$tname."' group by b.sname,b.mobile,c.m_name,d.kname order by a.time limit $pre,$pageSize ";
    $chaxun=mysqli_query($conn,$cha);

    $cha2="select a.time,c.m_name,d.kname,a.ktime,b.sname,b.mobile,b.note,a.qian from course a,student b,admin c,ke d where  a.teacherid=c.id and a.kid=d.id and a.xueyuan=b.sname and a.time between '".$begin."' and '".$end."' and c.m_name='".$tname."' group by b.sname,b.mobile,c.m_name,d.kname order by a.time ";
    $chaxun2=mysqli_query($conn,$cha2);

    $hh=mysqli_num_rows($chaxun);
    if($hh>0){  
      while($tj=mysqli_fetch_array($chaxun2)){
           $kname=$tj['kname'];
           $teacher=$tj['m_name'];
           $duan=$tj['ktime'];
           $student=$tj['sname'];
           $mobile=$tj['mobile'];
           $qian=$tj['qian'];
           $note=$tj['note'];
           $ktime=$tj['time'];
            if($qian==1){
             $qiandao='签到';
           }elseif($qian==0){
            $qiandao='未签到';
           }

        $in="INSERT INTO message(begintime,kecheng,duan,student,mobile,qian,note,teacher) VALUES('".$ktime."','".$kname."','".$duan."','".$student."','".$mobile."','".$qiandao."','".$note."','".$teacher."')";
        echo $in;
        $insert=mysqli_query($conn,$in);  
      }

    
    }else{
      echo "no message!";
    }

      student($conn);
   }

 }else{
  if (!empty($_GET['id'])){
    $pageNow = $_GET['id'];
  }
  $tname=$_GET['tname'];
  $begin=$_GET['begin'];
  $end=$_GET['end'];

  if($tname=='ALL'){

      //获取总记录
 $sql1 = "select * from course a,student b,admin c,ke d where  a.teacherid=c.id and a.kid=d.id and a.xueyuan=b.sname and a.time between '".$begin."' and '".$end."' group by b.sname,b.mobile,c.m_name,d.kname order by a.time ";

  $res1 = mysqli_query($conn,$sql1);
   
  if($row1= mysqli_num_rows($res1)){
     $rowCount=$row1;
 
  }else{
     echo " ";
  }

  //计算共有多少页，ceil取进1
  $pageCount = ceil(($rowCount/$pageSize));

  $pre = ($pageNow-1)*$pageSize; 

    $cha="select a.time,c.m_name,d.kname,a.ktime,b.sname,b.mobile,b.note,a.qian from course a,student b,admin c,ke d where  a.teacherid=c.id and a.kid=d.id and a.xueyuan=b.sname and a.time between '".$begin."' and '".$end."' group by b.sname,b.mobile,c.m_name,d.kname order by a.time limit $pre,$pageSize";
  
    $chaxun=mysqli_query($conn,$cha);

    $hh=mysqli_num_rows($chaxun);

    $cha2="select a.time,c.m_name,d.kname,a.ktime,b.sname,b.mobile,b.note,a.qian from course a,student b,admin c,ke d where  a.teacherid=c.id and a.kid=d.id and a.xueyuan=b.sname and a.time between '".$begin."' and '".$end."' group by b.sname,b.mobile,c.m_name,d.kname order by a.time ";
    $chaxun2=mysqli_query($conn,$cha2);
    if($hh>0){  
      while($tj=mysqli_fetch_array($chaxun2)){
           $kname=$tj['kname'];
           $teacher=$tj['m_name'];
           $duan=$tj['ktime'];
           $student=$tj['sname'];
           $mobile=$tj['mobile'];
           $qian=$tj['qian'];
           $note=$tj['note'];
           $ktime=$tj['time'];
           if($qian==1){
             $qiandao='签到';
           }elseif($qian==0){
            $qiandao='未签到';
           }

        $in="INSERT INTO message(begintime,kecheng,duan,student,mobile,qian,note,teacher) VALUES('".$ktime."','".$kname."','".$duan."','".$student."','".$mobile."','".$qiandao."','".$note."','".$teacher."')";
         echo $in;
      
        $insert=mysqli_query($conn,$in); 

        $kk="select * from message ";
          $kks=mysqli_query($conn,$kk); 
      }

    }else{
      echo "no kecheng!";
    }

    student($conn);


 }else{
         //获取总记录
     $sql1 = "select * from course a,student b,admin c,ke d where  a.teacherid=c.id and a.kid=d.id and a.xueyuan=b.sname and a.time between '".$begin."' and '".$end."' and c.m_name='".$tname."' group by b.sname,b.mobile,c.m_name,d.kname order by a.time ";

      $res1 = mysqli_query($conn,$sql1);
       
      if($row1= mysqli_num_rows($res1)){
         $rowCount=$row1;
     
      }else{
         echo " ";
      }

           //计算共有多少页，ceil取进1
      $pageCount = ceil(($rowCount/$pageSize));

      $pre = ($pageNow-1)*$pageSize; 


      $cha="select a.time,c.m_name,d.kname,a.ktime,b.sname,b.mobile,b.note,a.qian from course a,student b,admin c,ke d where  a.teacherid=c.id and a.kid=d.id and a.xueyuan=b.sname and a.time between '".$begin."' and '".$end."' and c.m_name='".$tname."' group by b.sname,b.mobile,c.m_name,d.kname order by a.time limit $pre,$pageSize ";
    $chaxun=mysqli_query($conn,$cha);

     $cha2="select a.time,c.m_name,d.kname,a.ktime,b.sname,b.mobile,b.note,a.qian from course a,student b,admin c,ke d where  a.teacherid=c.id and a.kid=d.id and a.xueyuan=b.sname and a.time between '".$begin."' and '".$end."' and c.m_name='".$tname."' group by b.sname,b.mobile,c.m_name,d.kname order by a.time ";
    $chaxun2=mysqli_query($conn,$cha2);

    $hh=mysqli_num_rows($chaxun);
    if($hh>0){  
      while($tj=mysqli_fetch_array($chaxun2)){
           $kname=$tj['kname'];
           $teacher=$tj['m_name'];
           $duan=$tj['ktime'];
           $student=$tj['sname'];
           $mobile=$tj['mobile'];
           $qian=$tj['qian'];
           $note=$tj['note'];
           $ktime=$tj['time'];
            if($qian==1){
             $qiandao='签到';
           }elseif($qian==0){
            $qiandao='未签到';
           }

        $in="INSERT INTO message(begintime,kecheng,duan,student,mobile,qian,note,teacher) VALUES('".$ktime."','".$kname."','".$duan."','".$student."','".$mobile."','".$qiandao."','".$note."','".$teacher."')";
        echo $in;
        $insert=mysqli_query($conn,$in);  
      }

    
    }else{
      echo "no message!";
    }

      student($conn);
 }
}

function student($conn){
    $sql3 = "SELECT * FROM message order by begintime,teacher,kecheng,duan";
    echo $sql3 ;
          $res3 = mysqli_query($conn,$sql3);
      //生成excel表格
      $order=array();
        if($res3){
         while($row_order=mysqli_fetch_array($res3)){
          $order[ ]=$row_order;
          }
      }

      //从数据库获取数据
        $objPHPExcel=new PHPExcel();
        $data=$order;

        //设置excel列名
          $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1','上课时间');
          $objPHPExcel->setActiveSheetIndex(0)->setCellValue('B1','任课老师');
          $objPHPExcel->setActiveSheetIndex(0)->setCellValue('C1','课程名');
          $objPHPExcel->setActiveSheetIndex(0)->setCellValue('D1','时间段');
          $objPHPExcel->setActiveSheetIndex(0)->setCellValue('E1','学生姓名');
          $objPHPExcel->setActiveSheetIndex(0)->setCellValue('F1','电话');
          $objPHPExcel->setActiveSheetIndex(0)->setCellValue('G1','签到记录');
          $objPHPExcel->setActiveSheetIndex(0)->setCellValue('H1','老师备注');
            //把数据循环写入excel中
          foreach($data as $key => $value){
              $key+=2;
              $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A'.$key,$value['begintime']);
              $objPHPExcel->setActiveSheetIndex(0)->setCellValue('B'.$key,$value['teacher']);
              $objPHPExcel->setActiveSheetIndex(0)->setCellValue('C'.$key,$value['kecheng']);
              $objPHPExcel->setActiveSheetIndex(0)->setCellValue('D'.$key,$value['duan']);
              $objPHPExcel->setActiveSheetIndex(0)->setCellValue('E'.$key,$value['student']);
              $objPHPExcel->setActiveSheetIndex(0)->setCellValue('F'.$key,$value['mobile']);
              $objPHPExcel->setActiveSheetIndex(0)->setCellValue('G'.$key,$value['qian']);
              $objPHPExcel->setActiveSheetIndex(0)->setCellValue('H'.$key,$value['note']);
          }
          $objPHPExcel->getActiveSheet() -> setTitle('student_message');
          $objPHPExcel-> setActiveSheetIndex(0);
          $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel,"Excel2007");
           $filename = 'student_message.xlsx';
           ob_end_clean();
           ob_start();
           $objWriter -> save('student_message.xlsx');

           return $res3;
}

?>
<script type="text/javascript" src="http://www.siwutang.vip/swtmanager/backend/web/statics/js/jquery-1.4.2.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){ 
   $("#button_text1").click(function(){  
                var result1 = $("#input_text1").val();
               // url='http://www.siwutang.vip/swtmanager/backend/studentlist.php?id=';
                var tname='<?php echo "$tname";?>';
                var begin='<?php echo "$begin";?>';
                var end='<?php echo "$end";?>';
           

               url='http://www.siwutang.vip/swtmanager/backend/messagelist.php?tname='; 
                 uu='&begin=';
                 mm='&end=';
                ff='&id=';
                 location.href=url+tname+uu+begin+mm+end+ff+result1; 

               // location.href=url+result1; 
            
             console.log(tname);
             console.log(begin);
             console.log(end);
             console.log(result1);
            }); 
  });
</script>
<style>
body{
  font-size: 14px;
  font-family: 微软雅黑;
  
}
a{
  text-decoration:none;
}

.ziti{
  font-size: 14px;
  font-family: 微软雅黑;
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
.leftcenter2{
  width: 100px;
  float:left;
  display: inline;
  height:30px;
  text-align:center;
}


.kuan2{
  width: 95%;
  height: 30px;
  text-align:left;
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
<div class="left" style="width: 3%;height: 30px;">&nbsp;</div>
  <div class="kuan2 left">
    
     
           <table border="1" width="100%" style="background-color: white;">
                <thead>
                    <tr>
                      <th>老师名 </th>
                      <th>课程名 </th>
                      <th>上课时间</th>
                    
                      <th>时间段 </th>
                      <th>学生姓名 </th>
                      <th>电话 </th>
                      <th>签到记录 </th>
                      <th>老师备注</th>
                    </tr>
                </thead>
                  <?php 
          
          
          while($kkc=mysqli_fetch_array($chaxun)){
               $tkkc=$kkc['kname'];
               $times=$kkc['time'];
               $kcs=$kkc['m_name'];
               $kduan=$kkc['ktime'];
               $kstudent=$kkc['sname'];
               $kmobile=$kkc['mobile'];
               $kqian=$kkc['qian'];
               $knote=$kkc['note']; 

        ?>
                <tr class="zi">
                 <td><?php echo $kcs; ?></td>
                   <td><?php echo $tkkc; ?></td>
                  
                   <th><?php echo $times; ?></th>
                   <td><?php echo $kduan; ?></td>
                   <td><?php echo $kstudent; ?></td>
                   <td><?php echo $kmobile; ?></td>
                   <td><?php if($kqian==1){echo "已签到";}else{echo "未签到";}?></td>
                   <td><?php echo $knote; ?></td>
                
                </tr>
             <?php 
                }
             ?>
            </table>
           
        <div class="kuan">

        <div style="width: 200px;height: 30px;text-align: left;float:left; display: inline;"><a href="http://www.siwutang.vip/swtmanager/backend/student_message.xlsx"> 点击下载查看更多</a></div>

          <div style="width: 350px;height: 30px;text-align: left;float:left; display: inline;">&nbsp;</div>
     
          <div style="width: 450px;height: 30px;text-align: right;float:left; display: inline;">
        <?php
          if($pageNow>1){
    $prePage = $pageNow-1;
    echo "<a href='http://www.siwutang.vip/swtmanager/backend/messagelist.php?tname=$tname&begin=$begin&end=$end&id=$prePage'>上一页</a> ";
    echo "&nbsp;&nbsp;&nbsp;";
  }
  if($pageNow<$pageCount){
    $nextPage = $pageNow+1;
    echo "<a href='http://www.siwutang.vip/swtmanager/backend/messagelist.php?tname=$tname&begin=$begin&end=$end&id=$nextPage'>下一页</a> ";
    echo "&nbsp;&nbsp;&nbsp;";
    echo "当前第{$pageNow}页/共{$pageCount}页";
    echo "&nbsp;";
    echo '<input type="text" class="jump_text" name="jump" id="input_text1">&nbsp;<button id="button_text1">跳转</button>  ';
  }
  echo "<br/><br/>";
        ?>
        </div>
     
        </div>
    <div class="julibig"></div>
        <div class="kuan"></div>
  </div>

