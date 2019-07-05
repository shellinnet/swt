<?php
use yii\helpers\Html;
$conn=mysqli_connect('hdm121115553.my3w.com','hdm121115553','swt62899308swt','hdm121115553_db');
  if($conn->connect_errno){
      die('连接失败'.$conn->connect_errno);
  }
  $conn->set_charset('utf8');
  $createdtime=date("Y-m-d",time()); //获取今天日期

$jb="select a.*,b.m_name,c.kname from student a,admin b,ke c where a.teacherid=b.id and a.knameid=c.id  ";
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
//分页显示

  $pageSize = 9;   //每页显示的数量
  $rowCount = 0;   //要从数据库中获取
  $pageNow = 1;    //当前显示第几页
   


//搜索功能
$submit=isset($_POST["submit"])?$_POST["submit"]:'';
$begin=isset($_POST["begin"])?$_POST["begin"]:'';
$end=isset($_POST["end"])?$_POST["end"]:'';


if($submit<>''){

//获取总记录
 $sql1 = "select count(a.sname) from student a,admin b,ke c where a.teacherid=b.id and a.knameid=c.id and created_at between '".$begin."' and '".$end."' order by a.created_at ";

  $res1 = mysqli_query($conn,$sql1);
   
 if($row1=mysqli_fetch_row($res1)){
    $rowCount = $row1[0];

  }else{
     echo "";
  }

//计算共有多少页，ceil取进1
  $pageCount = ceil(($rowCount/$pageSize));
   
  $pre = ($pageNow-1)*$pageSize;

    $xinxi="select a.id,a.date,a.created_at,a.week,a.sname,a.mobile,b.m_name,c.kname,a.close,a.end from student a,admin b,ke c where a.teacherid=b.id and a.knameid=c.id and a.created_at between '".$begin."' and '".$end."'  order by a.created_at  limit $pre,$pageSize";

    $mesage=mysqli_query($conn,$xinxi);
  }


?>

<script type="text/javascript" src="http://www.siwutang.vip/swtmanager/backend/web/statics/js/jquery-1.4.2.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){ 
   $("#button_text1").click(function(){  
                var result1 = $("#input_text1").val();
                url='http://www.siwutang.vip/swtmanager/backend/studentlist.php?id=';  

                 location.href=url+result1; 
                 console.log(location.href);

            }); 
  });

 function openWindow(url){  
       window.open(url,"openWindow","height=200,width=1000,menubar=no,titlebar=no,toolbar=no,location=no,left=200,top=200,status=no");  
   }
</script>
<style>
body{
  font-size: 12px;
  font-family: 微软雅黑;
  
}
a{
  text-decoration:none;
}

.zi{
  font-size: 12px;
  font-family: 微软雅黑;
}
.juli{
  width: 300px;
  height: 15px;
}


.kuan2{
  width: 95%;
  height: 30px;
  text-align:left;
}
.left{

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
              font-size: 14px;
             font-family: 微软雅黑;
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

<div class="left" style="width: 3%;height: 30px;">&nbsp;</div>


        <div class="kuan2 left">
            <table border="1" width="100%" style="background-color: white;">
              <thead>
                <tr>   
                   <th>注册时间</th>
                       <th>学生名</th>          
                   <th>开始上课时间</th>
                   <th>周期</th>
               
                  <th>上课老师</th>
                   <th>上课课程</th>
                   
                   <th>签到次数</th>
     
             
            
                </tr>
              </thead>
              <?php 
                while($teach=mysqli_fetch_array($mesage)){
                    $zctime=$teach['created_at'];
                    
                    $sname=$teach['sname'];

                    $ldate=$teach['date'];
                    $sweek=$teach['week'];
                    
                    $m_name=$teach['m_name'];
                    $kname=$teach['kname'];
                    
                    $zclose=$teach['syks'];
                    $zend=$teach['zkeshi'];
                    $sid=$teach['id'];  //学员id

                    //签到次数
                    $allready=$zkeshi-$syks;
              ?>
              <tr class="zi">
                <td><?php echo $zctime?></td>
                 <td><?php echo $sname?></td>
                <td><?php echo $ldate?></td>
                <td><?php echo $sweek?></td>
               <td><?php echo $m_name?></td>
           
                <td><?php echo $kname?></td>
                
                <td><?php  echo $allready; ?></td>
            
  
             <?php }?>
              </tr>
            </table>
            <p></p>
        <div class="center-in-center">
        <div style="width: 200px;height: 30px;text-align: left;float:left; display: inline;"> 　</div>
          <div style="width: 800px;height: 30px;text-align: right;float:left; display: inline;">
        <?php
          if($pageNow>1){
    $prePage = $pageNow-1;
    echo "<a href='http://www.siwutang.vip/swtmanager/backend/studentlist.php?id=$prePage'>上一页</a> ";
    echo "&nbsp;&nbsp;&nbsp;";
  }
  if($pageNow<$pageCount){
    $nextPage = $pageNow+1;
    echo "<a href='http://www.siwutang.vip/swtmanager/backend/studentlist.php?id=$nextPage'>下一页</a> ";
    echo "&nbsp;&nbsp;&nbsp;";
    echo "当前第{$pageNow}页/共{$pageCount}页";
    echo "&nbsp;";
    echo '<input type="text" class="jump_text" name="jump" id="input_text1">&nbsp;<button id="button_text1">跳转</button>  ';
  }
  echo "<br/><br/>";
        ?>
        </div>
     
        </div>
   <div class="julibig"></div>
        <div class="kuan"></div>
  </div>






