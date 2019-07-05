<?php
use yii\helpers\Html;
use yii\bootstrap\NavBar;
use yii\bootstrap\Nav;
use yii\grid\GridView;

  $conn=mysqli_connect('hdm121115553.my3w.com','hdm121115553','swt62899308swt','hdm121115553_db');
  if($conn->connect_errno){
      die('连接失败'.$conn->connect_errno);
  }
  $conn->set_charset('utf8');

  $name="SELECT teacherid,tname FROM teacher;";
  $teachername=mysqli_query($conn,$name);

  $kecheng="SELECT keid,kname FROM kecheng group by keid;";
  $teacherkecheng=mysqli_query($conn,$kecheng);

  $submit=isset($_POST["submit"])?$_POST["submit"]:'';
  $time=isset($_POST["date"])?$_POST["date"]:'';
  $tqian=isset($_POST["teacher"])?$_POST["teacher"]:'';
  $kid=isset($_POST["tkc"])?$_POST["tkc"]:'';
  $total=isset($_POST["keshi"])?$_POST["keshi"]:'';
  $ktime_id= isset($_POST["sd"])?$_POST["sd"]:'';

  foreach ((array)$ktime_id as $v){
  	$sql="insert into course(time,tqian,ktime_id,kid,total)  values ('".$time."','".$tqian."','".$v."','".$kid."','".$total."')";
  	$result=mysqli_query($conn,$sql);

    $ma="select max(id)  from course";
  	$max=mysqli_query($conn,$ma);
  	$num=mysqli_fetch_array($max);
  	
	$maxid=$num[0];
  	
	//获取时间
	$sj="select time,total,ktime_id,kid,tqian,xueyuanid from course where id='".$maxid."'";
    $dates=mysqli_query($conn,$sj);
    $date=mysqli_fetch_array($dates);

    $datetime=$date['time'];
    $total=$date['total'];
    $ktime_id=$date['ktime_id'];
    $kid=$date['kid'];
    $tqian=$date['tqian'];

   //算出周几
   
    $zho=mysqli_query($conn,"select dayofweek('".$datetime."');");
    $zhou=mysqli_fetch_array($zho);
  
    $week=$zhou[0];

    switch ($week){
    	case 1:
    	   $weekmsg='周日';
    	   break;
    	case 2:
    	   $weekmsg='周一';
    	   break;
    	case 3:
    	   $weekmsg='周二';
    	   break;
    	case 4:
    	   $weekmsg='周三';
    	   break;
    	case 5:
    	   $weekmsg='周四';
    	   break;
    	case 6:
    	   $weekmsg='周五';
    	   break;
    	case 7:
    	   $weekmsg='周六';
    	   break;
    	default:
    	   $weekmsg='';
    	   break;
    }
    $kecheng=mysqli_query($conn,"update course set week='".$weekmsg."' where id='".$maxid."'");

    //循环输入根据课时产生课表
    for($x=1; $x<$total; $x++){
       //7天后的时间
      $shijian=mysqli_query($conn,"select date_add('".$datetime."', interval 7 day);");
      $shi=mysqli_fetch_array($shijian);
      $datetime=$shi[0];

      $sqlkc="insert into course (time,total,week,ktime_id,kid,tqian) values ('".$datetime."','".$total."','".$weekmsg."','".$v."','".$kid."','".$tqian."')";
    
      $addkecheng=mysqli_query($conn,$sqlkc);
      
    }
  	
 }

$chose="select course.time,course.kid,kecheng.kname,course.tqian,teacher.tname,course.week,course.ktime_id,fourtime.shiduan,course.total from course,kecheng,teacher,fourtime where xueyuanid=0 and time<>'' and course.kid=kecheng.keid and course.tqian=teacher.teacherid and course.ktime_id=fourtime.sid group by kid,tqian,ktime_id,total,week order by kecheng.kname,course.week asc";
$teacherchose=mysqli_query($conn,$chose);



$this->title = '老师课程信息管理';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="admin-model-index">

  <div style="width:800px;height: 80px;">
      <form action='index.php?r=teacher/teachercourse' method='post'  enctype="multipart/form-data" name="form1">
      <div style="width:600px;height: 50px;">
	       <div style="float:left;" >&ensp;
	     选择老师：<select name="teacher" style="width:120px;height: 30px;">

	        <?php foreach ($teachername as $teacher)
	{?>
	    <option value="<?=$teacher['teacherid']?>"><?=$teacher['tname']?></option>
	 <?php
	 }
	 ?>
	    </select>
	    </div> 

	      <div style="float:left;" >&ensp;
	     选择课程：<select name="tkc" style="width:120px;height: 30px;">

	        <?php foreach ($teacherkecheng as $teacherkc)
	{?>
	    <option value="<?=$teacherkc['keid']?>"><?=$teacherkc['kname']?></option>
	 <?php
	 }
	 ?>
	    </select>
	    </div> 

	    <div style="float:left;" >&ensp;
	     请输入课时：<input type="text" name="keshi" />
	    </div> 
       </div>

      <div style="width:800px;height: 50px;">
        <div style="float:left;" >&ensp;
	     选择开课时间：<input type="date" name="date" />
	    </div> 

	    <div style="float:left;" >&ensp;
	     选择上课时段：<input type="checkbox" name="sd[]"  value="1"/>10:00-12:00
	                   <input type="checkbox" name="sd[]"  value="2"/>13:30-15:30
	                   <input type="checkbox" name="sd[]"  value="3"/>15:30-17:30
	                   <input type="checkbox" name="sd[]"  value="4"/>19:00-21:00
	    </div>

      </div>
	    <div style="float:left;">
        <input type ="submit"  name="submit" value="创建" style="background:#eee;width:85px;height:28px;border-radius:10px;cursor:pointer;border:2px;font:14px Arial, Helvetica, sans-serif;"/>
        </div>
       
      </form>
  </div>
  </div>
  <div style="width:800px;height: 80px;"></div>
  <div style="width:800px;height: 80px;">老师课程信息
     <table border="1" width="800" style="background-color: white;">
		<tr>
		<td>课程名</td>
		<td>周期</td>
        <td>时段</td>
        <td>老师</td>
        <td>操作</td>
		</tr>

		<tr>
		<?php while($num= mysqli_fetch_array($teacherchose)){

		?>
		<td><?php echo $num[2]?></td>
		<td><?php  echo $num[5]?></td>
        <td><?php echo $num[7]?></td>
		<td><?php  echo $num[4]?></td>
		<td><a href="index.php?r=teacher/kcdelete&kid=<?php echo $num[1]; ?>&tqian=<?php echo $num[3]; ?>&ktime_id=<?php echo $num[6]; ?>">删除</a></td>
		</tr>
		<?php }?>

	</table>
	<div style="width:800px;height: 80px;"></div>
  </div>


