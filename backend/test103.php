<?php
header("Content-Type: text/html;charset=utf-8");
error_reporting(E_ALL ^ E_NOTICE);
$conn=mysqli_connect('hdm121115553.my3w.com','hdm121115553','swt62899308swt','hdm121115553_db');
  if($conn->connect_errno){
      die('连接失败'.$conn->connect_errno);
  }
$conn->set_charset('utf8');
$keys = $_POST['key']; //获取值 time

 $time=substr($keys,0,6);

$id=substr($keys,6,8);

$kkid=array();
$week=array();

//通过老师名获取时段
$ke="select duan from kecheng where teacherid='".$id."' and zq='".$time."' order by duan asc";
$kecheng=mysqli_query($conn,$ke);

while($kk=mysqli_fetch_array($kecheng)){
	 
	  $week[]=$kk['duan']; 
}

  if(!empty($week[0])){ //有值，组装数据
   $result['status'] = 200; 
   $result['data'] = $week;
    }else{ //无值，返回状态码220 
    	$result['status'] = 220;
    	 } 
    	 echo json_encode($result); //返回JSON数据 

    	
?>