<?php
  $conn=mysqli_connect('hdm121115553.my3w.com','hdm121115553','swt62899308swt','hdm121115553_db');
  if($conn->connect_errno){
      die('连接失败'.$conn->connect_errno);
  }
  $conn->set_charset('utf8');

  $name="SELECT teacherid,tname FROM teacher;";
  $teachername=mysqli_query($conn,$name);


$submit=isset($_POST["submit"])?$_POST["submit"]:'';
$begin=isset($_POST["date"])?$_POST["date"]:'';
$end=isset($_POST["end"])?$_POST["end"]:'';
$jiaoshi=isset($_POST["teacher"])?$_POST["teacher"]:'';
$count=0;
//统计课时
$ke="SELECT  course.syks,kecheng.kname FROM course,teacher,kecheng where course.tqian=teacher.teacherid and course.kid=kecheng.keid and course.tqian='".$jiaoshi."' and time between '".$begin."' and '".$end."' group by course.xueyuanid,course.syks;";
$cour=mysqli_query($conn,$ke);
$row = mysqli_num_rows($cour);
$posts = array();
while($kecheng = mysqli_fetch_array($cour)) {
    $posts[] = $kecheng;
}
for($i=0;$i<$row;$i++){
  $count=$posts[$i][0]+$count;
}

$tech="SELECT  course.syks,kecheng.kname FROM course,teacher,kecheng where course.tqian=teacher.teacherid and course.kid=kecheng.keid and course.tqian='".$jiaoshi."' and time between '".$begin."' and '".$end."' group by course.xueyuanid,course.syks;";
$techerkeshi=mysqli_query($conn,$tech);


use yii\helpers\Html;
use yii\bootstrap\NavBar;
use yii\bootstrap\Nav;
use yii\grid\GridView;
$this->title = '老师课时统计';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="admin-model-index">
<div style="width:700px;height: 80px;">
 <form action='index.php?r=teacher/keshi' method='post'  enctype="multipart/form-data" name="form1">

   <div style="float:left;">
    <ul style="list-style:none;width:700px;height:50px;display:inline !important;float:left;" >
  
         <li style="display:inline-block;"> <div style="width: 10px;">&ensp;  </div>  </li>
         <li style="display:inline-block;"> 开始时间：</li>
         <li style="display:inline-block;"><input  type="date" name='date'></li>
         <li style="display:inline-block;">结束时间:</li>
        <li style="display:inline-block;"><input  type="date" name='end'></li>
    </ul>
    </div>
  
    <div style="float:left;" >&ensp;
     老师：<select name="teacher" style="width:150px;height: 30px;">

        <?php foreach ($teachername as $teacher)
{?>
    <option value="<?=$teacher['teacherid']?>"><?=$teacher['tname']?></option>
 <?php
 }
 ?>
    </select>
    </div> 
    <div style="float:left;">
    <input type ="submit"  name="submit" value="查询" style="background:#259dab;width:85px;height:28px;border-radius:10px;cursor:pointer;border:2px;font:14px Arial, Helvetica, sans-serif;"/>
   </div>
</form>
</div>
	<div style="width:100px;height: 60px;"></div>
	<div style="width:700px;height: 50px; " >
	开始时间：<?php echo $begin; ?> &nbsp 结束时间：<?php echo $end; ?><br>
	
	</div>
    <div>
      总课时：<?php echo($count) ; ?>
    </div>
</div>

<table border="1" width="600" style="background-color: white;">
 <tr>

 <td>课程名</td>
 <td>已上课时</td>

 </tr>

 <tr>
<?php while($num= mysqli_fetch_array($techerkeshi)){
  ?>
 <td><?php echo $num[1] ?></td>
 <td><?php echo $num[0] ?></td>

 </tr>
<?php }?>

</table>




