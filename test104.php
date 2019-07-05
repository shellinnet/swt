<?php

$conn=mysqli_connect('hdm121115553.my3w.com','hdm121115553','swt62899308swt','hdm121115553_db');
  if($conn->connect_errno){
      die('连接失败'.$conn->connect_errno);
  }
$conn->set_charset('utf8');
$keys = $_POST['key']; //获取值 ktid
$keys="薄振坤";
$kkid=array();
$address=array();

$ke="select b.m_name,a.id,c.kname from kecheng a,admin b,ke c where b.m_name='".$keys."' and a.teacherid=b.id and c.id=a.keid group by a.teacherid";
$kecheng=mysqli_query($conn,$ke);
echo $ke;
// while($kk=mysqli_fetch_array($kecheng)){
// 	  $kkid=$kk['id'];
// 	  $address[]=$kk['kname']; 
// }

//   if(!empty($address[0])){ //有值，组装数据
//    $result['status'] = 200; 
//    $result['data'] = $address;
//     }else{ //无值，返回状态码220 
//     	$result['status'] = 220;
//     	 } 
//     	 echo json_encode($result); //返回JSON数据 

    	
?>