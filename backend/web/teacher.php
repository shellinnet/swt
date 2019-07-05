<?php
$conn=mysqli_connect('hdm121115553.my3w.com','hdm121115553','swt62899308swt','hdm121115553_db');
  if($conn->connect_errno){
      die('连接失败'.$conn->connect_errno);
  }
  $conn->set_charset('utf8');


$submit=isset($_POST["submit"])?$_POST["submit"]:'';
$begin=isset($_POST["date"])?$_POST["date"]:date('Y-m-01' ,time());
$end=isset($_POST["end"])?$_POST["end"]:date('Y-m-d' ,time());

$kaishi = new \DateTime($begin);
$jiesu = new \DateTime($end);
$interval1=\DateInterval::createFromDateString('1 month');
$period1=new\DatePeriod($kaishi,$interval1,$jiesu);


foreach ($period1 as $dt1 ) {
    $count=0;
   $ri1=$dt1->format("m");
   switch ($ri1) {
        case 01:
           $mon="select syks from course where  month(time)='01' group by kid,xueyuanid order by time asc";
           $month=mysqli_query($conn,$mon);
           $row = mysqli_num_rows($month);
           $posts = array();
            while($kecheng = mysqli_fetch_array($month)) {
                $posts[] = $kecheng;
            }
            for($i=0;$i<$row;$i++){
              $count=$posts[$i][0]+$count;

            }
            $result="insert into keshi (time,keshi) values ('2018-01','".$count."');";
            $tim=mysqli_query($conn,$result);
            
            break;
        case 02:
           $mon="select syks from course where  month(time)='02' group by kid,xueyuanid order by time asc";
           $month=mysqli_query($conn,$mon);
           $row = mysqli_num_rows($month);
           $posts = array();
            while($kecheng = mysqli_fetch_array($month)) {
                $posts[] = $kecheng;
            }
            for($i=0;$i<$row;$i++){
              $count=$posts[$i][0]+$count;
            }
            $result="insert into keshi (time,keshi) values ('2018-02','".$count."');";
            $tim=mysqli_query($conn,$result);
           
            break;
        case 03:
           $mon="select syks from course where  month(time)='03' group by kid,xueyuanid order by time asc";
           $month=mysqli_query($conn,$mon);
           $row = mysqli_num_rows($month);
           $posts = array();
            while($kecheng = mysqli_fetch_array($month)) {
                $posts[] = $kecheng;
            }
            for($i=0;$i<$row;$i++){
              $count=$posts[$i][0]+$count;
            }
            $result="insert into keshi (time,keshi) values ('2018-03','".$count."');";
            $tim=mysqli_query($conn,$result);
           
            break;
        case 04:
           $mon="select syks from course where  month(time)='04' group by kid,xueyuanid order by time asc";
           $month=mysqli_query($conn,$mon);
           $row = mysqli_num_rows($month);
           $posts = array();
            while($kecheng = mysqli_fetch_array($month)) {
                $posts[] = $kecheng;
            }
            for($i=0;$i<$row;$i++){
              $count=$posts[$i][0]+$count;
            }
            $result="insert into keshi (time,keshi) values ('2018-04','".$count."');";
            $tim=mysqli_query($conn,$result);
          
            break;
        case 05:
           $mon="select syks from course where  month(time)='05' group by kid,xueyuanid order by time asc";
           $month=mysqli_query($conn,$mon);
           $row = mysqli_num_rows($month);
           $posts = array();
            while($kecheng = mysqli_fetch_array($month)) {
                $posts[] = $kecheng;
            }
            for($i=0;$i<$row;$i++){
              $count=$posts[$i][0]+$count;
            }
            $result="insert into keshi (time,keshi) values ('2018-05','".$count."');";
            $tim=mysqli_query($conn,$result);
            break;
        case 06:
           $mon="select syks from course where  month(time)='06' group by kid,xueyuanid order by time asc";
           $month=mysqli_query($conn,$mon);
           $row = mysqli_num_rows($month);
           $posts = array();
            while($kecheng = mysqli_fetch_array($month)) {
                $posts[] = $kecheng;
            }
            for($i=0;$i<$row;$i++){
              $count=$posts[$i][0]+$count;
            }
            $result="insert into keshi (time,keshi) values ('2018-06','".$count."');";
            $tim=mysqli_query($conn,$result);
            break;
        case 07:
           $mon="select syks from course where  month(time)='07' group by kid,xueyuanid order by time asc";
           $month=mysqli_query($conn,$mon);
           $row = mysqli_num_rows($month);
           $posts = array();
            while($kecheng = mysqli_fetch_array($month)) {
                $posts[] = $kecheng;
            }
            for($i=0;$i<$row;$i++){
              $count=$posts[$i][0]+$count;
            }
            $result="insert into keshi (time,keshi) values ('2018-07','".$count."');";
            $tim=mysqli_query($conn,$result);
            break;
        case 08:
           $mon="select syks from course where  month(time)='08' group by kid,xueyuanid order by time asc";
           $month=mysqli_query($conn,$mon);
           $row = mysqli_num_rows($month);
           $posts = array();
            while($kecheng = mysqli_fetch_array($month)) {
                $posts[] = $kecheng;
            }
            for($i=0;$i<$row;$i++){
              $count=$posts[$i][0]+$count;
            }
            $result="insert into keshi (time,keshi) values ('2018-08','".$count."');";
            $tim=mysqli_query($conn,$result);
            break;
        case 09:
           $mon="select syks from course where  month(time)='09' group by kid,xueyuanid order by time asc";
           $month=mysqli_query($conn,$mon);
           $row = mysqli_num_rows($month);
           $posts = array();
            while($kecheng = mysqli_fetch_array($month)) {
                $posts[] = $kecheng;
            }
            for($i=0;$i<$row;$i++){
              $count=$posts[$i][0]+$count;
            }
            $result="insert into keshi (time,keshi) values ('2018-09','".$count."');";
            $tim=mysqli_query($conn,$result);
            break;
        case 10:
           $mon="select syks from course where  month(time)='10' group by kid,xueyuanid order by time asc";
           $month=mysqli_query($conn,$mon);
           $row = mysqli_num_rows($month);
           $posts = array();
            while($kecheng = mysqli_fetch_array($month)) {
                $posts[] = $kecheng;
            }
            for($i=0;$i<$row;$i++){
              $count=$posts[$i][0]+$count;
            }
            $result="insert into keshi (time,keshi) values ('2018-10','".$count."');";
            $tim=mysqli_query($conn,$result);
            break;
        case 11:
           $mon="select syks from course where  month(time)='11' group by kid,xueyuanid order by time asc";
           $month=mysqli_query($conn,$mon);
           $row = mysqli_num_rows($month);
           $posts = array();
            while($kecheng = mysqli_fetch_array($month)) {
                $posts[] = $kecheng;
            }
            for($i=0;$i<$row;$i++){
              $count=$posts[$i][0]+$count;
            }
            $result="insert into keshi (time,keshi) values ('2018-11','".$count."');";
            $tim=mysqli_query($conn,$result);
            break;
        case 12:
           $mon="select syks from course where  month(time)='12' group by kid,xueyuanid order by time asc";
           $month=mysqli_query($conn,$mon);
           $row = mysqli_num_rows($month);
           $posts = array();
            while($kecheng = mysqli_fetch_array($month)) {
                $posts[] = $kecheng;
            }
            for($i=0;$i<$row;$i++){
              $count=$posts[$i][0]+$count;
            }
            $result="insert into keshi (time,keshi) values ('2018-12','".$count."');";
            $tim=mysqli_query($conn,$result);
            break;

     }
  }


?>

<script type="text/javascript" src="http://echarts.baidu.com/gallery/vendors/echarts/echarts.min.js"></script>
<script type="text/javascript" src="http://www.qingyingtech.cn/swt/backend/web/statics/js/jquery-1.4.2.min.js"></script>
<style>
.container{
    width:900px;
    height:400px;
    display:flex;
   
   }
.flex{
    background:#eeeeee;
    margin:5px;
    flex:1;
    }
</style>


<div style="width:700px;height: 80px;">
<form action='index.php?r=site/index' method='post'  enctype="multipart/form-data" name="form1">
<div style="float:left;">
    <ul style="list-style:none;width:700px;height:50px;display:inline !important;float:left;" >
  
         <li style="display:inline-block;"> <div style="width: 60px;">&ensp;  </div>  </li>
         <li style="display:inline-block;"> 开始时间：</li>
         <li style="display:inline-block;"><input  type="date" name='date'></li>
         <li style="display:inline-block;">结束时间:</li>
        <li style="display:inline-block;"><input  type="date" name='end'></li>
        <li style="display:inline-block;"><div style="width: 10px;">&ensp;  </li>
        <li style="display:inline-block;"><input type ="submit"  name="submit" value="查询" style="background:#eee;width:85px;height:28px;border-radius:10px;cursor:pointer;border:2px;font:14px Arial, Helvetica, sans-serif;"/></li>
    </ul>   
   
</div>
</form>
</div>

<?php print_r($begin)   ?>
<?php print_r($end)   ?>

<div class="container">
   <div class="flex" id="main">
      
   </div>

</div>
<script type='text/javascript'>
var arr1=[],arr2=[];

      function arrPing(){
        
       $.ajax({
          type:"post",
          async:false,
          url:"http://www.qingyingtech.cn/swt/backend/web/teacherkeshi.php",
          data:{},
          dataType:"json",
          success:function(result){
            if (result) {
              for (var i = 0; i < result.length; i++) {
                  arr1.push(result[i].time);
                  arr2.push(result[i].keshi);
                 
              }
            }
          }
         })    
       
        return arr1,arr2;
       }
   

    arrPing();

var dom = document.getElementById("main");
var myChart = echarts.init(dom);
var app = {};
option = null;
 //var myChart = echarts.init(document.getElementById('main'));

        // 指定图表的配置项和数据
        option = {
            title: {
                show:true,
                text: '每月课时',
               // subtext:'Study Echarts',
                left:150,
            },
            toolbox:{  //工具箱配置
                show:true,
                feature:{
                    dataView:{
                        show:true
                    },
                    restore:{
                        show:true
                    },
                    saveAsImage:{
                        show:true
                    },
                    magicType:{
                        type:['line','bar']
                    }
                }
            },
            tooltip:{
                trigger:'axis' , //鼠标移过去，沿X轴弹出显示数据
                textStyle:{
                    fontFamily:'Microsoft YaHei',  //设置字体
                    color:'#000ddd' //设置字体颜色
                    
                },
                backgroundColor:'#fff',
            },
            legend: {
               
            },  //头部显示
            xAxis: {
               data: arr1
            },
            yAxis: { 
               type: 'value'
            },
            series: [
             
            {
                name: '课时',
                 type: 'bar',
                 barWidth:35,
                 itemStyle:{  
                     normal:{  
                       color:'#f5b031',  
                       }  
                },  
                data: arr2
            }
            ]
        };

        // 使用刚指定的配置项和数据显示图表。
        myChart.setOption(option);
</script>


<div style="width:500px;height: 80px;">
</div>


