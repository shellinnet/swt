<?php 
use yii\helpers\Html;
$conn=mysqli_connect('hdm121115553.my3w.com','hdm121115553','swt62899308swt','hdm121115553_db');
  if($conn->connect_errno){
      die('连接失败'.$conn->connect_errno);
  }
  $conn->set_charset('utf8');

//接受传递过来的值
$tid=$_REQUEST['tid'];  //老师id
$keid=$_REQUEST['keid'];  //课程id
$time=$_REQUEST['time']; 
$ktime=$_REQUEST['ktime']; //时段
$last=$_REQUEST['last']; //几个空位

//老师  
$ls="SELECT id,m_name FROM admin where leibie='老师' and m_name<>'' and id=$tid ";
$tech=mysqli_query($conn,$ls);
while($tname=mysqli_fetch_array($tech)){
     $tnames=$tname['m_name'];
}

//课程名及调课信息
$kc="select a.*,c.kname,b.close from course a,kecheng b, ke c where a.kid=b.keid and a.teacherid='".$tid."' and a.ktime='".$ktime."' and a.time='".$time."' and b.close=0 and b.keid='".$keid."' and a.kid=b.keid and a.kid=c.id  group by kid";
$kecheng=mysqli_query($conn,$kc);
while($kk=mysqli_fetch_array($kecheng)){
     $kkname=$kk['kname'];
     $kktiao=$kk['close'];
    
}
?>
<style>
.container{
    width:1120px;
    height:150px;
    border:1px #8A8A8A solid;
    background-color:#fff;
    margin-left:15px;
    border-radius:5px;
   }
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
.main{
    width:1120px;
    height:500px;
    border:1px #8A8A8A solid;
    background-color:#fff;
    margin-left:15px;
    border-radius:5px;
}
.kuang{
	width:400px;
	height:30px;
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
  text-align: right;
}
.leftcenter{
  width: 100px;
  float:left;
  display: inline;
  height:30px;
  text-align:center;
  margin-top:5px;
}
.button{

background:#259dab;/*背景色*/
font-size: 14px;
color:white;/*字体颜色*/
width:85px;
height:28px;
border-radius:10px;
cursor:pointer;
border:2px;

}

.kuan{
  width:400px;
  height: 50px;
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
.long{
  width: 195px;
  height: 30px;
}
.long2{
  width: 240px;
  height: 30px;
}
.da{
  width: 450px;
  height: 500px;
   float:left;
  display: inline;
}
.daright{
  width: 450px;
  height: 500px;
    float:left;
  display: inline;
}

</style>
<div class="container">
  <div class="juli"></div>
  <div class="ziti">四物堂---排课信息修改</div>
    <img src="/swtmanager/backend/web/statics/images/top.jpg" width="1100" height="82" border="0" usemap="#Map" />
<map name="Map" id="Map"><area shape="rect" coords="3,3,192,78" href="/swtmanager/backend/web/index.php?r=usermobile/register" />
<area shape="rect" coords="229,4,420,78" href="/swtmanager/backend/web/index.php?r=usermobile/main" /><area shape="rect" coords="454,3,643,79" href="/swtmanager/backend/web/index.php?r=teacher/main" /><area shape="rect" coords="679,5,863,80" href="/swtmanager/backend/web/index.php?r=tongzhi/main" /><area shape="rect" coords="902,4,1091,78" href="/swtmanager/backend/web/index.php?r=admin/main" /></map>
  <div class="juli"></div>
</div>
<div class="juli"></div>
<div class="main">
<div class="da">
<form action="/swtmanager/backend/web/index.php?r=kecheng/tiaozheng" method="post">
    <div class="juli"></div>
    <div class="kuang">
        <div class="left">&nbsp;</div>
        <div class="leftmiddle">上课日期：<input   name="text" type="text" readonly = "readonly"  value="<?php echo $time?>" /></div>
         
        <input type="hidden" name="teacherid" readonly = "readonly" value="<?php echo $tid?>" />
         <input type="hidden" name="keid" readonly = "readonly" value="<?php echo $keid?>" />
    </div>

    <div class="juli"></div>
    <div class="kuang">
      <div class="left">&nbsp;</div>
      <div class="leftmiddle">老师名：<input type="text" name="teacher" readonly = "readonly" value="<?php echo $tnames?>" /></div> 
    </div>
    <div class="juli"></div>
    <div class="kuang">
        <div class="left">&nbsp;</div>
        <div class="leftmiddle">课程名：<input type="text" name="kecheng" readonly = "readonly" value="<?php echo $kkname?>" />       
        </div>      
	</div>
    <div class="juli"></div>
    <div class="kuang">
        <div class="left">&nbsp;</div>
        <div class="leftmiddle">上课时段：<input type="text" name="shiduan" readonly = "readonly" value="<?php echo $ktime?>" />
        <div class="left">&nbsp;</div>
        </div>
    </div>
  <div class="juli"></div>
    <div class="kuang">
      <div class="left">&nbsp;</div>
      <div class="leftmiddle">添加学员名：<input type="text" name="xueyuan" placeholder="请输入学员名" /></div>
    </div>
    <div class="juli"></div>
       <div class="kuang">
    
        <div class="leftmiddle long">是否关闭课程：
       
        <select name="jieshou">
           <option value =$kktiao><?php if($kktiao==0){echo "否";}else{ echo "是";}?></option>
           <option value ="0">否</option>
           <option value ="1">是</option>         
        </select>
        </div>       

	</div>

    <div class="juli"></div>
   <div class="kuang">

 
    <div class="leftmiddle long2"><input type ="submit"  name="submit" value="修改" class="button" /></div>

    </div>
    <div class="juli"></div>
    <div class="kuang">
     <div class="juli"></div>
      <div class="juli"></div>
     
        <div class="leftmiddle"><a href="http://www.siwutang.vip/swtmanager/backend/web/index.php?r=kecheng/kebiao">返回普通课程的课表</a></div>
        <div class="left">&nbsp;</div>
        
    </div>
</form> 
</div>
<div class="daright">
<div class="juli"></div>
 <div >上课的所有学员：</div>

 <?php

 $kc2="select * from course where ktime='".$ktime."' and teacherid='".$tid."' and time='".$time."'  and kid='".$keid."' and xueyuan<>''";
$kecheng2=mysqli_query($conn,$kc2);
 while($hh=mysqli_fetch_array($kecheng2)){
     
     $kxueyuan=$hh['xueyuan'];


 ?>
   <div >&nbsp;　　　<?php echo $kxueyuan?></div>
   <?php
}
   ?>
</div>
</div>
