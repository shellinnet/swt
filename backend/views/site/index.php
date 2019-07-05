<?php
$conn=mysqli_connect('hdm121115553.my3w.com','hdm121115553','swt62899308swt','hdm121115553_db');
  if($conn->connect_errno){
      die('连接失败'.$conn->connect_errno);
  }
  $conn->set_charset('utf8');

  //获取昨日时间戳
    
  $yesterday= date("Y-m-d",strtotime("-1 day"));


  $student="select count(id) from student where created_at='".$yesterday."'";
  $xs=mysqli_query($conn,$student);

  $tz="select id,biaoti from tongzhi order by id desc limit 3";
  $tzs=mysqli_query($conn,$tz);


  $zai="select * from student group by mobile";
  $zaidu=mysqli_query($conn,$zai);
  $i=0;
  while($zd=mysqli_fetch_array($zaidu)){
      $i=$i+1;
  }

  $sfrest="SELECT * FROM cunrest order by begintime desc limit 10 ";
  $sfrests=mysqli_query($conn,$sfrest);
 
  $countrest="SELECT * FROM cunrest ";
  $countrests=mysqli_query($conn,$countrest);
  $countrow=mysqli_num_rows($countrests);


use yii\helpers\Html;
?>

<script type="text/javascript" src="http://www.qingyingtech.cn/swt/backend/web/statics/js/jquery-1.4.2.min.js"></script>
<style>


.juli{
  width: 800px;
  height: 15px;
}

.left{
  width: 50px;
  float:left;
  display: inline;
}
.left2{
    width: 150px;
    float:left;
    display: inline;
}
.left3{
    width: 500px;
    float:left;
    display: inline;
}
.leftmiddle3{
  width: 230px;
  float:left;
  display: inline;
  height:300px;
  text-align: left;
}
.rightcenter{
  width: 350px;
  float:left;
  display: inline;
  height:300px;
  text-align:right;
}
.xinxi{
  width: 800px;

  height:300px;
  
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
ul{

list-style: none;

}
.kuan1{
  width:55%;
  height:30px;
 margin: auto;
}
</style>


<div class="juli"></div>

<div class="main">
<div class="nei">

<div class="juli"></div>
<div class="kuan1">
  <div class="juli"></div>
    <div class="left">&nbsp;</div>
    <div class="left3">


      <div class="left2" >昨日学员注册人数：
         <?php 
            while($xue=mysqli_fetch_array($xs)){
                $xuesheng=$xue['count(id)'];
                echo $xuesheng;
            }

         ?>

      </div>
        <div class="left2"> &nbsp;</div>
        <div class="left2">目前在读人数： <?php
            echo $i;
            ?></div>
    </div>


    <div class="left">&nbsp;</div>



      <div class="juli"></div>
    <p></p>
    <div class="juli"></div>
    <div class="xinxi">

     <div class="leftmiddle3">
         <div class="left">&nbsp;</div>

         <div >通知信息：</div>

      <div class="juli">

        <ul>
         <div class="juli"></div>

         <?php 
           while($tongzhi=mysqli_fetch_array($tzs)){
               $show=$tongzhi['biaoti'];
               $showid=$tongzhi['id'];
               ?>
              <li>
              <a href="http://www.siwutang.vip/swtmanager/backend/web/index.php?r=tongzhi/xiu&id=<?php echo $showid;?>"><?php 
                 echo $show;
         
                 
              ?></a>
              <p></p>
             
              </li>
               
          <?php     
           }

         ?>
         </ul>
          <div class="juli">
              <div class="left">&nbsp;</div>

          <a href="http://www.siwutang.vip/swtmanager/backend/web/index.php?r=tongzhi/main">更多</a>
          </div>
      </div>
    </div>
        <div class="juli"></div>
        <div class="rightcenter">
            <table border="1" width="600" style="background-color: white;">
                <thead>
                <tr>

                    <th>放假信息</th>
                    <th>开始日期</th>
                    <th>结束日期</th>

                </tr>
                </thead>
                <?php
                while($xiuxi=mysqli_fetch_array($sfrests)){
                $startTime=$xiuxi['begintime'];
                $endTime=$xiuxi['endtime'];
                $leibie=$xiuxi['leibie'];
                ?>
                <tr>
                    <td><?php echo $leibie?></td>
                    <td><?php echo $startTime?></td>
                    <td><?php echo $endTime?></td>
                    <?php }?>
                </tr>

            </table>
            <div class="juli"></div>
            <div><a href="http://www.siwutang.vip/swtmanager/backend/web/index.php?r=tongzhi/allmessage">更多</a></div>
        </div>

   </div> 
     
    </div>
    </div>
    </div>
</div>
</div>



