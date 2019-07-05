<?php 
header("Content-Type: text/html;charset=utf-8");
use yii\helpers\Html;
$conn=mysqli_connect('hdm121115553.my3w.com','hdm121115553','swt62899308swt','hdm121115553_db');
  if($conn->connect_errno){
      die('连接失败'.$conn->connect_errno);
  }
  $conn->set_charset('utf8');
$name=$_GET['name'];
echo $name;

$item2="select * from auth_item where type=2 and description like '%学员%' ";
$items2=mysqli_query($conn,$item2);

$item3="select * from auth_item where type=2 and description like '%老师%' limit 7";
$items3=mysqli_query($conn,$item3);

$item32="select * from auth_item where type=2 and description like '%老师%' limit 7,9";
$items32=mysqli_query($conn,$item32);

$item4="select * from auth_item where type=2 and description like '%课程%' limit 7";
$items4=mysqli_query($conn,$item4);

$item5="select * from auth_item where type=2 and name like '%tongzhi%' order by description limit 8";
$items5=mysqli_query($conn,$item5);

$item6="select * from auth_item where type=2 and description like '%权限%' limit 7";
$items6=mysqli_query($conn,$item6);

$item7="select * from auth_item where type=2 and description like '%教务%' limit 7";
$items7=mysqli_query($conn,$item7);


?> 
<script type="text/javascript" src="http://www.qingyingtech.cn/swt/backend/web/statics/js/jquery-1.4.2.min.js"></script>
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
  font-size: 15px;
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
  width: 300px;
  float:left;
  display: inline;
  height:30px;
  text-align:center;
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
.button link{
  font:#fff !important;
}


.kuan{
  width:1000px;
  height: 50px;
  text-align: center;
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

</style>

<div class="container">
  <div class="juli"></div>
  <div class="ziti">四物堂---权限更新</div>
    <img src="/swtmanager/backend/web/statics/images/top.jpg" width="1100" height="82" border="0" usemap="#Map" />
<map name="Map" id="Map"><area shape="rect" coords="3,3,192,78" href="/swtmanager/backend/web/index.php?r=usermobile/register" />
<area shape="rect" coords="229,4,420,78" href="/swtmanager/backend/web/index.php?r=usermobile/main" /><area shape="rect" coords="454,3,643,79" href="/swtmanager/backend/web/index.php?r=teacher/main" /><area shape="rect" coords="679,5,863,80" href="/swtmanager/backend/web/index.php?r=tongzhi/main" /><area shape="rect" coords="902,4,1091,78" href="#" /></map>
  <div class="juli"></div>
</div>
<div class="juli"></div>

<form action="/swtmanager/backend/web/index.php?r=rbac/rolesok" method="post">
<div class="main">   
    <div class="kuan">
    <div class="juli"></div>
      <div class="left">&nbsp;</div>
      <div class="zitimin">职务:&nbsp;
           <?php echo $name?>
           <input type="hidden" name="teacher" value=<?php echo $name?>>
      </div>
  </div>
  <div class="juli"></div>
  <div class="kuan">
    <div class="left">&nbsp;</div>
    <div class="zitimin"  style="float:left;">选择学员管理: &nbsp;
        <?php 
           while($xue=mysqli_fetch_array($items2)){
                $xuesheng=$xue['description'];
                $xueweb=$xue['name'];           
        ?>
        <input type="checkbox" name="students[]"  <?php 
          $item21="select * from auth_item_child where parent='".$name."' and child='".$xueweb."' ";
          $items21=mysqli_query($conn,$item21);
          $itnums=mysqli_num_rows($items21);       
          if($itnums>0){ echo "checked";}            
               ?> value="<?php echo $xueweb?>"/>&nbsp;<?php echo $xuesheng?>&nbsp;&nbsp;
        <?php 
            }
        ?>
    </div>
  </div>

  <div class="kuan">
    <div class="left">&nbsp;</div>
    <div class="zitimin"  style="float:left;">选择老师管理: &nbsp;
        <?php 
           while($teacher=mysqli_fetch_array($items3)){
                $teachersheng=$teacher['description'];
                $teacherweb=$teacher['name'];
        ?>
        <input type="checkbox" name="teachers[]" 
          <?php 
          $item22="select * from auth_item_child where parent='".$name."' and child='".$teacherweb."' ";
          $items22=mysqli_query($conn,$item22);
          $itnums2=mysqli_num_rows($items22);       
          if($itnums2>0){ echo "checked";}            
               ?>
         value="<?php echo $teacherweb?>"/>&nbsp;<?php echo $teachersheng?>&nbsp;&nbsp;
        <?php 
            }
        ?>
    </div>
  </div>

  <div class="kuan">
    <div class="left">&nbsp;</div>
    <div class="zitimin"  style="float:left;">
    <div class="leftmiddle">&nbsp;</div>
        <?php 
           while($teacher2=mysqli_fetch_array($items32)){
                $teachersheng2=$teacher2['description'];
                $teacherweb2=$teacher2['name'];
        ?>
        <input type="checkbox" name="teachers2[]"  
           <?php 
          $item23="select * from auth_item_child where parent='".$name."' and child='".$teacherweb2."' ";
          $items23=mysqli_query($conn,$item23);
          $itnums3=mysqli_num_rows($items23);       
          if($itnums3>0){ echo "checked";}            
               ?>
        value="<?php echo $teacherweb2?>"/>&nbsp;<?php echo $teachersheng2?>&nbsp;&nbsp;
        <?php 
            }
        ?>
    </div>
  </div>
 
<div class="kuan">
    <div class="left">&nbsp;</div>
    <div class="zitimin"  style="float:left;">选择课程管理: &nbsp;
        <?php 
           while($kecheng=mysqli_fetch_array($items4)){
                $kcdes=$kecheng['description'];
                $kcname=$kecheng['name'];
        ?>
        <input type="checkbox" name="courses[]" 
          <?php 
          $item24="select * from auth_item_child where parent='".$name."' and child='".$kcname."' ";
          $items24=mysqli_query($conn,$item24);
          $itnums4=mysqli_num_rows($items24);       
          if($itnums4>0){ echo "checked";}            
               ?>
         value="<?php echo $kcname?>"/>&nbsp;<?php echo $kcdes?>&nbsp;&nbsp;
        <?php 
            }
        ?>
    </div>
  </div>

<div class="kuan">
    <div class="left">&nbsp;</div>
    <div class="zitimin"  style="float:left;">选择通知管理: &nbsp;
        <?php 
           while($tongzhi=mysqli_fetch_array($items5)){
                $tzdesc=$tongzhi['description'];
                $tzname=$tongzhi['name'];
        ?>
        <input type="checkbox" name="tongzhis[]" 
           <?php 
          $item25="select * from auth_item_child where parent='".$name."' and child='".$tzname."' ";
          $items25=mysqli_query($conn,$item25);
          $itnums5=mysqli_num_rows($items25);       
          if($itnums5>0){ echo "checked";}            
               ?>
         value="<?php echo $tzname?>"/>&nbsp;<?php echo $tzdesc?>&nbsp;&nbsp;
        <?php 
            }
        ?>
    </div>
  </div>

   <div class="kuan">
    <div class="left">&nbsp;</div>
    <div class="zitimin"  style="float:left;">选择教务管理: &nbsp;
        <?php 
           while($jiaowu=mysqli_fetch_array($items7)){
                $jwdesc=$jiaowu['description'];
                $jwname=$jiaowu['name'];
        ?>
        <input type="checkbox" name="jiaowus[]"  
            <?php 
          $item26="select * from auth_item_child where parent='".$name."' and child='".$jwname."' ";
          $items26=mysqli_query($conn,$item26);
          $itnums6=mysqli_num_rows($items26);       
          if($itnums6>0){ echo "checked";}            
               ?>
        value="<?php echo $jwname?>"/>&nbsp;<?php echo $jwdesc?>&nbsp;&nbsp;
        <?php 
            }
        ?>
    </div>
  </div>

  <div class="kuan">
    <div class="left">&nbsp;</div>
    <div class="zitimin"  style="float:left;">选择权限管理: &nbsp;
        <?php 
           while($quanxian=mysqli_fetch_array($items6)){
                $qxdesc=$quanxian['description'];
                $qxname=$quanxian['name'];
        ?>
        <input type="checkbox" name="quanxians[]" 
            <?php 
          $item27="select * from auth_item_child where parent='".$name."' and child='".$qxname."' ";
          $items27=mysqli_query($conn,$item27);
          $itnums7=mysqli_num_rows($items27);       
          if($itnums7>0){ echo "checked";}            
               ?>
         value="<?php echo $qxname?>"/>&nbsp;<?php echo $qxdesc?>&nbsp;&nbsp;
        <?php 
            }
        ?>
    </div>
  </div>
<div class="kuan">
  <div class="left">&nbsp;</div>
  <input type ="submit"  name="submitxiu" value="修改" class="button ziti"  />
</div>
</div>
</form>
