<?php
$this->params['breadcrumbs'][] = '上传通知图片';
date_default_timezone_set("PRC");
$conn=mysqli_connect('hdm121115553.my3w.com','hdm121115553','swt62899308swt','hdm121115553_db');
  if($conn->connect_errno){
      die('连接失败'.$conn->connect_errno);
  }
  $conn->set_charset('utf8');

 $id=isset($_GET["id"])?$_GET["id"]:'';

if(!empty($_FILES["file"])) {
   
 $uploaddir = $_SERVER['DOCUMENT_ROOT']."/image/";

 $uploaddir.=date("Ymd").$_FILES["file"]["name"];


 if(move_uploaded_file($_FILES["file"]["tmp_name"], $uploaddir)) {
 echo "上传成功!";
 }else{
print_r($_FILES);
 }

}


if($_FILES["file"]["error"])
{
    echo $_FILES["file"]["error"];
}
else
{
    //控制上传文件的类型，大小
    if(($_FILES["file"]["type"]=="image/jpeg" || $_FILES["file"]["type"]=="image/png") && $_FILES["file"]["size"]<1024000)
    {
        //找到文件存放的位置
        $filename = "http://www.siwutang.vip/image/".date("Ymd").$_FILES["file"]["name"];
        
        //转换编码格式
        $filename = iconv("UTF-8","gb2312",$filename);
        
        //判断文件是否存在
        if(file_exists($filename))
        {
            echo "该文件已存在！";
        }
        else
        {
            //保存文件，插入数据库
            move_uploaded_file($_FILES["file"]["tmp_name"],$filename);
            echo $filename;
            
            $sql="update tongzhi set img='".$filename."' where id='".$id."'";
          
            $result=mysqli_query($conn,$sql);
            echo $result;
            if($result==1)
             {
                echo "数据插入数据库";
            }
                else
            {
                echo "数据未插入数据库";
            };
        }
    }else{
        echo "文件类型不正确！";
        }
}
        