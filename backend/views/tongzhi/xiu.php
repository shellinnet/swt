<?php 
use yii\helpers\Html;
$conn=mysqli_connect('hdm121115553.my3w.com','hdm121115553','swt62899308swt','hdm121115553_db');
  if($conn->connect_errno){
      die('连接失败'.$conn->connect_errno);
  }
  $conn->set_charset('utf8');

 $id=$_REQUEST['id'];

$cx="select * from tongzhi where id='".$id."'";
$cha=mysqli_query($conn,$cx);
while($chaxun=mysqli_fetch_array($cha)){
     $chabiaoti=$chaxun['biaoti'];
     $chatime=$chaxun['created_time'];
     $chaneirong=$chaxun['neirong'];
     $endtime=$chaxun['endtime'];
}
?>
<script type="text/javascript" src="http://www.qingyingtech.cn/swt/backend/web/statics/js/jquery-1.4.2.min.js"></script>
<style>

.ziti{
  font-size: 16px;
  font-family: 微软雅黑;
}
.font{
  font-size: 14px;
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
 
}
.leftcenter2{
  width: 330px;
  float:left;
  display: inline;
  height:30px;
  text-align:center;
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
    width:90%;
  height:40px;
 margin: auto;
}
</style>

<div class="main">
<div class="juli"></div>
<div class="left">&nbsp;</div>

<div class="kuan"><a href="http://www.siwutang.vip/swtmanager/backend/web/index.php?r=tongzhi/main">小程序通知内容管理</a></div>

    <form action="/swtmanager/backend/web/index.php?r=tongzhi/main" method="post">
    <div class="juli"></div>
     <div class="kuan2 font">
         <div class="leftcenter2"></div>
        <div class="leftcenter">开始日期：</div>
        <div class="leftbig"><input type="date" name="begintime"  style="width:500px;height:30px;display:block;" value="<?php echo $chatime?>"/></div>    
      </div>
      <div class="kuan2 font">
         <div class="leftcenter2"></div>
        <div class="leftcenter">结束日期：</div>
        <div class="leftbig"><input type="date" name="endtime"  style="width:500px;height:30px;display:block;" value="<?php echo $endtime?>"/></div>
      </div>
      <div class="kuan2">
         <div class="leftcenter2"></div>
        <div class="leftcenter font">输入标题：</div>
        <div class="leftbig"><input type="text" name="textxiu"  value="<?php echo $chabiaoti?>" style="width:500px;height:30px;display:block;"/></div>
        <div><input type="hidden" name="time" id="timexiu" value="<?php echo date("Y-m-d")?>" / ></div>
        <input type="hidden" name="idxiu" value="<?php echo $id?>" />
      </div>
      <div class="kuan2">
        <div class="leftcenter2"></div>
        <div class="leftcenter font">内容添加：</div>
        <div class="leftbig">
         <textarea name="contentxiu" cols="50" rows="20" placeholder="<?php echo $chaneirong?>" style="width:500px;height:200px;display:block;"><?php echo $chaneirong?></textarea>
<!--  上传文件 <input type="file"></input></br> -->
         </div>
       
       </div>
       <div style="width: 200;height: 200px;"></div>
        <div class="kuan2">
         <div class="leftcenter2"></div>
         <div class="leftcenter2 font">
           <input type ="submit"  name="submitxiu" value="修改" class="button"  />
        
         </div>
        </div>
    </form>
 

</div>
