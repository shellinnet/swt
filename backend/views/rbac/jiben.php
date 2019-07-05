<?php
  
    $conn=mysqli_connect('hdm121115553.my3w.com','hdm121115553','swt62899308swt','hdm121115553_db');
	if($conn->connect_errno){
	      die('连接失败'.$conn->connect_errno);
	  }
	$conn->set_charset('utf8');
    $item="select * from auth_item where type=1";
    $items=mysqli_query($conn,$item);
 
    $item2="select * from auth_item where type=2 and description like '%学员%'";
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
<style>
 .zitimin{
    font-size: 13px;
    font-family: 微软雅黑;
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

.left{
  width: 150px;
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
  width: 240px;
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
</style>

<div class="main">
<div class="juli"></div>

<div class="juli"></div>
   <div class="kuan ziti"><a href="http://www.siwutang.vip/swtmanager/backend/web/index.php?r=rbac/quan">基本权限设置</a></div>
   <div class="juli"></div> 

<form action="/swtmanager/backend/web/index.php?r=rbac/jibenok" method="post">

    <div class="kuan">
    <div class="juli"></div>
	    <div class="left">&nbsp;</div>
	    <div class="zitimin">选择职务:&nbsp;
	         <select name="teacher" style="width:120px;height: 30px;">
	         <?php
                while($it=mysqli_fetch_array($items)){
                      $itname=$it['name'];

	         ?>
	              <option value="<?php echo $itname?>"><?php echo $itname?></option>
             <?php 
                 }
             ?>
	         </select>
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
        <input type="checkbox" name="students[]"  value="<?php echo $xueweb?>"/>&nbsp;<?php echo $xuesheng?>&nbsp;&nbsp;
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
        <input type="checkbox" name="teachers[]"  value="<?php echo $teacherweb?>"/>&nbsp;<?php echo $teachersheng?>&nbsp;&nbsp;
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
        <input type="checkbox" name="teachers2[]"  value="<?php echo $teacherweb2?>"/>&nbsp;<?php echo $teachersheng2?>&nbsp;&nbsp;
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
        <input type="checkbox" name="courses[]"  value="<?php echo $kcname?>"/>&nbsp;<?php echo $kcdes?>&nbsp;&nbsp;
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
        <input type="checkbox" name="tongzhis[]"  value="<?php echo $tzname?>"/>&nbsp;<?php echo $tzdesc?>&nbsp;&nbsp;
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
        <input type="checkbox" name="jiaowus[]"  value="<?php echo $jwname?>"/>&nbsp;<?php echo $jwdesc?>&nbsp;&nbsp;
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
        <input type="checkbox" name="quanxians[]"  value="<?php echo $qxname?>"/>&nbsp;<?php echo $qxdesc?>&nbsp;&nbsp;
        <?php 
            }
        ?>
    </div>
  </div>
<div class="kuan">
  <div class="left">&nbsp;</div>
  <input type ="submit"  name="submitxiu" value="修改" class="button ziti"  />
</div>

</form>
</div>