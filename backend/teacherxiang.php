<?php 
header("Content-type: text/html; charset=utf-8"); 
$conn=mysqli_connect('hdm121115553.my3w.com','hdm121115553','swt62899308swt','hdm121115553_db');
  if($conn->connect_errno){
      die('连接失败'.$conn->connect_errno);
  }
  $conn->set_charset('utf8');

$createdtime=date("Y-m-d",time());
   $id=$_REQUEST['id'];
     $week=$_REQUEST['week'];
    $duan=$_REQUEST['duan'];
    $keid=$_REQUEST['keid'];

 $jb="SELECT * FROM admin where id='".$id."'";
  $ls=mysqli_query($conn,$jb);
  while($teach=mysqli_fetch_array($ls)){
  	   $teacher=$teach['m_name'];
  	   $tel=$teach['m_tel'];

       $tid=$teach['id'];
       //统计上课人数
  }
 $pageSize = 10;   //每页显示的数量
  $rowCount = 0;   //要从数据库中获取
  $pageNow = 1;    //当前显示第几页
   
  //如果有pageNow就使用，没有就默认第一页。
  if (!empty($_GET['pid'])){
    $pageNow = $_GET['pid'];

  }


//获取总记录
 $sql1 = "select count(id) from kecheng where teacherid='".$id."' and zq='".$week."' and duan='".$duan."' and keid='".$keid."'";
  $res1 = mysqli_query($conn,$sql1);
   
  if($row1=mysqli_fetch_row($res1)){
    $rowCount = $row1[0];
 
    echo "<br>";
  }else{
     echo "no";
  }

//计算共有多少页，ceil取进1
  $pageCount = ceil(($rowCount/$pageSize));
   
  $pre = ($pageNow-1)*$pageSize;


//搜索
  $submit=isset($_POST["submit"])?$_POST["submit"]:'';
  $begin=isset($_POST["begin"])?$_POST["begin"]:'';
  $kecheng=isset($_POST["kecheng"])?$_POST["kecheng"]:'';

  if($submit<>''){
    $sid=isset($_POST["sid"])?$_POST["sid"]:'';
    $sweek=isset($_POST["sweek"])?$_POST["sweek"]:'';
    $sduan=isset($_POST["sduan"])?$_POST["sduan"]:'';

    $xinxi="select b.kname,a.teacherid,a.tiao,a.close,a.duan,a.keid from kecheng  a,ke b where a.teacherid='".$id."' and  a.duan='".$duan."' and a.zq='".$week."' and a.keid='".$keid."' and a.date='".$begin."' and b.kname like '%".$kecheng."%' and a.keid=b.id ";
    $teachers=mysqli_query($conn,$xinxi);
    }else{

    $xinxi="select b.kname,a.teacherid,a.tiao,a.close,a.duan,a.keid from kecheng a,ke b where a.teacherid='".$id."' and  a.duan='".$duan."' and a.zq='".$week."' and a.keid='".$keid."' and a.keid=b.id ";
    $teachers=mysqli_query($conn,$xinxi);

    }

    //更换手机号
  $submit6=isset($_POST["submit6"])?$_POST["submit6"]:'';
  $newtel=isset($_POST["telephone"])?$_POST["telephone"]:'';
  $xueshengid=isset($_POST["xueshengid"])?$_POST["xueshengid"]:'';

 

  if($submit6<>''){
     $change="UPDATE admin SET m_tel='".$newtel."' where id='".$xueshengid."'";
  $changes=mysqli_query($conn,$change);
  	echo "<script>alert('更换手机号成功！');window.close(this);</script>";
  }

  //恢复原始密码
  $submit2=isset($_POST["submit4"])?$_POST["submit4"]:'';
  $mimaid=isset($_POST["mimaid"])?$_POST["mimaid"]:'';

  if($submit2<>''){
  $update="UPDATE admin SET password='000000' where id='".$mimaid."'";
  $ok=mysqli_query($conn,$update);
  echo "<script>alert('恢复原始密码成功！');window.close(this);</script>";
}

//关闭课程
 $submit5=isset($_POST["submit5"])?$_POST["submit5"]:'';
 if($submit5<>''){
 	if($lclose==0){$closeid=1;}else{$closeid=0;}
  $update2="UPDATE kecheng SET close='".$closeid."' where teacherid='".$tid."' and keid='".$keid."' and duan='".$duan."' and zq='".$wek."'";
  $ok2=mysqli_query($conn,$update2);

  $update3="UPDATE course SET closed='".$closeid."' where teacherid='".$tid."' and kid='".$keid."' and ktime='".$duan."' and week='".$wek."'";
  $ok3=mysqli_query($conn,$update3);

  echo "<script>alert('关闭课程成功！');window.close(this);</script>";
 }

?>
<script type="text/javascript" src="http://www.siwutang.vip/swtmanager/backend/web/statics/js/jquery-1.4.2.min.js"></script>
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
  font-size: 14px;
  font-family: 微软雅黑;
}
.zitismall{
  font-size: 12px;
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
  height:100px;
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

background:#7CC7EA;;/*背景色*/
font-size: 14px;
color:white;/*字体颜色*/
width:50px;
height:25px;

}
a{
  text-decoration:none;
}
body{

  font-family: 微软雅黑;
  
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
            top:0%; 
            left: 25%; 
            width: 30%; 
            height: 55%; 
            padding: 20px; 
           border-radius: 30px;
            background-color:#efefef; 
            z-index:1002; 
            overflow: auto; 
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
   <div class="kuang ziti">
        <div style="width: 150px;height: 30px;float:left;">&nbsp;</div>
        <div style="float:left;width: 150px;height: 30px;">老师名：<?php echo  $teacher ?></div>
        <div style="float:left;width: 200px;height: 30px;">手机号：<?php echo $tel ?></div>
        <div style="float:left;width: 200px;height: 30px;"> </div>
        <div style="float:left;width: 150px;height: 30px;">&nbsp;</div>
        <div style="float:left;width: 150px;height: 30px;"><a href="JavaScript:void(0)" onclick = "openDialog()">恢复原始密码</a></div>
        
        <!-- 恢复原始密码 -->
         <div id="light" class="white_content ziti">
         <div style="margin:auto;">
            <form action="http://www.siwutang.vip/teacherxiang.php?id=<?php echo $tid ?>&week=<?php echo $week?>&duan=<?php echo $duan?>&keid=<?php echo $keid?>" method="post">
             <div class="left">&nbsp;　</div>
             <div class="leftmiddle">
              <div> 你确定恢复原始密码吗？</div>
               
              <input type="hidden" name="mimaid" value=<?php echo $tid ?> />
                <div>
              <p></p>
              <p></p>
            
              <input type="submit" value="提交" name='submit4' style=" cursor:pointer;width:60px; height:20px; border:0px; background-color: #7CC7EA;background-repeat:no-repeat; font-size:14px; color:#FFF;">&nbsp &nbsp &nbsp &nbsp &nbsp    <input style=" cursor:pointer;width:60px; height:20px; border:0px; background-color: #7CC7EA;; background-repeat:no-repeat; font-size:14px; color:#FFF;" type="reset" value="取消" onclick = "closeDialog()">
              </div>
              </div>
            </form>
            </div>
         </div>



   <!-- 是否接受close -->

      <div id="light2" class="white_content">
            <div style="margin:auto;">
               <form action="http://www.siwutang.vip/teacherxiang.php?id=<?php echo $tid ?>&week=<?php echo $week?>&duan=<?php echo $duan?>&keid=<?php echo $keid?>" method="post">
               <div class="left">&nbsp;　</div>
               <div class="leftmiddle">
              <div> <?php if($lclose==0){echo '你确定关闭此课程吗？';}else{echo '你确定开启此课程吗？';} ?></div>
    

              <div>
                <p></p>
              <p></p>
              <input type="submit" value="提交" name='submit5' style=" cursor:pointer;width:60px; height:20px; border:0px; background-color: #7CC7EA; background-repeat:no-repeat; font-size:14px; color:#FFF;">&nbsp &nbsp &nbsp &nbsp &nbsp    <input style=" cursor:pointer;width:60px; height:20px; border:0px; background-color: #7CC7EA;; background-repeat:no-repeat; font-size:14px; color:#FFF;" type="reset" value="取消" onclick = "closeDialog2()">
              </div>
              </div>
            </form>
           </div>
          </div>

   <
    <div class="kuan ">
	            <table border="1" width="1000" style="background-color: white;">
	              <thead class="ziti">
	                <tr>             
	                  <th>上课课程</th>                         
	                   <th>时间段</th>	                  
	                   <th>是否接受调课</th>
                     <th>是否关闭</th>
	                </tr>
	              </thead>
 <?php 
                  while($listteacher=mysqli_fetch_array($teachers)){
                       $lkname=$listteacher['kname'];
                       $lduan=$listteacher['duan'];
	                    
                       $ltiao=$listteacher['tiao'];
                       $lclose=$listteacher['close'];
                       $lkid=$listteacher['keid'];
                   
	              ?>
	              <tr class="zitismall">

	               <td><?php echo $lkname?></td>
	                <td><?php echo $lduan?></td>
	                
	                <td><?php 
                    if ($ltiao==0){
                       echo "是";
                     }else{
                        echo "否";
                     }
                  ?></td>
                  <td><a href="JavaScript:void(0)" onclick = "openDialog2()" ><?php 
                    if ($lclose==1){
                       echo "是";
                     }else{
                        echo "否";
                     }
                  ?></a></td>
	                
	            
	             
	              </tr>
                <?php } ?>
	            </table>
	        </div>

	        <script  type="text/javascript" >
          
			function openDialog(){
            document.getElementById('light').style.display='block';
            document.getElementById('fade').style.display='block';
           
        }
 
        function closeDialog(){
            document.getElementById('light').style.display='none';
            document.getElementById('fade').style.display='none'
        }    
           function openDialog2(){
            document.getElementById('light2').style.display='block';
            document.getElementById('fade2').style.display='block';
           
        }
 
        function closeDialog2(){
            document.getElementById('light2').style.display='none';
            document.getElementById('fade2').style.display='none'
        }
           function openDialog3(){
            document.getElementById('light3').style.display='block';
            document.getElementById('fade3').style.display='block';
           
        }
 
        function closeDialog3(){
            document.getElementById('light3').style.display='none';
            document.getElementById('fade3').style.display='none'
        }


	        </script>