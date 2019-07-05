<?php 
use yii\helpers\Html;
$conn=mysqli_connect('hdm121115553.my3w.com','hdm121115553','swt62899308swt','hdm121115553_db');
  if($conn->connect_errno){
      die('连接失败'.$conn->connect_errno);
  }
  $conn->set_charset('utf8');

$kc="SELECT id,m_name FROM admin where leibie='老师' order by id";
$keke=mysqli_query($conn,$kc);

?>
<script type="text/javascript" src="http://www.siwutang.vip/swtmanager/backend/web/statics/js/jquery-1.4.2.min.js"></script>
<style>

.ziti{
  font-size: 16px;
  font-family: 微软雅黑;
}
.juli{
  width: 300px;
  height: 15px;
}
.julibig{
  width: 300px;
  height:300px;
}


.left{
  width: 50px;
  float:left;
  display: inline;
}
.leftbig{
  width: 400px;
  float:left;
  display: inline;
  height:30px;
}
.leftmiddle{
  width: 230px;
  float:left;
  display: inline;
  height:30px;
}
.leftcenter{
  width: 100px;
  float:left;
  display: inline;
  height:30px;
  text-align:center;
  margin-top:5px;
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
        .kuan2{
    width:75%;
  height:30px;
 margin: auto;
}

</style>


<div class="main">
<form action="/swtmanager/backend/web/index.php?r=tongzhi/messageok" method="post">
<div class="juli3"></div>
<div class="left">&nbsp;</div>
<div class="kuan">
  <div ><a href="http://www.siwutang.vip/swtmanager/backend/web/index.php?r=tongzhi/message">老师休息课程调整</a></div>
  </div>
  <div class="juli"></div>
 
<div class="kuan2">
 <div class="left">&nbsp;</div>
  <div >选择老师：
      <select name="tnameid">
          <?php
            while($tk=mysqli_fetch_array($keke)){
                   $tkecheng=$tk['m_name'];
                   $tkid=$tk['id'];

            ?>
        <option value =<?php echo $tkid?>><?php echo $tkecheng?></option>
      <?php
            } 
        ?>
       </select>
  </div>
  <div class="juli"></div>
  <div class="left">&nbsp;</div>
  <div>开始休息时间：<input id='date' type="date" name="begindate" /></div>
  <div class="juli"></div>
  <div class="left">&nbsp;</div>
  <div>结束休息时间：<input id='date' type="date" name="enddate" /></div>
  <div class="juli"></div>
  <div class="left">&nbsp;</div>

  <div class="juli"></div>
  <div class="left">&nbsp;</div>
  <div><input type="submit" name="submit" value="发送" class="button"></div>

</form>
</div>
<div class="julibig"></div>

</div>