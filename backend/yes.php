<?php 
header("Content-Type: text/html;charset=utf-8");
error_reporting(E_ALL ^ E_NOTICE);
$conn=mysqli_connect('hdm121115553.my3w.com','hdm121115553','swt62899308swt','hdm121115553_db');
  if($conn->connect_errno){
      die('连接失败'.$conn->connect_errno);
  }
  $conn->set_charset('utf8');

//$id=$_GET['id'];
echo "ok";
echo "<br>";
// $cx="DELETE from  tongzhi where id='".$id."'";
// $cha=mysqli_query($conn,$cx);
// var_dump($cha);
?> 