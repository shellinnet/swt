<?php
  $conn=mysqli_connect('hdm121115553.my3w.com','hdm121115553','swt62899308swt','hdm121115553_db');
  if($conn->connect_errno){
      die('连接失败'.$conn->connect_errno);
  }
  $conn->set_charset('utf8');

  $kcid=isset($_GET["kid"])?$_GET["kid"]:'';
$kctqian=isset($_GET["tqian"])?$_GET["tqian"]:'';
$kcktime_id=isset($_GET["ktime_id"])?$_GET["ktime_id"]:'';

$del="DELETE FROM course WHERE kid='".$kcid."' and tqian='".$kctqian."' and ktime_id='".$kcktime_id."' and xueyuanid=0";
$delete=mysqli_query($conn,$del);

if($delete==1){
   echo "删除老师课程信息成功！";
}else{
	echo "删除老师课程信息失败！";
}