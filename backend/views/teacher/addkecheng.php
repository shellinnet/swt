<?php 
use yii\helpers\Html;
$conn=mysqli_connect('hdm121115553.my3w.com','hdm121115553','swt62899308swt','hdm121115553_db');
  if($conn->connect_errno){
      die('连接失败'.$conn->connect_errno);
  }
  $conn->set_charset('utf8');

  $id=$_REQUEST['id'];

//老师  
$ls="SELECT * FROM admin where id='".$id."' ";
$tech=mysqli_query($conn,$ls);
while($hh=mysqli_fetch_array($tech)){
     $hj=$hh['m_name'];
     $hjid=$hh['id'];
}

//课程
$ke="select * from ke  ";
$kecheng=mysqli_query($conn,$ke);
?>
<style>
.juli{
  width: 300px;
  height: 15px;
}
.julibig{
  width: 300px;
  height:300px;
}
.juli2{
  width: 300px;
  height: 30px;
}
.kuang{
	 width:75%;
  height:30px;
 margin: auto;
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
.rightcenter{
  width: 150px;
  float:left;
  display: inline;
  height:30px;
 text-align: right;
 font-size:14px;
}
.leftcenter{
  width: 100px;
  float:left;
  display: inline;
  height:30px;
 text-align: left;
 font-size:14px;
}

.leftcenter2{
  width: 180px;
  float:left;
  display: inline;
  height:30px;
 text-align: left;
 font-size:14px;
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

.shuru{
  width: 180px;
  height: 30px;
}
.nei{
  margin:12px;
  background-color:#eee;
  width:98%;
    height:95%;
}
.inline{
  margin: auto;
  width:58%;
  height: 30px;
  background-color:#eee;
} 
.left{
  display:inline;
  width: 200px;
  line-height: 30px;
  background-color:#eee;
  float:left;
}
.left1{
  display:inline;
  width: 100px;
  line-height: 30px;
  background-color:#eee;
  float:left;
}
.right{
  display:inline;
  width: 200px;
  line-height: 30px;
  background-color:#eee;
  float:right;
}
.center{
  width:100%;
  margin: auto;
 
}
.ziti{
  font-size: 16px;
  font-family: 微软雅黑;
}
</style>

<div class="main ziti">
<div class="nei">
 <div class="juli2"></div>
 <div class="kuan"><a href="http://www.siwutang.vip/swtmanager/backend/web/index.php?r=teacher/teachermsg">返回老师课程添加</a></div>

<form action="/swtmanager/backend/web/index.php?r=teacher/kechengok" method="post">
 
<!--     <div class="inline ziti">
     <div class="left">老师课程添加</div>
     

    </div> -->

    <div class="kuang">
    

      <input id="teacherid" name="teacherid" value=<?php echo $id?>  type="hidden">
       <div class="left">&nbsp;</div>
        <div class="rightcenter">老师：&nbsp; </div>
        <div class="leftcenter"><?php echo $hj?></div>
             
    </div>
   <p></p>
     <div class="kuang">
      <div class="left">&nbsp;</div>
        <div class="rightcenter">上课日期：</div>
        <div class="leftcenter">
            <select name="date" class="shuru">
                <option value ="周三">周三</option>
                <option value ="周四">周四</option>
                <option value ="周五">周五</option>
                <option value ="周六">周六</option>
                <option value ="周日">周日</option>
            </select>
        </div>
    </div>

    <div class="juli"></div>
    <div class="juli"></div>
    <div class="kuang">
        <div class="left">&nbsp;</div>
        <div class="rightcenter">选择课程：</div>
        <div class="leftcenter2">
            <select name="knameid" class="shuru">
              <?php
                    while($tk=mysqli_fetch_array($kecheng)){
                           $tkecheng=$tk['kname'];
                           $tkid=$tk['id'];

                    ?>
                <option value =<?php echo $tkid?>><?php echo $tkecheng?></option>
             <?php
                    } 
                ?>
            </select> 
        </div>
        <div class="left">&nbsp;</div>      

	</div>

    <div class="juli"></div>
      <div class="kuang">
      <div class="left">&nbsp;</div>
        <div class="rightcenter">是否接受调课：</div>
        <div class="leftcenter">
            <select name="tiao" class="shuru">
                <option value="0">是</option>
                <option value="1">否</option>
            </select>
        </div>
       
    </div>
   
    <div class="juli"></div>
    <div class="kuang">
        <div class="left">&nbsp;</div>
       <div class="rightcenter">一堂课最大上课人数：</div>
       <div class="leftcenter">
       <input type="text" name="num" placeholder="请输入上课人数" class="shuru" /></div>
             
	  </div>
  
   	<div class="juli"></div>
       <div class="kuang">
        <div class="left">&nbsp;</div>
        <div class="rightcenter">选择上课时段：</div>
        <div class="leftcenter">
        <input type="checkbox" name="sd[]"  value="10:00-12:00">10:00-12:00</div>
        <div class="left1">&nbsp;</div>
         <div class="leftcenter"><input type="checkbox" name="sd[]"  value="13:30-15:30"/>13:30-15:30</div>
	</div>
    
    <div class="kuang">
        <div class="left">&nbsp;</div>
        <div class="rightcenter">&nbsp;</div>
        <div class="leftcenter"><input type="checkbox" name="sd[]"  value="15:30-17:30"/>15:30-17:30</div>
         <div class="left1">&nbsp;</div>
         <div class="leftcenter"><input type="checkbox" name="sd[]"  value="19:00-21:00"/>19:00-21:00</div>
	</div>
    <div class="juli"></div>
    <div class="kuang">
    <div class="left">&nbsp;</div>
    <div class="rightcenter">&nbsp;</div>
    <div class="leftcenter">
    <input type ="submit"  name="submit3" value="添加课程" class="button " />
    </div>
    </div>
    <div class="julibig"></div>
        <div class="kuan"></div>
    </div>
</form> 
</div>
</div>