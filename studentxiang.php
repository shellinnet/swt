<?php 
header("Content-type: text/html; charset=utf-8"); 
$conn=mysqli_connect('hdm121115553.my3w.com','hdm121115553','swt62899308swt','hdm121115553_db');
  if($conn->connect_errno){
      die('连接失败'.$conn->connect_errno);
  }
  $conn->set_charset('utf8');

$createdtime=date("Y-m-d",time());
$id=$_REQUEST['id'];

  $jb="select a.*,b.m_name,c.kname from student a,admin b,ke c where a.teacherid=b.id and a.knameid=c.id and a.id='".$id."' ";
  $ls=mysqli_query($conn,$jb);
  while($teach=mysqli_fetch_array($ls)){
  	   $student=$teach['sname'];
  	   $tel=$teach['mobile'];
  	   $weixin=$teach['nickname'];
       $date=$teach['date'];
       $week=$teach['week'];
       $duan=$teach['duan'];
       $kname=$teach['kname'];
       $m_name=$teach['m_name'];
       $zkeshi=$teach['zkeshi'];
       $syks=$teach['syks'];
       $end=$teach['end']; 
       $id=$teach['id']; 
       $oktime=$teach['oktime']; 
       $close=$teach['close']; //课程是否关闭 
        $knameid=$teach['knameid'];
       $teacherid=$teach['teacherid'];
  }

 $allready=$zkeshi-$syks;
  //查询该学生课程是否结束
 
   if($oktime<$createdtime || $allready==$zkeshi){
     $end=1;
  }else{
    $end=0;
  }
  
  $up="UPDATE student SET end='".$end."' WHERE sname='".$student."' and knameid='".$knameid."' and teacherid='".$teacherid."'";
$ups=mysqli_query($conn,$up);


//恢复原始密码
  $submit2=isset($_POST["submit4"])?$_POST["submit4"]:'';
  $mimaid=isset($_POST["mimaid"])?$_POST["mimaid"]:'';

  

  if($submit2<>'' && $ok){
    $update="UPDATE student SET password='000000' where id='".$mimaid."'";
  $ok=mysqli_query($conn,$update);
  	echo "<script>alert('恢复原始密码成功！');</script>";
  }

 // 关闭学员
  $submit5=isset($_POST["submit5"])?$_POST["submit5"]:'';
  $mimaid=isset($_POST["studentid"])?$_POST["studentid"]:'';

  
  if($submit5<>'' && $okstudent){
    $updatestudent="UPDATE student SET close='1' where id='".$studentid."'";
  $okstudent=mysqli_query($conn,$updatestudent);
  	echo "<script>alert('关闭学员成功！');</script>";
  }


  //更换手机号
  $submit6=isset($_POST["submit6"])?$_POST["submit6"]:'';
  $newtel=isset($_POST["telephone"])?$_POST["telephone"]:'';
  $xueshengid=isset($_POST["xueshengid"])?$_POST["xueshengid"]:'';

 

  if($submit6<>'' && $changes){
     $change="UPDATE student SET mobile='".$newtel."' where id='".$xueshengid."'";
  $changes=mysqli_query($conn,$change);
  	echo "<script>alert('更换手机号成功！');</script>";
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
        <div style="float:left;width: 150px;height: 30px;">学员名：<?php echo $student ?></div>
        <div style="float:left;width: 200px;height: 30px;">手机号：<?php echo $tel ?></div>
        <div style="float:left;width: 200px;height: 30px;"><a href="JavaScript:void(0)" onclick = "openDialog3()" >更换手机号码</a></div>
        <div style="float:left;width: 150px;height: 30px;">&nbsp;</div>
        <div style="float:left;width: 150px;height: 30px;"><a href="JavaScript:void(0)" onclick = "openDialog()">恢复原始密码</a></div>
        
        <!-- 恢复原始密码 -->
         <div id="light" class="white_content ziti">
         <div style="margin:auto;">
            <form action="http://www.siwutang.vip/studentxiang.php?id=<?php echo $id ?>" method="post">
             <div class="left">&nbsp;　</div>
             <div class="leftmiddle">
              <div> 你确定恢复原始密码吗？</div>
               
              <input type="hidden" name="mimaid" value=<?php echo $id ?> />
                <div>
              <p></p>
              <p></p>
            
              <input type="submit" value="提交" name='submit4' style=" cursor:pointer;width:60px; height:20px; border:0px; background-color: #7CC7EA;background-repeat:no-repeat; font-size:14px; color:#FFF;">&nbsp &nbsp &nbsp &nbsp &nbsp    <input style=" cursor:pointer;width:60px; height:20px; border:0px; background-color: #7CC7EA;; background-repeat:no-repeat; font-size:14px; color:#FFF;" type="reset" value="取消" onclick = "closeDialog()">
              </div>
              </div>
            </form>
            </div>
         </div>
<!-- 关闭此学员 -->
          <div id="light2" class="white_content">
            <div style="margin:auto;">
               <form action="http://www.siwutang.vip/studentxiang.php?id=<?php echo $id ?>" method="post">
               <div class="left">&nbsp;　</div>
               <div class="leftmiddle">
              <div> 你确定关闭此学员吗？</div>
              <input type="hidden" name="studentid" value=<?php echo $id ?> />
              <div>
                <p></p>
              <p></p>
              <input type="submit" value="提交" name='submit5' style=" cursor:pointer;width:60px; height:20px; border:0px; background-color: #7CC7EA; background-repeat:no-repeat; font-size:14px; color:#FFF;">&nbsp &nbsp &nbsp &nbsp &nbsp    <input style=" cursor:pointer;width:60px; height:20px; border:0px; background-color: #7CC7EA;; background-repeat:no-repeat; font-size:14px; color:#FFF;" type="reset" value="取消" onclick = "closeDialog2()">
              </div>
              </div>
            </form>
           </div>
          </div>
<!-- 更换手机号 -->
  
     <div id="light3" class="white_content">
               <form action="http://www.siwutang.vip/studentxiang.php?id=<?php echo $id ?>&tel=<?php echo $tel ?>" method="post">
               <div style="margin:auto;">
               <div class="left">&nbsp;　</div>
               <div class="leftmiddle">
              <div> 更换手机号码</div>
                <p></p>
              <p></p>
              <input type="hidden" name="xueshengid" value=<?php echo $id ?> />
              <input type="text" name="telephone" value=<?php echo $tel ?> />
                <p></p>
              <p></p>
              <div>
              <input type="submit" value="提交" name='submit6' style=" cursor:pointer;width:60px; height:20px; border:0px; background-color: #7CC7EA; background-repeat:no-repeat; font-size:14px; color:#FFF;">&nbsp &nbsp &nbsp &nbsp &nbsp    <input style=" cursor:pointer;width:60px; height:20px; border:0px; background-color: #7CC7EA;; background-repeat:no-repeat; font-size:14px; color:#FFF;" type="reset" value="取消" onclick = "closeDialog3()">
              </div>
            </form>

          </div>
         </div>

   </div>
    <div class="kuan ">
	            <table border="1" width="1000" style="background-color: white;">
	              <thead class="ziti">
	                <tr>             
	                   <th>开课时间</th>
                     <th>结束时间</th>
	                   <th>每周</th>
	                   <th>时间段</th>
	                   <th>上课课程</th>
	                   <th>上课老师</th>
	                   <th>总课时</th>
	                   <th>已上课时</th>
                     <th>是否结束</th>
                     <th>课程是否关闭</th>
	                   <th>编辑</th>
	                </tr>
	              </thead>
	              <?php 
	               
	              ?>
	              <tr class="zitismall">
	                <td><?php echo $date ?></td>
                  <td><?php echo $oktime?></td>
	                <td><?php echo $week ?></td>
	                <td><?php echo $duan ?></td>
	                <td><?php echo $kname ?></td>
	                <td><?php echo $m_name ?></td>
                  <td><?php echo $zkeshi ?></td>
                  <td><?php echo $allready ?></td>
                  <td><?php 
                      if($end==0){
                        echo "否";
                      }else{
                        echo "是";
                      }

                  ?></td>
                  <td><?php 
                      if($close==0){
                        echo "否";
                      }else{
                        echo "是";
                      }

                  ?></td>
	               
	                <td><a href="http://www.siwutang.vip/swtmanager/backend/web/index.php?r=usermobile/xiu&id=<?php echo $id;?>" target="_blank"  >调课</a>&nbsp;/&nbsp;<a href="JavaScript:void(0)"   onclick = "openDialog2()">关闭</a></td>
	             <?php ?>
	              </tr>
	            </table>
	        </div>

	        <script  type="text/javascript" >
              function change(tel,id){
			          console.log(tel);
			         
			          if(window.confirm('确实要修改手机号吗?')){
			              //alert("确定");

			              location='http://www.siwutang.vip/swtmanager/backend/web/index.php?r=usermobile/change&id='+id+'&tel='+tel;
			              return true;
			              }else{
			              //alert("取消");
			             
			              return false;
			              } 

			        }
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