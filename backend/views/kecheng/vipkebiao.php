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
$kc="SELECT id,kname FROM ke where tiao='1' ";
$keke=mysqli_query($conn,$kc);

$ssarray=array();
       
        $qk="truncate table search_course";
        $qing=mysqli_query($conn,$qk);
        
        //查询课程信息
         $ke="SELECT b.m_name,c.kname,a.* FROM course a,admin b,ke c where time>current_date() and b.id=a.teacherid and c.id=a.kid and c.vip=1 and a.xueyuan<>'' order by time,ktime ";
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
                            $cx="select count(xueyuan) from course where time='".$time."' and ktime='".$ktime."' and kid='".$keid."' and teacherid='".$tid."' and xueyuan<>''";
                            $cha=mysqli_query($conn,$cx);
                            while($chaxun=mysqli_fetch_array($cha)){
                                 $xun=$chaxun['count(xueyuan)'];
                            }
                            $last=$state-$xun;
                            //插入新表
                            $in="INSERT INTO search_course(time,week,kid,kname,ktime,teacherid,m_name,xueyuannum,kong) VALUES('".$time."','".$week."',".$keid.",'".$kname."','".$ktime."',".$tid.",'".$teacher."',".$xun.",".$last.")";
                            $insert=mysqli_query($conn,$in);                            
           }
           $ssarray=fenye($conn);
  

function fenye($conn){
     //分页显示
          $pageSize = 9;   //每页显示的数量
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

?>
<script type="text/javascript" src="http://www.qingyingtech.cn/swt/backend/web/statics/js/jquery-1.4.2.min.js"></script>
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
.font{
  font-size: 14px;
  font-family: 微软雅黑;
}
   .nei{
  margin:12px;
  background-color:#eee;
  width:98%;
    height:95%;
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
  width:90%;
  line-height: 30px;

  float:right;
  text-align: right;
}
.center{
  width:80%;
  margin: auto;
 
}
.small{
  font-size: 12px;
}
</style>

<div class="main ziti">
<div class=nei>
<div class="juli"></div>
  <div class="kuan ziti"><a href="http://www.siwutang.vip/swtmanager/backend/web/index.php?r=kecheng/vipkebiao">VIP课表信息及补签到</a></div>
 <div class="juli"></div>
  <div class="inline font">

  
      <form action="/swtmanager/backend/web/index.php?r=kecheng/vipkebiao2" method="post">
   
                 <input type="text" name="tname" placeholder="请输入老师姓名"  >&nbsp;
     

            <select name="kname" style="width: 180px;height: 27px;">
              <?php
                    while($tk=mysqli_fetch_array($keke)){
                           $tkecheng=$tk['kname'];
                           $tkid=$tk['id'];

                    ?>
                <option value =<?php echo $tkid?>><?php echo $tkecheng?></option>
             <?php
                    } 
                ?>
            </select> &nbsp;
   
     
    
                <input type="submit" name="submit" value="搜索" class="button" />
   
      </form>    
  </div>
  <div class="juli"></div>
  <div class="center">
     <table border="1" width=100% style="background-color: white;" class="font">
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
          <tr class="small">
            <td><?php echo $time?></td>
            <td><?php echo $week?></td>
            <td><?php echo $kname?></td>
            <td><?php echo $ktime?></td>
            <td><?php echo $teacher?></td>
            <td><?php echo $xun?></td>
            <td><?php if($last<>0){echo $last.'个空位';}else{echo '满员';}?></td>
            
            <td><a href="http://www.siwutang.vip/swtmanager/backend/web/index.php?r=kecheng/tiaovip&tid=<?php echo $tid;?>&keid=<?php echo $keid?>&time=<?php echo $time?>&ktime=<?php echo $ktime?>&last=<?php echo $last?>">详情及调课&nbsp;&nbsp;</a></td>
         <?php }?>
          </tr>
      </table>
      <p></p>
    <div class="font right">
          <div style="width: 200px;height: 30px;text-align: left;float:left; display: inline;"><a href="http://www.siwutang.vip/swtmanager/backend/web/Course.xlsx"> 点击下载查看更多</a></div>
          <div style="width: 800px;height: 30px;text-align: right;float:left; display: inline;">
            <?php
          
              if($pageNow>1){
        $prePage = $pageNow-1;
        echo "<a href='http://www.siwutang.vip/swtmanager/backend/web/index.php?r=kecheng/vipkebiao&id=$prePage'>上一页</a> ";
        echo "&nbsp;&nbsp;&nbsp;";
      }
      
      if($pageNow<$pageCount){
      
        $nextPage = $pageNow+1;
        echo "<a href='http://www.siwutang.vip/swtmanager/backend/web/index.php?r=kecheng/vipkebiao&id=$nextPage'>下一页</a> ";
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
</div>