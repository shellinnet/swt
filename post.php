<?php

$conn=mysqli_connect('hdm121115553.my3w.com','hdm121115553','swt62899308swt','hdm121115553_db');
  if($conn->connect_errno){
      die('连接失败'.$conn->connect_errno);
  }
  $conn->set_charset('utf8');


 $kid = $_POST['kid'];
 $name = $_POST['name'];
 $mobile = $_POST['mobile'];


$sql="insert into yuyue(mobile,name,kid) values('$mobile','$name','$kid')";
 $in=mysqli_query($conn,$sql);
//$sql->execute();
//$sql="insert into yuyue(name,mobile) values('pp','55')";
//mysqli_prepare($link,$sql);

// $res = $link -> query($sql);
// //读取数据值

// $num="select nsum from yuyuekecheng where kid='".$kid."'";
// $tim=mysqli_query($link,$num);
//     if($tim){     
//        $rs=mysqli_fetch_array($tim);
//        $count=$rs[0];
//        $count=$count+1;
//     }else{
//         $count=1;
        
//     }

// $result="update yuyuekecheng set nsum='".$count."' where kid='".$kid."'";
// $in=mysqli_query($link,$result);






