<?php
use yii\helpers\Html;
$conn=mysqli_connect('hdm121115553.my3w.com','hdm121115553','swt62899308swt','hdm121115553_db');
  if($conn->connect_errno){
      die('连接失败'.$conn->connect_errno);
  }
  $conn->set_charset('utf8');
   $qk="truncate table message ";
  $qing=mysqli_query($conn,$qk);

     // 获取POST的数据
   $submit=isset($_POST["submit"])?$_POST["submit"]:'';
   $begin=isset($_POST["begin"])?$_POST["begin"]:'';
   $end=isset($_POST["end"])?$_POST["end"]:'';

   $tname=isset($_POST["tname"])?$_POST["tname"]:''; 



if($end<>'' && $begin<>''){
  if($tname=='ALL'){
    $cha="select a.time,c.m_name,d.kname,a.ktime,b.sname,b.mobile,b.note,a.qian from course a,student b,admin c,ke d where  a.teacherid=c.id and a.kid=d.id and a.xueyuan=b.sname and a.time between '".$begin."' and '".$end."' ";
    $chaxun=mysqli_query($conn,$cha);
    $hh=mysqli_num_rows($chaxun);
    if($hh>0){  
      while($tj=mysqli_fetch_array($chaxun)){
           $kname=$tj['kname'];
           $teacher=$tj['m_name'];
           $duan=$tj['ktime'];
           $student=$tj['sname'];
           $mobile=$tj['mobile'];
           $qian=$tj['qian'];
           $note=$tj['note'];

        $in="INSERT INTO message(begintime,endtime,kecheng,duan,student,mobile,qian,note,teacher) VALUES('".$begin."','".$end."','".$kname."','".$duan."','".$student."','".$mobile."','".$qian."','".$note."','".$teacher."')";
      
        $insert=mysqli_query($conn,$in);  
      }

    }else{
      echo "no kecheng!";
    }

  }else{
      $cha="select a.time,c.m_name,d.kname,a.ktime,b.sname,b.mobile,b.note,a.qian from course a,student b,admin c,ke d where  a.teacherid=c.id and a.kid=d.id and a.xueyuan=b.sname and a.time between '".$begin."' and '".$end."' and c.m_name='".$tname."' ";
    $chaxun=mysqli_query($conn,$cha);
    $hh=mysqli_num_rows($chaxun);
    if($hh>0){  
      while($tj=mysqli_fetch_array($chaxun)){
           $kname=$tj['kname'];
           $teacher=$tj['m_name'];
           $duan=$tj['ktime'];
           $student=$tj['sname'];
           $mobile=$tj['mobile'];
           $qian=$tj['qian'];
           $note=$tj['note'];

        $in="INSERT INTO message(begintime,endtime,kecheng,duan,student,mobile,qian,note,teacher) VALUES('".$begin."','".$end."','".$kname."','".$duan."','".$student."','".$mobile."','".$qian."','".$note."','".$teacher."')";
        $insert=mysqli_query($conn,$in);  
      }

    }else{
      echo "no message!";
    }


  }



 }else{
  echo " ";
 }
 
?>
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="https://static.runoob.com/assets/jquery-validation-1.14.0/dist/jquery.validate.min.js"></script>
<script src="https://static.runoob.com/assets/jquery-validation-1.14.0/dist/localization/messages_zh.js"></script>
<style>

.ziti{
  font-size: 16px;
  font-family: 微软雅黑;
}
.juli{
  width: 100%;
  height: 20px;
}
.julibig{
  width: 300px;
  height:100px;
}

.kuang{
	width:1100px;
	height:30px;
}

.leftbig{
  width: 100%;
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
.big{
  width: 100%;
 height: 10px;
}
.middle{
    width: 100%;
 height: 450px;
 text-align:center;
 float:left;
  display: inline;

}

.div2{
    width: 80%;
  float:left;
  display: inline;
  height:60px;
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
        .font{
  font-size: 14px;
  font-family: 微软雅黑;
}
        .nei{
  margin:12px;
  background-color:#eee;
  width:98%;
    height:95%;
}
.inline{
  margin: auto;
  width:80%;
  height: 30px;
  background-color:#eee;
} 
.left{
  display:inline;
  width: 350px;
  line-height: 30px;
  background-color:#eee;
  float:left;
}
.right{
  display:inline;
  width: 140px;
  line-height: 30px;
  background-color:#eee;
  float:right;
}
.center{
  width:100%;
  margin: auto;
 
}
.middle{
  width:98%;
  margin: auto;
    background-color:#eee;
  height:350px;  
}
.dangzhong{
  display:inline;
  width: 200px;

  line-height: 30px;
  background-color:#eee;
  margin-left: 5%;
}

</style>

 <?php
$tea="SELECT id,m_name from admin where leibie='老师' and m_name<>'';";
$teachers=mysqli_query($conn,$tea);
?>

<div class="main font">

  <div class="nei">

 <div class="juli"></div>

   <div class="kuan ziti"><a href="http://www.siwutang.vip/swtmanager/backend/web/index.php?r=xueyuan/tongji">学员签到记录统计</a></div>
        <div class="inline">
          <form action="http://www.siwutang.vip/swtmanager/backend/messagelist.php" method="post" target="showstu">
          <div class="left">日期：<input type="date" name="begin" class="kuanmiddle">&nbsp;&nbsp;至&nbsp;&nbsp;<input type="date" name="end" class="kuanmiddle"></div>
          <div class="dangzhong">老师名：
              <select name="tname" >老师名：
                 <option value ="ALL">所有</option>
                  <?php while($laoshi=mysqli_fetch_array($teachers)){
                   ?>
                   
                    <option value ="<?php echo $laoshi['m_name'] ?>"><?php echo $laoshi['m_name'] ?></option>
                  
                    <?php 
                      }
                    ?>
                </select>
            </div>
          <div class="right"><input type="submit" name="submit" value="查询" class="button" /></div>
          </form>
        </div>
        <div class="center">

          <div class="middle" id="page_content2">
                
              <iframe id="menuFrame2" name="showstu" src="http://www.siwutang.vip/swtmanager/backend/messagelist.php" style="overflow:visible;" scrolling="no" frameborder="no" width="1350px;" height="100%;">
            
              </iframe>
           
          </div>

        </div>

  </div>
   

</div>
  

