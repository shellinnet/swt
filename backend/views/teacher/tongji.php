<?php 
use yii\helpers\Html;
$conn=mysqli_connect('hdm121115553.my3w.com','hdm121115553','swt62899308swt','hdm121115553_db');
  if($conn->connect_errno){
      die('连接失败'.$conn->connect_errno);
  }
  $conn->set_charset('utf8');
  $qk="truncate table keshi ";
  $qing=mysqli_query($conn,$qk);

   // 获取POST的数据
   $submit=isset($_POST["submit"])?$_POST["submit"]:'';
   $begin=isset($_POST["begin"])?$_POST["begin"]:'';
   $end=isset($_POST["end"])?$_POST["end"]:'';
   $kname=isset($_POST["kname"])?$_POST["kname"]:''; 
   $tname=isset($_POST["tname"])?$_POST["tname"]:''; 

if($end<>'' && $begin<>''){

  if($tname=='ALL'){
     $ks="SELECT a.*,b.kname,c.id,c.m_name FROM course a,ke b,admin c where a.time between '".$begin."' and '".$end."' and b.kname='".$kname."' and a.kid=b.id and c.id=a.teacherid and a.qian=1 group by a.kid,a.teacherid,a.xueyuan,a.time";
     $keshi=mysqli_query($conn,$ks);
     $hh=mysqli_num_rows($keshi);
 
     if($hh>0){      
        while($tj=mysqli_fetch_array($keshi)){
       $ktong=$tj['kname'];
       $ttong=$tj['m_name'];
       $ktongid=$tj['kid'];
       $ttongid=$tj['id'];       
       //统echo $ktong;计课时
       $shi="select count(xueyuan) from course where time between '".$begin."' and '".$end."' and kid=1 and teacherid='".$ttongid."' and qian=1";
       $shijian=mysqli_query($conn,$shi);
       while($hh=mysqli_fetch_array($shijian)){
            $hhs=$hh['count(xueyuan)'];
       }      
       $in="INSERT INTO keshi(begin,end,teacher,kecheng,keshi) VALUES('".$begin."','".$end."','".$ttong."','".$ktong."','".$hhs."')";
       $insert=mysqli_query($conn,$in);    
      }
    }else{
      echo "" ;     
    }
 }else{
     $ks="SELECT a.*,b.kname,c.id,c.m_name FROM course a,ke b,admin c where a.time between '".$begin."' and '".$end."'  and c.m_name='".$tname."' and b.kname='".$kname."' and a.kid=b.id and c.id=a.teacherid and a.qian=1 group by a.kid,a.teacherid,a.xueyuan,a.time";
     $keshi=mysqli_query($conn,$ks);
     $hh=mysqli_num_rows($keshi);
 
     if($hh>0){      
        while($tj=mysqli_fetch_array($keshi)){
       $ktong=$tj['kname'];
       $ttong=$tj['m_name'];
       $ktongid=$tj['kid'];
       $ttongid=$tj['id'];       
  
       $shi="select count(xueyuan) from course where time between '".$begin."' and '".$end."' and kid=1 and teacherid='".$ttongid."' and qian=1";
       $shijian=mysqli_query($conn,$shi);
       while($hh=mysqli_fetch_array($shijian)){
            $hhs=$hh['count(xueyuan)'];
       }      
       $in="INSERT INTO keshi(begin,end,teacher,kecheng,keshi) VALUES('".$begin."','".$end."','".$ttong."','".$ktong."','".$hhs."')";
       $insert=mysqli_query($conn,$in);    
      }
    }else{
      echo " " ;     
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
  width: 300px;
  height: 15px;
}


.leftbig{
  width: 900px;
  float:left;
  display: inline;
}



ul li{
  list-style:none;
}


.kuanmiddle{
  width:130px;
  height: 30px;
}
.kuanbig{
  width:1000px;
  height: 600px;

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
  width: 120px;
  line-height: 30px;
  background-color:#eee;
  float:right;
}
.center{
  width:100%;
  margin: auto;
 
}
.middle{
  width:90%;
  margin: auto;
    background-color:#eee;
}
.dangzhong{
  display:inline;
  width: 200px;

  line-height: 30px;
  background-color:#eee;
  margin-left: 5%;
}


</style>

<div class="juli"></div>


<div class="main font">
 <div class="nei">
  <?php
     $tea="SELECT id,m_name from admin where leibie='老师' and m_name<>'';";
     $teachers=mysqli_query($conn,$tea);
  ?>
 <div class="juli"></div>

   <div class="kuan ziti"><a href="http://www.siwutang.vip/swtmanager/backend/web/index.php?r=teacher/tongji">老师课时统计</a></div>
        <div class="inline">
        <form action="/swtmanager/backend/web/index.php?r=teacher/tongji" method="post" >
          <div class="left">日期：<input type="date" name="begin" class="kuanmiddle">&nbsp;&nbsp;至&nbsp;&nbsp;<input type="date" name="end" class="kuanmiddle"></div>
          <div class="dangzhong">老师名： <select name="tname" id='address'>
                 <option value ="ALL">所有</option>
                  <?php while($laoshi=mysqli_fetch_array($teachers)){
                   ?>
                   
                    <option value ="<?php echo $laoshi['m_name'] ?>"><?php echo $laoshi['m_name'] ?></option>
                  
                    <?php 
                      }
                    ?>
                </select></div>
          <div class="dangzhong">课程名：<select name="kname" id="city">
                 <option>请选择课程</option>     
                   
                </select></div>
          <div class="right"><input type="submit" name="submit" value="查询" class="button" /></div>
          </form>
        </div>
        <div class="center">
          <div class="juli"></div>
            <div class="middle">
                  <table border="1" width="90%" style="background-color: white;">
                <thead>
                    <tr>
                      <th>开始日期 </th>
                      <th>结束日期 </th>
                      <th>老师名 </th>
                      <th>课程名 </th>
                      <th>已上课时 </th>
                    </tr>
                </thead>
                  <?php 
          $total=0;
          $kk="select * from keshi group by teacher,kecheng";
          $kks=mysqli_query($conn,$kk);
          while($kkc=mysqli_fetch_array($kks)){
               $tkkc=$kkc['teacher'];
               $kcs=$kkc['kecheng'];
               $kshi=$kkc['keshi'];
               $begins=$kkc['begin'];
               $ends=$kkc['end'];
               $total=$total+$kshi;

        ?>
                <tr>
                   <td><?php echo $begins?></td>
                   <td><?php echo $ends?></td>
                   <td><?php echo $tkkc?></td>
                   <td><?php echo $kcs?></td>
                   <td><?php echo $kshi?></td>
                </tr>
             <?php 
                }
             ?>
            </table>

          </div>

        </div>

  </div>


        <script type="text/javascript">
         $(function(){
         var url4 = 'http://www.siwutang.vip/test104.php'; //后台地址
         
          $("#address").change(function(){ 
            var address = $(this).val();  //获取下拉列表选中的值
             console.log(address);
             //发送一个post请求
            $.ajax({
              type:'post',
                url:url4,
              
                data:{key:address},

                dataType:'json',
                success:function(data){  //请求成功回调函数
                    var status = data.status; //获取返回值
                    var address = data.data;
                    if(status == 200){  //判断状态码，200为成功
                        var option = '';
                        for(var i=0;i<address.length;i++){  //循环获取返回值，并组装成html代码
                            option +='<option value="'+address[i]+'">'+address[i]+'</option>';
                         
                        }
                    }else{
                        var option = '<option>请选择课程</option>';  //默认值
                    }

                    console.log(status) ;
                     $("#city").html(option);  //js刷新第二个下拉框的值
                    var citys = $("#city").html(option);
                    var city=citys[0][0]['value'];
                    console.log(city) ;
                }    
            });
          });
         });  
        </script>
           
  <div class="juli"></div>
 

  </div>

     
