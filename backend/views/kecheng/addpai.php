<?php 
use yii\helpers\Html;
$conn=mysqli_connect('hdm121115553.my3w.com','hdm121115553','swt62899308swt','hdm121115553_db');
  if($conn->connect_errno){
      die('连接失败'.$conn->connect_errno);
  }
  $conn->set_charset('utf8');
//老师  
$ls="SELECT id,m_name FROM admin where leibie='老师' and m_name<>'' order by id desc ";
$tech=mysqli_query($conn,$ls);

//课程
$kc="SELECT id,kname FROM ke ";
$kecheng=mysqli_query($conn,$kc);

//老师注册
$submit=isset($_POST["submit"])?$_POST["submit"]:'';
$teacherphone=isset($_POST["teacherphone"])?$_POST["teacherphone"]:'';
$teachername=isset($_POST["teachername"])?$_POST["teachername"]:'';
$createdtime=time();

if($teacherphone<>''){
$ls="INSERT INTO admin(username,password,created_at,m_tel,m_name,status,leibie) VALUES('".$teacherphone."','000000','".$createdtime."','".$teacherphone."','".$teachername."','10','老师')";
$teacher=mysqli_query($conn,$ls);

$df="select max(id) from admin";
$dfs=mysqli_query($conn,$df);
while($ddf=mysqli_fetch_array($dfs)){
    $id=$ddf['max(id)'];
    $kc="INSERT INTO kecheng(keid,kname,teacherid) VALUES('0','暂无课程','".$id."')";
    $kcs=mysqli_query($conn,$kc);
}

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
	width:1100px;
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
  width:1000px;
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


</style>
<div class="container">
  <div class="juli"></div>
  <div class="ziti">四物堂---老师课程添加</div>
    <img src="/swtmanager/backend/web/statics/images/top.jpg" width="1100" height="82" border="0" usemap="#Map" />
<map name="Map" id="Map"><area shape="rect" coords="3,3,192,78" href="/swtmanager/backend/web/index.php?r=usermobile/register" />
<area shape="rect" coords="229,4,420,78" href="/swtmanager/backend/web/index.php?r=usermobile/main" /><area shape="rect" coords="454,3,643,79" href="/swtmanager/backend/web/index.php?r=teacher/main" /><area shape="rect" coords="679,5,863,80" href="/swtmanager/backend/web/index.php?r=tongzhi/main" /><area shape="rect" coords="902,4,1091,78" href="/swtmanager/backend/web/index.php?r=admin/main" /></map>
  <div class="juli"></div>
</div>
<div class="juli"></div>
<div class="main">
<form action="/swtmanager/backend/web/index.php?r=kecheng/addpaiok" method="post">
    <div class="juli"></div>
    <div class="kuang">
        <div class="left">&nbsp;</div>
        <div class="leftmiddle">开课日期：<input id="time" name="date" type="date" ></div>
        <div class="left">&nbsp;</div>
        <div class="leftmiddle">选择课程：    <select name="teacherid">
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
    </div>
    <div class="juli"></div>
    <div class="kuang">
        <div class="left">&nbsp;</div>
        <div class="leftmiddle">选择老师：
            <select name="teacherid">
              <?php
                while($hh=mysqli_fetch_array($tech)){
                $hj=$hh['m_name'];
                $hjid=$hh['id'];
                
                    ?>
                <option value =<?php echo $hjid?>><?php echo $hj?></option>
             <?php
                    } 
                ?>
            </select> 
        </div>
        <div class="left">&nbsp;</div>
       <div class="leftmiddle">上课学员名：<input type="text" name="xueyuan" placeholder="请输入上课学员名" /></div>

	</div>
 
	<div class="juli"></div>
       <div class="kuang">
        <div class="left">&nbsp;</div>
        <div class="leftmiddle">选择上课时段：<input type="checkbox" name="sd[]"  value="10：00 ~ 12：00">10：00 ~ 12：00</div>
        <div class="left">&nbsp;</div>
         <div class="leftmiddle"><input type="checkbox" name="sd[]"  value="13：30 ~ 15：30"/>13：30 ~ 15：30</div>
	</div>
    <div class="juli"></div>
    <div class="kuang">
        <div class="left">&nbsp;</div>
        <div style="width: 85px;height: 30px;float: left;">&nbsp;</div>
        <div style="width: 195px;height: 30px;float: left;"><input type="checkbox" name="sd[]"  value="15：30 ~ 17：30"/>15：30 ~ 17：30</div>

         <div class="leftmiddle"><input type="checkbox" name="sd[]"  value="19：00 ~ 21：00"/>19：00 ~ 21：00</div>
	</div>
    <div class="juli"></div>
    <div class="left">&nbsp;</div>
    <input type ="submit"  name="submit3" value="添加" class="button" />
    <div class="julibig"></div>
        <div class="kuan"></div>
    </div>
</form> 
</div>
