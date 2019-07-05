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
$time=time();
$ljs=$lj."/backend/web/";
function week($conn,$time, $format='Y-m-d',$ljs){
// 查询这一周的日期
//获取当前周几
$time = $time != '' ? $time : time();
echo $time;

  $week = date('w', $time);
 
  $date = [];

  for ($i=3; $i<=7; $i++){
    $date[$i] = date($format ,strtotime( '+' . $i-$week .' days', $time));
    
  }
  var_dump($date);
  echo "<br>";
  //周三课程
  $san=$date[3];
echo $san;
  $sql4 = "select a.time,a.ktime,b.kname,c.m_name,a.xueyuan from course a,ke b,admin c where a.kid=b.id and a.teacherid=c.id and a.time='".$san."' and a.xueyuan<>'' order by c.m_name,a.ktime";
  $res4 = mysqli_query($conn,$sql4);
  foreach($date as $key => $value){
              
  }

  //生成excel表格
  $objPHPExcel=new PHPExcel();
  //设置excel列名
  $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1','时间段');
  $objPHPExcel->setActiveSheetIndex(0)->setCellValue('B1','周三');
  $objPHPExcel->setActiveSheetIndex(0)->setCellValue('C1','老师名');

  $objPHPExcel->setActiveSheetIndex(0)->setCellValue('D1','周四');
  $objPHPExcel->setActiveSheetIndex(0)->setCellValue('E1','老师名');
  $objPHPExcel->setActiveSheetIndex(0)->setCellValue('F1','周五');
  $objPHPExcel->setActiveSheetIndex(0)->setCellValue('G1','老师名');

  $obWriter=PHPExcel_IOFactory::createWriter($objPHPExcel,"Excel2007");
  $obWriter->save("kebiao.xlsx");
}

$weekdate=week($conn,$time,$format='Y-m-d',$ljs);

?>
<style>

.ziti{
  font-size: 16px;
  font-family: 微软雅黑;
}
.juli{
  width: 300px;
  height: 15px;
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
}


</style>

<script type="text/javascript" src="http://www.siwutang.vip/swtmanager/backend/web/statics/js/jquery-1.4.2.min.js"></script>



<div class="main">
<div class="juli"></div>
<div class="kuan"><a href="http://www.siwutang.vip/swtmanager/backend/web/index.php?r=kecheng/download">课表下载</a></div>
<div class="juli"></div>
<div class="left">&nbsp;</div>

<div class="leftbig">
<!-- <form action="/swtmanager/backend/web/index.php?r=kecheng/xiuxiok" method="post" enctype="multipart/form-data">
    <div class="juli"></div>

    <div class="juli"></div>
    <div class="juli">开始日期：<input type="date" name="begin"></div>
    <div class="juli"></div>
    <div class="juli"></div>
    
    <div class="juli">结束日期：<input type="date" name="end"></div>
    <div class="juli"></div>
    <div class="juli"></div>
    <div class="juli"> <input type ="submit"  name="submit" value="课表下载" class="button" /></div>
</form> -->
<div class="juli"></div>
<a href="http://www.siwutang.vip/swtmanager/backend/web/kebiao.xlsx"> 近一周课表下载</a>
</div>



</div>
