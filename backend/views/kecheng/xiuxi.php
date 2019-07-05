<?php 
use yii\helpers\Html;
$conn=mysqli_connect('hdm121115553.my3w.com','hdm121115553','swt62899308swt','hdm121115553_db');
  if($conn->connect_errno){
      die('连接失败'.$conn->connect_errno);
  }
  $conn->set_charset('utf8');

 $sfrest="SELECT * FROM rest";
  $sfrests=mysqli_query($conn,$sfrest);
  while($xiuxi=mysqli_fetch_array($sfrests)){
       $startTime=$xiuxi['begintime'];
       $endTime=$xiuxi['endtime'];
  }
?>
<style>

.ziti{
  font-size: 16px;
  font-family: 微软雅黑;
}
.juli{
  width: 300px;
  height: 15px;
}

.left{
  width: 50px;
  float:left;
  display: inline;
}
.leftbig{
  width: 600px;
  float:left;
  display: inline;
}

.kuan2{
    width:75%;
  height:30px;
 margin: auto;
}

</style>

<script type="text/javascript" src="http://www.siwutang.vip/swtmanager/backend/web/statics/js/jquery-1.4.2.min.js"></script>


<div class="main">

<div class="left">&nbsp;</div>


<form action="/swtmanager/backend/web/index.php?r=kecheng/xiuxiok" method="post" enctype="multipart/form-data">
    <div class="juli3"></div>

    <div class="kuan ziti"><a href="http://www.siwutang.vip/swtmanager/backend/web/index.php?r=kecheng/xiuxi">四物堂放假课程调整</a></div>
    <div class="juli"></div>
 <div class="left">&nbsp;</div>
        <div class="kuan2">
          <div class="leftbig">
        <div class="juli">开始日期：<input type="date" name="begin"></div>
        <div class="juli"></div>
        <div class="juli"></div>
        
        <div class="juli">结束日期：<input type="date" name="end"></div>
        <div class="juli"></div>
        <div class="juli"></div>
        <div class="juli"> <input type ="submit"  name="submit" value="调整" class="button" /></div>
</form>
      </div>
     <!--  <div class="leftbig">&nbsp;</div> -->
      <div class="left">
    
        <div class="juli">放假日期：（显示最后一次输入放假的时间）</div>
        <div class="juli"></div>
        <div class="juli">开始日期：<?php echo $startTime?></div>
        <div class="juli"></div>

        
        <div class="juli">结束日期：<?php echo $endTime?></div>
        <div class="juli"></div>
        <div class="juli"></div> 
        
      </div>
  </div>
</div>
