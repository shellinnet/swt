<?php
$conn=mysqli_connect('hdm121115553.my3w.com','hdm121115553','swt62899308swt','hdm121115553_db');
  if($conn->connect_errno){
      die('连接失败'.$conn->connect_errno);
  }
$conn->set_charset('utf8');
$key = $_POST['key']; //获取值 ktid
$key=1;
$kkid=[]
$address=[]
$ke="select * from ke where id='".$key."'";
$kecheng=mysqli_query($conn,$ke);
while($kk=mysqli_fetch_array($kecheng)){
	  $kkid=$kk['id'];
	  $address=$kk['kname'];

}

// $address[1] = array('成都','绵阳','德阳');
//  $address[2] = array('石家庄','唐山','秦皇岛');
//   $address[3] = array('长沙','株洲','湘潭'); 
  if(!empty($address[])){ //有值，组装数据
   $result['status'] = 200; 
   $result['data'] = $address[$key];
    }else{ //无值，返回状态码220 
    	$result['status'] = 220;
    	 } 
    	 echo json_encode($result); //返回JSON数据 
?>