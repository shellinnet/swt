<?php

$conn=mysqli_connect('hdm121115553.my3w.com','hdm121115553','swt62899308swt','hdm121115553_db');
  if($conn->connect_errno){
      die('连接失败'.$conn->connect_errno);
  }
$conn->set_charset('utf8');
$keys = $_POST['key']; //获取值 老师名

$keys='kku';
$kkid=array();
$city=array();

//通过老师名获取周几
$ke="SELECT a.zq,b.id FROM kecheng a,admin b where a.teacherid=b.id and b.m_name='".$keys."' group by a.zq";
$kecheng=mysqli_query($conn,$ke);

while($kk=mysqli_fetch_array($kecheng)){
	  $kkid=$kk['id'];
	  $city[]=$kk['zq']; 
}

  if(!empty($city[0])){ //有值，组装数据
   $result['status'] = 200; 
   $result['data'] = $city;
   $result['id'] = $kkid;
    }else{ //无值，返回状态码220 
    	$result['status'] = 220;
    	 } 
    	 echo json_encode($result); //返回JSON数据 

    	
?>