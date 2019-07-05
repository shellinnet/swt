<?php
$conn=mysqli_connect('hdm121115553.my3w.com','hdm121115553','swt62899308swt','hdm121115553_db');
  if($conn->connect_errno){
      die('连接失败'.$conn->connect_errno);
  }
  $conn->set_charset('utf8');
use yii\helpers\Html;

$id=$_REQUEST['id'];

//根据id查询传过来学生信息
$xue="select a.*, b.kname,c.m_name from student a,ke b,admin c where a.knameid=b.id and a.teacherid=c.id and a.id='".$id."'";
$student=mysqli_query($conn,$xue);
while($xuesheng=mysqli_fetch_array($student)){
     $xsname=$xuesheng['sname'];
     $xsphone=$xuesheng['mobile'];
     $xsweek=$xuesheng['week'];
     $xsduanl=$xuesheng['duan'];
     $xsdate=$xuesheng['date'];  //上课日期
     $xsoktime=$xuesheng['oktime']; //有效日期
     $xsknameid=$xuesheng['knameid']; //上课id
     $xsteacherid=$xuesheng['teacherid']; //老师id
     $xskeshi=$xuesheng['zkeshi'];  //总课时
     $xssyks=$xuesheng['syks']; //剩余课时
     $xskename=$xuesheng['kname']; //课程名
     $xsteacher=$xuesheng['m_name'];//老师名
     $xspassword=$xuesheng['password'];
}

//课程
$kc="SELECT id,kname FROM ke ";
$kecheng=mysqli_query($conn,$kc);
//老师  
$ls="SELECT id,m_name FROM admin where leibie='老师' and m_name<>''";
$tech=mysqli_query($conn,$ls);

//计算剩余课时
$sy="SELECT count(*) FROM course where qian=0 and xueyuan='".$xsname."' and teacherid='".$xsteacherid."' and kid='".$xsknameid."' ";
$sys=mysqli_query($conn,$sy);
while($kk=mysqli_fetch_array($sys)){
     $sykk=$kk['count(*)'];
}

//获取下一次上课时间
$sktime="SELECT * FROM course where qian=0 and xueyuan='".$xsname."' and teacherid='".$xsteacherid."' and kid='".$xsknameid."' and ktime='".$xsduanl."' and time>=curdate() limit 1";
$sktimes=mysqli_query($conn,$sktime);
while($hh=mysqli_fetch_array($sktimes)){
    $hhs=$hh['time'];
}
?>

<script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
<style>

.juli{
  width:500px;
  height: 15px;
}
.ziti{
  font-size: 16px;
  font-family: 微软雅黑;
}  
.left{
  width: 160px;
  float:left;
  display: inline;
}
.leftbig{
  width: 300px;
  float:left;
  display: inline;
}

.leftmiddle{
  width: 230px;
  float:left;
  display: inline;
  height:30px;
  text-align: right;
}
.leftcenter{
  width: 120px;
  float:left;
  display: inline;
  height:30px;
  text-align:left;
}
.rightcenter{
  width: 150px;
  float:left;
  display: inline;
  height:30px;
  text-align:right;
}
.leftmiddle2{
  width: 230px;
  float:left;
  display: inline;
  height:30px;
  text-align: right;
}
.leftmiddle3{
  width: 230px;
  float:left;
  display: inline;
  height:30px;
  text-align: left;
}
.shuru{
  width: 120px;
  height: 25px;
}
.juli2{
  width:500px;
  height: 30px;
}
.input{
  width: 100px;
  height: 30px;
}
.nei{
  margin:12px;
  background-color:#eee;
  width:98%;
    height:95%;
}
.kuan{
 
  margin: auto;
  width:70%;
  height: 30px;
}
.kuan2{
  margin: auto;
  width:45%;
  height: 30px;
  text-align: left;
}
</style>

<div class="main ">
<div class="nei">
  <div class="juli"></div>
  <div class="kuan ziti">学员调课</div>
    <div class="left">&nbsp;</div>
    <div class="left">
      <div class="juli2"></div>
      <div class="juli"><span style="font-size:16px">上课信息</span>&nbsp;&nbsp; </div>
      <div class="juli"></div>
      <form action="/swtmanager/backend/web/index.php?r=usermobile/xiuresult" method="post">
      <div class="juli"></div>
      <div class="juli">&nbsp;　　学员姓名：&nbsp;&nbsp;</span><input  class="input" type="text" name="studentname" value="<?php echo $xsname?>" readonly="readonly" disabled="disabled"> </div>
      <div class="juli"></div>

      <div class="juli"></div>
      <div class="juli">&nbsp;　　　手机号：&nbsp;&nbsp;</span><input class="input" type="text" name="studentphone" value="<?php echo $xsphone?>" readonly="readonly" disabled="disabled"> </div>
      <div class="juli"></div>

      <div class="juli"></div>
      <div class="juli">&nbsp;　　上课课程：&nbsp;&nbsp;</span><input class="input" type="text" name="kname" value="<?php echo $xskename?>" readonly="readonly" disabled="disabled"> </div>
      <div class="juli"></div>

      <div class="juli"></div>
      <div class="juli">&nbsp;　　上课老师：&nbsp;&nbsp;</span><input  class="input" type="text" name="teacher" value="<?php echo $xsteacher?>" readonly="readonly" disabled="disabled"> </div>
      <div class="juli"></div>

      <div class="juli"></div>
      <div class="juli">&nbsp;剩余上课课时：&nbsp;&nbsp;</span><input class="input" type="text" name="studentkeshi" value="<?php echo $sykk?>" readonly="readonly" disabled="disabled"> </div>
      <div class="juli"></div>
     
    </div>
    <div class="leftbig">&nbsp;</div>
    <div class="left">
        <div class="juli2"></div>
        <div class="juli">
           <div class="rightcenter">&nbsp;</div>
           <div class="leftmiddle3"><span style="font-size:16px">学员调课</span>&nbsp;&nbsp; <span style="font-size:12px;color:blue;"></span></div>
        </div>
        
        <div class="juli"></div>
      
        <div class="juli"></div>
            <div class="juli">
        <div class="rightcenter"><span style="font-size:14px;color:red;">*</span><span style="font-size:14px;">下一次上课时间:&nbsp;&nbsp;</span></div>
      <!--   <div class="leftcenter">
        <?php
          if(isset($hhs)){


        ?>
        <input type="date" name="studentdate" class="shuru" value=<?php echo $hhs?>>
        <?php 
            }
        ?>
        </div> --><!-- 
        <div class="leftmiddle2"><span style="font-size:12px;color:red;"><span style="font-size:12px;color:red;"></span></div> -->
          <div class="leftmiddle3"><input  type="date" name="studentdate"  class="shuru" value=<?php echo $xsoktime?> >&nbsp;&nbsp;</div>
        <div class="juli"></div>
        <div>
        </div>
      
        <div class="juli"></div>
        <div class="juli"></div>
            <div class="juli">
        <div class="rightcenter"><span style="font-size:14px;color:red;">*</span><span style="font-size:14px;">时间段:&nbsp;&nbsp;</span></div>
        <div class="leftcenter">
        <select name="shiduan"  class="shuru">请选择
           <option value=<?php echo $xsduanl?>><?php echo $xsduanl?></option> 
           <option value="10:00-12:00">10:00-12:00</option>
           <option value="13:30-15:30">13:30-15:30</option>
           <option value="15:30-17:30">15:30-17:30</option>
           <option value="19:00-21:00">19:00-21:00</option>
        </select>
        </div>
        </div>         
        
        
        <div class="juli"></div>
        <div class="juli"></div>
        <div class="juli">
        <div class="rightcenter"><span style="font-size:14px;color:red;">*</span><span style="font-size:14px;">课程有效时间:&nbsp;&nbsp;</span></div>
        <div class="leftmiddle3"><input type="date" name="studenttime"  class="shuru" value=<?php echo $xsoktime?> >&nbsp;&nbsp;</div>

        <div>
        <div class="juli"></div>
        <div class="juli"></div>
        <div class="juli"></div>
        <div class="juli">
        <div class="rightcenter"></div>
        <div class="width:500px;height:30px;margin: 0px auto;" aligin="center"><input type="submit" name="submit" value="确认" class="button" /></div>
        </div>

    </div>
     <div class="juli2"></div>
     <div class="juli2"></div>
    <div class="kuan2 ziti"><a href="http://www.siwutang.vip/swtmanager/backend/web/index.php?r=usermobile/main">返回所有学员管理</a></div>
     <input  type="hidden" name="studentid" value="<?php echo $id?>" > </div>
     <input  type="hidden" name="yuanshiduan" value="<?php echo $xsduanl?>" > </div>
     <input  type="hidden" name="password" value="<?php echo  $xspassword?>" > </div>
     <input  type="hidden" name="xskeshi" value="<?php echo  $xskeshi?>" > </div>
     <input  type="hidden" name="yuanteacherid" value="<?php echo  $xsteacherid?>" > </div>
     <input  type="hidden" name="yuankid" value="<?php echo  $xsknameid?>" > </div>
     <input  type="hidden" name="yuandate" value="<?php echo  $xsdate?>" > </div>
     <input  type="hidden" name="yuanweek" value="<?php echo  $xsweek?>" > </div>
    </form>


</div>
</div>
  <script>
    $(function(){
        //初始化数据
        var url = 'http://www.siwutang.vip/test101.php'; //后台地址
        var url2 = 'http://www.siwutang.vip/test102.php'; //后台地址
          var url3 = 'http://www.siwutang.vip/test103.php'; //后台地址
        $("#address").change(function(){  //监听下拉列表的change事件
            var address = $(this).val();  //获取下拉列表选中的值
            //发送一个post请求
            $.ajax({
                type:'post',
                url:url,
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
                        var option = '<option>请选择老师</option>';  //默认值
                    }

                    $("#city").html(option);  //js刷新第二个下拉框的值
                    var citys = $("#city").html(option);
                    var city=citys[0][0]['value'];
                    console.log(city) ;


              $.ajax({
                type:'post',
                url:url2,
                data:{key:city},
              
                dataType:'json',
                success:function(data){  //请求成功回调函数
                    var status2 = data.status; //获取返回值
                    var city= data.data;
                    var id=data.id;
                 
                    if(status2 == 200){  //判断状态码，200为成功
                        var option = '';
                        console.log('city:',city);
                        console.log('id:',id);
                        for(var i=0;i<city.length;i++){  //循环获取返回值，并组装成html代码
                             option +='<option value="'+city[i]+id+'">'+city[i]+'</option>';
                        }
                    }else{
                        var option = '<option>请选择时段</option>';  //默认值
                    }

                    $("#week").html(option);  //js刷新第3个下拉框的值
                     var weeks = $("#week").html(option);
                    var week=weeks[0][0]['value'];
                    console.log(week) ;
                    
                },
            });
            
           
                },
            });
        });

      
      
        $("#city").change(function(){  //监听下拉列表的change事件
            var city = $(this).val();  //获取下拉列表选中的值

            console.log(city) ;
            //发送一个post请求
            $.ajax({
                type:'post',
                url:url2,
                data:{key:city},
              
                dataType:'json',
                success:function(data){  //请求成功回调函数
                    var status2 = data.status; //获取返回值
                    var city= data.data;
                    var id=data.id;
                 
                    if(status2 == 200){  //判断状态码，200为成功
                        var option = '';
                        console.log('city:',city);
                        console.log('id:',id);
                        for(var i=0;i<city.length;i++){  //循环获取返回值，并组装成html代码
                             option +='<option value="'+city[i]+id+'">'+city[i]+'</option>';
                        }
                    }else{
                        var option = '<option>请选择时段</option>';  //默认值
                    }

                    $("#week").html(option);  //js刷新第3个下拉框的值
                     var weeks = $("#week").html(option);
                    var week=weeks[0][0]['value'];
                    console.log(week) ;
                    
                },
            });

       });

    
      
        $("#week").change(function(){  //监听下拉列表的change事件
            var week = $(this).val();  //获取下拉列表选中的值
           
            //发送一个post请求
            $.ajax({
                type:'post',
                url:url3,
                data:{key:week},
                
                dataType:'json',
                success:function(data){  //请求成功回调函数
                    var status3 = data.status; //获取返回值
                    var week= data.data;
                    if(status3 == 200){  //判断状态码，200为成功
                        var option = '';
                        for(var i=0;i<week.length;i++){  //循环获取返回值，并组装成html代码
                             option +='<option value="'+week[i]+'">'+week[i]+'</option>';
                        }
                    }else{
                        var option = '<option>请选择时段</option>';  //默认值
                    }

                    $("#other").html(option);  //js刷新第3个下拉框的值
                     var others = $("#other").html(option);
                    var other=others[0][0]['value'];
                    console.log('other:',other) ;
                },
            });
         });

    });
    </script> 


