<?php
$conn=mysqli_connect('hdm121115553.my3w.com','hdm121115553','swt62899308swt','hdm121115553_db');
  if($conn->connect_errno){
      die('连接失败'.$conn->connect_errno);
  }
  $conn->set_charset('utf8');
//读出
$sql='select * from keshi';
$result=mysqli_query($conn,$sql);

 $data="";
  $array= array();
  class User{
    public $time;
    public $keshi;

  }
  while($row = mysqli_fetch_array($result,MYSQL_ASSOC)){
    $user=new User();
    $user->time = $row['time'];  
    $user->keshi = $row['keshi'];
 
    $array[]=$user;
  }
  $data=json_encode($array);
  
  echo $data;

  //清空数据表
  // $sql='truncate table keshi ';
  // $del=mysqli_query($conn,$sql);