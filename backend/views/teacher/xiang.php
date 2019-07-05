<?php
use yii\helpers\Html;
$conn=mysqli_connect('hdm121115553.my3w.com','hdm121115553','swt62899308swt','hdm121115553_db');
  if($conn->connect_errno){
      die('连接失败'.$conn->connect_errno);
  }
  $conn->set_charset('utf8');

  //老师课程修改
  $submitxiu=isset($_POST["submitxiu"])?$_POST["submitxiu"]:'';
  $tiaoke=isset($_POST["tiaoke"])?$_POST["tiaoke"]:'';
  $zq=isset($_POST["zq"])?$_POST["zq"]:'';
  $sduan=isset($_POST["duan"])?$_POST["duan"]:'';
  $tid=isset($_POST["tid"])?$_POST["tid"]:'';
  $closed=isset($_POST["closed"])?$_POST["closed"]:'';
  $keids=isset($_POST["kid"])?$_POST["kid"]:'';
  

  if($tiaoke<>'' && $closed<>'' ){
    $xiu="UPDATE kecheng SET tiao='".$tiaoke."' where teacherid='".$tid."' and zq='".$zq."' and duan='".$sduan."'";
    $xiugai=mysqli_query($conn,$xiu);
    
    $xiu2="UPDATE kecheng SET close='".$closed."' where teacherid='".$tid."' and zq='".$zq."' and duan='".$sduan."'";
    $xiugai2=mysqli_query($conn,$xiu2);


  }else if($closed<>''){
    $xiu2="UPDATE kecheng SET close='".$closed."' where teacherid='".$tid."' and zq='".$zq."' and duan='".$sduan."'";
    $xiugai2=mysqli_query($conn,$xiu2);
     $xiu="UPDATE kecheng SET tiao='".$tiaoke."' where teacherid='".$tid."' and zq='".$zq."' and duan='".$sduan."'";
     $xiugai=mysqli_query($conn,$xiu);

  }else if( $tiaoke<>''){
    $xiu="UPDATE kecheng SET tiao='".$tiaoke."' where teacherid='".$tid."' and zq='".$zq."' and duan='".$sduan."'";
     $xiugai=mysqli_query($conn,$xiu);

  }
  

  if($tid<>''){
    $id=$tid;
    $week=$zq;
    $duan=$sduan;
    $keid=$keids;
  }else{
    $id=$_REQUEST['id'];
     $week=$_REQUEST['week'];
    $duan=$_REQUEST['duan'];
    $keid=$_REQUEST['keid'];
  }

 

  $jb="SELECT * FROM admin where id='".$id."'";
  $ls=mysqli_query($conn,$jb);
  while($teach=mysqli_fetch_array($ls)){
  	   $teacher=$teach['m_name'];
  	   $tel=$teach['m_tel'];
  	   $weixin=$teach['m_weixin'];
       $tid=$teach['id'];
       //统计上课人数

  }

  // $teach="select a.kname,b.kid,b.time,b.week,a.teacherid,a.tiao,a.close,b.ktime,b.xueyuan from kecheng a,course b where a.teacherid=b.teacherid and a.teacherid='".$id."' and  b.kid=a.keid and b.ktime='".$duan."' and b.week='".$week."' group by b.time,b.ktime";
  // $teachers=mysqli_query($conn,$teach);

  
 //分页显示

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

 
?>
<script type="text/javascript" src="/web/My97DatePicker/WdatePicker.js"></script>
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
  height:200px;
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

background:green;/*背景色*/
font-size: 14px;
color:white;/*字体颜色*/
width:50px;
height:25px;

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
  <div class="ziti">四物堂---老师详细信息</div>
    <img src="/swtmanager/backend/web/statics/images/top.jpg" width="1100" height="82" border="0" usemap="#Map" />
<map name="Map" id="Map"><area shape="rect" coords="3,3,192,78" href="/swtmanager/backend/web/index.php?r=usermobile/register" />
<area shape="rect" coords="229,4,420,78" href="/swtmanager/backend/web/index.php?r=usermobile/main" /><area shape="rect" coords="454,3,643,79" href="/swtmanager/backend/web/index.php?r=teacher/main" /><area shape="rect" coords="679,5,863,80" href="/swtmanager/backend/web/index.php?r=tongzhi/main" /><area shape="rect" coords="902,4,1091,78" href="/swtmanager/backend/web/index.php?r=admin/main" /></map>
  <div class="juli"></div>
</div>
<div class="juli"></div>

<div class="main">
<div class="juli"></div>
<div class="juli"></div>

        <div class="kuang">  
  <div class="left">&nbsp;</div>
     <div class="leftbig">
        <div class="juli"></div>
        <div class="kuan">
              <div><a href="http://www.siwutang.vip/swtmanager/backend/web/index.php?r=teacher/main">返回老师管理</a></div>
        </div>
  </div>
  
</div>
<div class="juli"></div>
<div class="juli"></div>
  <div class="kuang">
      <div class="left">&nbsp;</div>
      <div>老师基本信息：</div>
  </div>
  
   <div class="kuang">
        <div style="width: 150px;height: 30px;float:left;">&nbsp;</div>
        <div style="float:left;width: 150px;height: 30px;">老师名：<?php echo $teacher ?></div>
        <div style="float:left;width: 200px;height: 30px;">手机号：<?php echo $tel ?></div>
        <div style="float:left;width: 200px;height: 30px;">微信号：<?php echo $weixin ?></div>
        <div style="float:left;width: 250px;height: 30px;">&nbsp;</div>
        <div style="float:left;width: 150px;height: 30px;"><a href="JavaScript:void(0)" onclick = "openDialog()">恢复原始密码</a></div>

         <div id="light" class="white_content">
            <form action="/swtmanager/backend/web/index.php?r=teacher/main" method="post">
              <div> 你确定恢复原始密码吗？</div>
              <input type="hidden" name="mimaid" value=<?php echo $tid ?> />
              <div>
              <input type="submit" value="提交" name='submit4' style=" cursor:pointer;width:80px; height:30px; border:0px; background-color: #7CC7EA;; background-repeat:no-repeat; font-size:16px; color:#FFF;">&nbsp &nbsp &nbsp &nbsp &nbsp    <input style=" cursor:pointer;width:80px; height:30px; border:0px; background-color: #7CC7EA;; background-repeat:no-repeat; font-size:16px; color:#FFF;" type="reset" value="取消" onclick = "closeDialog()">
              </div>
            </form>
         </div>
   </div>
    <div class="juli"></div>
  <div class="kuang">      
     <div class="left">&nbsp;</div>
     <div class="leftbig">
       
        <div class="kuan">
	            <div>老师上课信息:  </div>
	            <div class="left" style="width: 620px;height: 30px;"></div>
	           <!--  <form action='/swtmanager/backend/web/index.php?r=teacher/xiang' method='post'  enctype="multipart/form-data" name="form">
	            <div class="leftcenter">
	            
	                <input id="time" name="begin" type="date" >
	            </div>
	            <div class="left">&nbsp;</div>
	            <div class="leftmiddle">
                  <input type="hidden" name="sid"  value="$id" />
                  <input type="hidden" name="sweek" value="$week" />
                  <input type="hidden" name="sduan"  value="$duan"/>

	                <input type="text" name="kecheng" placeholder="请输入课程名" />
	                <input type="submit" name="submit" value="搜索" class="button" />

	            </div>
	            </form> -->
	        </div>
	  
	     <div class="kuan">
	            <table border="1" width="1000" style="background-color: white;">
	              <thead>

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
	              <tr>

	               <td><?php echo $lkname?></td>
	                <td><?php echo $lduan?></td>
	                
	                <td><?php 
                    if ($ltiao==0){
                       echo "是";
                     }else{
                        echo "否";
                     }
                  ?></td>
                  <td><?php 
                    if ($lclose==1){
                       echo "是";
                     }else{
                        echo "否";
                     }
                  ?></td>
	                
	            
	             
	              </tr>
                <?php } ?>
	            </table>
                         <p></p>
        <div class="center-in-center">
        <?php
          if($pageNow>1){
    $prePage = $pageNow-1;
    echo "<a href='http://www.siwutang.vip/swtmanager/backend/web/index.php?r=teacher/xiang&pid=$prePage&id=$id&week=$week&duan=$duan'>上一页</a> ";
    echo "&nbsp;&nbsp;&nbsp;";
  }
  if($pageNow<$pageCount){
    $nextPage = $pageNow+1;
    echo "<a href='http://www.siwutang.vip/swtmanager/backend/web/index.php?r=teacher/xiang&pid=$nextPage&id=$id&week=$week&duan=$duan'>下一页</a> ";
    echo "&nbsp;&nbsp;&nbsp;";
    echo "当前第{$pageNow}页/共{$pageCount}页";
  }
  echo "<br/><br/>";
        ?>
     
        </div>
	        </div>

	    <div class="julibig"></div>
       <div><a href="http://www.siwutang.vip/swtmanager/backend/web/index.php?r=teacher/xiu&id=<?php echo $id;?>&duan=<?php echo $duan;?>&keid=<?php if($lkid<>''){echo $lkid;}else{$lkid=0;echo $lkid;};?>">课程是否修改或关闭</a</div>
	         <div class="kuan"></div>
	    </div>
     </div>

  </div>
	
	
</div>
<script type="text/javascript">
 $(function(){
        })
        function openDialog(){
            document.getElementById('light').style.display='block';
            document.getElementById('fade').style.display='block';
           
        }
 
        function closeDialog(){
            document.getElementById('light').style.display='none';
            document.getElementById('fade').style.display='none'
        }
</script>