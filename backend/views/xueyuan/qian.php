<?php 
use yii\helpers\Html;
$conn=mysqli_connect('hdm121115553.my3w.com','hdm121115553','swt62899308swt','hdm121115553_db');
  if($conn->connect_errno){
      die('连接失败'.$conn->connect_errno);
  }
  $conn->set_charset('utf8');
  $qk="truncate table baoming ";
  $qing=mysqli_query($conn,$qk);

   // 获取POST的数据
   $submit=isset($_POST["submit"])?$_POST["submit"]:'';
   $begin=isset($_POST["begin"])?$_POST["begin"]:'';
   $end=isset($_POST["end"])?$_POST["end"]:'';

if($end<>'' && $begin<>''){
      //统计每个老师的学员
      $teach="select id,m_name from admin where leibie='老师'";
      $teachs=mysqli_query($conn,$teach);
      while($te=mysqli_fetch_array($teachs)){
           $teacherid=$te['id'];
           $teachername=$te['m_name'];
      
       
       //统计所有注册学员
       $shi="SELECT count(sname) from student where sname<>'' and date between '".$begin."' and '".$end."' and teacherid='".$teacherid."'";
       $shijian=mysqli_query($conn,$shi);
       while($hh=mysqli_fetch_array($shijian)){
            $hhs=$hh['count(sname)'];
       } 
       //统计在读学员
      $shi2="SELECT count(sname) from student where sname<>'' and date between '".$begin."' and '".$end."' and close=0 and teacherid='".$teacherid."'";
       $shijian2=mysqli_query($conn,$shi2);
       while($hh2=mysqli_fetch_array($shijian2)){
            $hhs2=$hh2['count(sname)'];
       } 

     

       $in="INSERT INTO baoming(begin,end,teacher,zhuce,study) VALUES('".$begin."','".$end."','".$teachername."','".$hhs."','".$hhs2."')";
       $insert=mysqli_query($conn,$in);    
      }


}else{
  echo " ";
 }
        

?>
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="https://static.runoob.com/assets/jquery-validation-1.14.0/dist/jquery.validate.min.js"></script>
<script src="https://static.runoob.com/assets/jquery-validation-1.14.0/dist/localization/messages_zh.js"></script>
<style>

.ziti{
  font-size: 16px;
  font-family: 微软雅黑;
}
.juli{
  width: 300px;
  height: 15px;
}


.leftbig{
  width: 900px;
  float:left;
  display: inline;
}



ul li{
  list-style:none;
}

.kuanmiddle{
  width:130px;
  height: 30px;
}
.kuanbig{
  width:1000px;
  height: 600px;

}


 .black_overlay{ 
        display: none; 
        position: absolute; 
        top: 0%; 
        left: 0%; 
        width: 100%; 
        height: 100%; 
        background-color: black; 
        z-index:1001; 
        -moz-opacity: 0.8; 
        opacity:.80; 
        filter: alpha(opacity=88); 
        } 
     .white_content { 
            display: none; 
            position: absolute; 
            top: 25%; 
            left: 25%; 
            width: 55%; 
            height: 55%; 
            padding: 20px; 
           border-radius: 30px;
            background-color: white; 
            z-index:1002; 
            overflow: auto; 
        } 

         table  
        {  
            border-collapse: collapse;  
            margin: 0 auto;  
            text-align: center;
             border-color:#fff;  
        }  
        table td, table th  
        {  
            border: 2px solid #fff;  
            color: #666;  
            height: 30px;  
        }  
        table thead th  
        {  
            background-color: #7CC7EA; 
           
            text-align: center;
            color:#fff; 
        }  
        table tr:nth-child(odd)  
        {  
            background: #ECF5FB;  
        }  
        table tr:nth-child(even)  
        {  
            background: #CBE9F7;  
        }
.font{
  font-size: 14px;
  font-family: 微软雅黑;
}
.nei{
  margin:12px;
  background-color:#eee;
  width:98%;
    height:95%;
}
.inline{
  margin: auto;
  width:80%;
  height: 30px;
  background-color:#eee;
} 
.left{
  display:inline;
  width: 350px;
  line-height: 30px;
  background-color:#eee;
  float:left;
}
.right{
  display:inline;
  width: 120px;
  line-height: 30px;
  background-color:#eee;
  float:right;
}
.center{
  width:100%;
  margin: auto;
 
}
.middle{
  width:90%;
  margin: auto;
    background-color:#eee;
}
.dangzhong{
  display:inline;
  width: 200px;

  line-height: 30px;
  background-color:#eee;
  margin-left: 5%;
}


</style>

<div class="juli"></div>


<div class="main font">
 <div class="nei">

 <div class="juli"></div>

   <div class="kuan ziti"><a href="http://www.siwutang.vip/swtmanager/backend/web/index.php?r=xueyuan/qian">学员报名情况统计</a></div>
        <div class="inline">
        <form action="/swtmanager/backend/web/index.php?r=xueyuan/qian" method="post" >
          <div class="left">日期：<input type="date" name="begin" class="kuanmiddle">&nbsp;&nbsp;至&nbsp;&nbsp;<input type="date" name="end" class="kuanmiddle"></div>
       
    
          <div class="right"><input type="submit" name="submit" value="查询" class="button" /></div>
          </form>
        </div>
        <div class="center">
          <div class="juli"></div>
            <div class="middle">
                  <table border="1" width="90%" style="background-color: white;">
                <thead>
                    <tr>
                      <th>开始日期 </th>
                      <th>结束日期 </th>
                      <th>老师名 </th>
                      <th>注册人数 </th>
                      <th>在读人数 </th>
                    </tr>
                </thead>
                  <?php 
          $total=0;
          $kk="select * from baoming ";
          $kks=mysqli_query($conn,$kk);
          while($kkc=mysqli_fetch_array($kks)){
               $tkkc=$kkc['teacher'];
               $kcs=$kkc['zhuce'];
               $kshi=$kkc['study'];
               $begins=$kkc['begin'];
               $ends=$kkc['end'];
               $total=$total+$kshi;

        ?>
                <tr>
                   <td><?php echo $begins?></td>
                   <td><?php echo $ends?></td>
                   <td><?php echo $tkkc?></td>
                   <td><?php echo $kcs?></td>
                   <td><?php echo $kshi?></td>
                </tr>
             <?php 
                }
             ?>
            </table>

          </div>

        </div>

  </div>
           
  <div class="juli"></div>
 

  </div>

     
