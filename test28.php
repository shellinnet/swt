<?php
#连接数据库
$conn=mysqli_connect('bdm271467114.my3w.com','bdm271467114','linda272193','bdm271467114_db');
if($conn->connect_errno){
    die('连接失败'.$conn->connect_errno);
}
#设置字符集
$conn->set_charset('utf8');
#查询数据
$sql='select * from no7 order by time asc';
$result=mysqli_query($conn,$sql);

 $data="";
  $array= array();
  class User{
    public $time;
    public $allok;
    public $allzl;
     public $allfu;
  }
  while($row = mysqli_fetch_array($result,MYSQL_ASSOC)){
    $user=new User();
    $user->time = $row['time'];
    $user->allok = $row['allok'];
     $user->allzl = $row['allzl'];
     $user->allfu = $row['allfu'];
    $array[]=$user;
  }
  $data=json_encode($array);
  // echo "{".'"user"'.":".$data."}";
  echo $data;



#将数据转化成json格式
// $json_data=array('categories'=>array(),'data'=>array());
// while ($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
//     array_push($json_data['data'],intval($row['data']));//将数值转化成字符串
//     array_push($json_data['categories'],$row['categories']);
// }


?>