<?php 
use yii\helpers\Html;
$conn=mysqli_connect('hdm121115553.my3w.com','hdm121115553','swt62899308swt','hdm121115553_db');
  if($conn->connect_errno){
      die('连接失败'.$conn->connect_errno);
  }
  $conn->set_charset('utf8');

$id=$_REQUEST['id'];
$duan=$_REQUEST['duan'];
$keid=$_REQUEST['keid'];


//根据id查询传过来老师课程信息
$ls="SELECT a.zq,a.duan,a.tiao,a.close,b.m_name,c.kname FROM kecheng a,admin b,ke c where a.teacherid='".$id."' and a.duan='".$duan."' and a.keid='".$keid."' and a.teacherid=b.id and a.keid=c.id group by c.kname";
$laoshi=mysqli_query($conn,$ls);
while($lao=mysqli_fetch_array($laoshi)){
     $lkname=$lao['kname'];
     $lname=$lao['m_name'];
     $lweek=$lao['zq'];
     $lduan=$lao['duan'];
     $ltiao=$lao['tiao'];
     $lclose=$lao['close'];
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
  text-align:left;  
}
.rightcenter{
  width: 100px;
  float:left;
  display: inline;
  height:30px;
  text-align:right; 
}

.button{

background:#259dab;/*背景色*/
font-size: 14px;
color:#fff;/*字体颜色*/
width:100px;
height:28px;
border-radius:10px;
cursor:pointer;
border:2px;
text-align: center;
line-height: 28px;

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
<area shape="rect" coords="229,4,420,78" href="/swtmanager/backend/web/index.php?r=usermobile/main" /><area shape="rect" coords="454,3,643,79" href="/swtmanager/backend/web/index.php?r=teacher/main" /><area shape="rect" coords="679,5,863,80" href="#" /><area shape="rect" coords="902,4,1091,78" href="#" /></map>
  <div class="juli"></div>
</div>
<div class="juli"></div>
<div class="main">
<form action="/swtmanager/backend/web/index.php?r=teacher/xiang" method="post">
    <div class="juli"></div>
    <div class="kuang">
        <div class="left">&nbsp;</div>
       <div class="leftmiddle">老师课程信息修改:</div>
       <div class="juli"></div>   

    </div>
     <div class="kuang">
        <div class="left">&nbsp;</div>
        <div class="rightcenter">老师名：&nbsp; &nbsp;</div>

        <div class="leftcenter"><?php echo $lname ?> </div>
          
        <div class="juli"></div>     

      </div>
    
    <div class="kuang">
        <div class="left">&nbsp;</div>
        <div class="rightcenter">上课课程：&nbsp;&nbsp;</div>
        <div class="leftcenter">
        <?php echo $lkname?></div>
    </div>
    <div class="kuang">     
      
        <div class="left">&nbsp;</div>
       <div class="rightcenter">每周：&nbsp;&nbsp;</div>

       <div class="leftcenter"><?php echo $lweek?></div>

	  </div>
    
       <div class="kuang">
        <div class="left">&nbsp;</div>
        <div class="rightcenter">上课时段：&nbsp;&nbsp;</div>

        <div class="leftcenter"><?php echo $lduan?></div>
          
        </div>
        <div class="left">&nbsp;</div>

    <div class="juli"></div>
       <div class="kuang">
        
        <div class="rightcenter">是否接受调课：&nbsp;&nbsp;</div>
        <div class="leftcenter">
            <select name="tiaoke">
                <option selected="selected" value ="<?php echo $ltiao?>"><?php  if($ltiao==0){
                     echo "是";
                  }else{
                     echo "否";
                  }
                  ?></option>
                <option value="0">是</option>
                <option value="1">否</option>
            </select>
        </div>
        <div class="left">&nbsp;</div>
        
	</div>
      <div class="left">&nbsp;</div>
  <div class="juli"></div>
   <div class="kuang">        
        <div class="rightcenter">是否关闭课程：&nbsp;&nbsp;</div>
        <div class="leftcenter">
            <select name="closed">
                <option selected="selected" value ="<?php echo $lclose?>"><?php  if($lclose==1){
                     echo "是";
                  }else{
                     echo "否";
                  }
                  ?></option>
                <option value="1">是</option>
                <option value="0">否</option>
            </select>
        </div>
        <div class="left">&nbsp;</div>
        
  </div>
	<div><input type="hidden" name="zq"  value="<?php echo $lweek?>"></div>
  <div><input type="hidden" name="duan"  value="<?php echo $lduan?>"></div>
   <div><input type="hidden" name="tid"  value="<?php echo $id?>"></div>
   <div><input type="hidden" name="kid"  value="<?php echo $keid?>"></div>
    <div class="juli"></div>
    <div class="left">&nbsp;</div>
    <input type ="submit"  name="submitxiu" value="修改" class="button" />
    <div class="julibig"></div>
        <div class="kuan"></div>
    </div>
</form> 
</div>
