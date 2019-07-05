<?php 
use yii\helpers\Html;
$conn=mysqli_connect('hdm121115553.my3w.com','hdm121115553','swt62899308swt','hdm121115553_db');
  if($conn->connect_errno){
      die('连接失败'.$conn->connect_errno);
  }
  $conn->set_charset('utf8');

//接受传递过来的值
$tid=$_REQUEST['tid'];  //老师id
$keid=$_REQUEST['keid'];  //课程id
$time=$_REQUEST['time']; 
$ktime=$_REQUEST['ktime']; //时段
$last=$_REQUEST['last']; //几个空位

//老师  
$ls="SELECT id,m_name FROM admin where leibie='老师' and m_name<>'' and id=$tid ";
$tech=mysqli_query($conn,$ls);
while($tname=mysqli_fetch_array($tech)){
     $tnames=$tname['m_name'];
}

//课程名及调课信息
$kc="select a.*,c.kname,b.close from course a,kecheng b, ke c where a.kid=b.keid and a.teacherid='".$tid."' and a.ktime='".$ktime."' and a.time='".$time."' and b.close=0 and b.keid='".$keid."' and a.kid=b.keid and a.kid=c.id  group by kid";
$kecheng=mysqli_query($conn,$kc);
while($kk=mysqli_fetch_array($kecheng)){
     $kkname=$kk['kname'];
     $kktiao=$kk['close'];
    
}

?>
<script type="text/javascript" src="http://www.siwutang.vip/swtmanager/backend/web/statics/js/jquery-1.4.2.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){ 
   $("#button_text1").click(function(){  
                var result1 = $("#input_text1").val();
                url='http://www.siwutang.vip/swtmanager/studentqian.php?id=';  

                 location.href=url+result1; 
                 console.log(location.href);

            }); 
  });

 function openWindow(url){  
       window.open(url,"openWindow","height=200,width=1000,menubar=no,titlebar=no,toolbar=no,location=no,left=200,top=200,status=no");  
   }
</script>
<style>

.juli{
  width: 300px;
  height: 15px;
}
.juli3{
  width: 300px;
  height: 20px;
}
.julibig{
  width: 300px;
  height:300px;
}

.kuang{
	width:400px;
	height:30px;
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
  text-align: right;
}
.leftcenter{
  width: 100px;
  float:left;
  display: inline;
  height:30px;
  text-align:center;
  margin-top:5px;
}




.long{
  width: 195px;
  height: 30px;
}
.long2{
  width: 240px;
  height: 30px;
}
.da{
  width: 450px;
  height: 500px;
   float:left;
  display: inline;
}
.daright{
  width: 450px;
  height: 500px;
    float:left;
  display: inline;
}
.font{
  font-size: 14px;
  font-family: 微软雅黑;
}

.inline{
  margin: auto;
  width:90%;
  height: 30px;
  background-color:#eee;
} 
.left{
  display:inline;
  width: 200px;
  line-height: 30px;
  background-color:#eee;
  float:left;
}
.right{
  display:inline;
  width: 200px;
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
  margin-left: 2%;
}
.shuru{
  width: 100px;
  height: 25px;
  border: 0px;
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

<div class="main font">
    <div class="nei">
      <div class="juli"></div>
      <div class="kuan ziti"><a href="http://www.siwutang.vip/swtmanager/backend/web/index.php?r=kecheng/kebiao">返回课表信息及签到</a></div>
          <div class="inline">
          <div class="juli">&nbsp;</div>
          <form action="/swtmanager/backend/web/index.php?r=kecheng/tiaozheng" method="post">
               <div class="left">上课日期：<input  class="shuru" name="text" type="text" readonly = "readonly"  value="<?php echo $time?>" disabled="disabled" /></div>
                <div class="dangzhong">老师名：<input class="shuru"  type="text" name="teacher" readonly = "readonly" value="<?php echo $tnames?>" disabled="disabled" /></div>
                <div class="dangzhong">课程名：<input class="shuru"  type="text" name="kecheng" readonly = "readonly" value="<?php echo $kkname?>" disabled="disabled"/></div>
                <div class="dangzhong">上课时段：<input class="shuru" type="text" name="shiduan" readonly = "readonly" value="<?php echo $ktime?>" disabled="disabled"/></div>
                <div class="dangzhong">添加学员名：<input class="shuru" type="text" name="xueyuan" placeholder="请输入学员名"/></div>
                <div class="dangzhong">是否关闭课程：
                       <select name="jieshou">
                       <option value =$kktiao><?php if($kktiao==0){echo "否";}else{ echo "是";}?></option>
                       <option value ="0">否</option>
                       <option value ="1">是</option>         
                    </select>

                </div>
                <div class="right"><input type ="submit"  name="submit" value="修改" class="button" /></div>
            </div>
          <div class="juli"></div>
        
          </form>
          <div class="center">
              <div class="juli3"></div>
            <div class="middle">
                  
                  <table border="1" width="100%" style="background-color: white;">
                <thead>
                    <tr>
                      <th>上课学员名 </th>
                      <th>是否签到 </th>
                      <th>老师备注 </th>
                   
                    </tr>
                </thead>
                <?php 
                    $kc2="select * from course where ktime='".$ktime."' and teacherid='".$tid."' and time='".$time."'  and kid='".$keid."' and (xueyuan<>'0' and xueyuan<>'')";
                    $kecheng2=mysqli_query($conn,$kc2);
                  
                    while($hh=mysqli_fetch_array($kecheng2)){
                         $kxueyuan=$hh['xueyuan'];
                         $qian=$hh['qian'];
                         $beizhu=$hh['tnote'];
                         $sid=$hh['id'];

                  ?>
                <tr>
                   <td><?php echo $kxueyuan?></td>
                   <td><a href="javascript:void(0)" target="_parent"  onclick = "openWindow('http://www.siwutang.vip/studentqian.php?id=<?php echo $sid;?>')"><?php if($qian==0){echo "未签到";}else{echo "已签到";}?></a></td>
                   <td><?php echo $beizhu?></td>
                  
                </tr>
             <?php 
                }
             ?>
            </table>

          </div>
          </div>
          <div class="juli"></div>

</div>
</div>
