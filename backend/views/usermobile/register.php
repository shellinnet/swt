<?php
$conn=mysqli_connect('hdm121115553.my3w.com','hdm121115553','swt62899308swt','hdm121115553_db');
  if($conn->connect_errno){
      die('连接失败'.$conn->connect_errno);
  }
  $conn->set_charset('utf8');

use yii\helpers\Html;
//课程
$kc="SELECT id,kname FROM ke where vip=0";
$kecheng=mysqli_query($conn,$kc);
//老师  
$ls="SELECT id,m_name FROM admin where leibie='老师' and m_name<>''";
$tech=mysqli_query($conn,$ls);

?>


<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="https://static.runoob.com/assets/jquery-validation-1.14.0/dist/jquery.validate.min.js"></script>
<script src="https://static.runoob.com/assets/jquery-validation-1.14.0/dist/localization/messages_zh.js"></script>

<style>
      .font{
  font-size: 14px;
  font-family: 微软雅黑;
}

.juli{
  width:500px;
  height: 15px;
}
.juli2{
  width:500px;
  height: 30px;
}
      .juli3{
          width:500px;
          height: 50px;
      }
.top{
    width:1120px;
    height:50px;

    margin-left:15px;
    border-radius:5px;
}
.left{
  width: 160px;
  float:left;
  display: inline;
}
.leftbig{
  width: 100px;
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
  width: 138px;
  height: 25px;
}
.nei{
  margin:12px;
  background-color:#eee;
  width:98%;
    height:95%;
}
.kuan{
 
   width:95%;
  height:30px;
 margin: auto;
}
.kuan2{ 
   width:75%;
  height:30px;
 margin: auto;
}
</style>

<div class="main font">
<div class="nei">
  <div class="juli3"></div>
    
  <div class="kuan ziti"><a href="http://www.siwutang.vip/swtmanager/backend/web/index.php?r=usermobile/register">普通学员注册</a></div>
  <div class="kuan2">
    <div class="left">&nbsp;</div>
    <div class="left">
      <div class="juli2"></div>
      <div class="juli"><span style="font-size:16px">账户设置</span>&nbsp;&nbsp; <span style="font-size:12px;color:blue;">请设置你的手机号用于登录</span></div>
      <div class="juli"></div>
      <form action="/swtmanager/backend/web/index.php?r=usermobile/reply"  method="post"  id="userForm">
      <div class="juli"></div>
      <div class="juli" style="padding-left: 15px;"><span style="font-size:14px;color:red;">*</span><span style="font-size:14px;">&nbsp;手机号:&nbsp;&nbsp;</span><input  type="text" name="studentphone" placeholder="请输入手机号" id="studentphone" class="shuru"> </div>
      <div class="juli"></div>
      <div class="juli"></div>
          <div class="juli"><span style="font-size:14px;color:red;padding-left: -15px;">*&nbsp;原始密码为：</span><div style="font-size:14px;color:red;display:inline">000000</div></div>
      <div class="juli"></div>
      <div class="juli"></div>
      <div class="juli"><span style="font-size:14px;color:red;">*</span><span style="font-size:14px;">&nbsp;学员姓名:&nbsp;&nbsp;</span><input  type="text"name="studentname" placeholder="请输入学员姓名" class="shuru"> </div>
      <div class="juli"></div>
      <div class="juli"></div>
      <div class="juli"><span style="font-size:14px;color:red;">*</span><span style="font-size:14px;">&nbsp;上课课程:&nbsp;</span>
      <select name="kname" id='address' class="shuru">
             <option >请选择课程</option>
              <?php
                    while($tk=mysqli_fetch_array($kecheng)){
                           $tkecheng=$tk['kname'];
                           $tkid=$tk['id'];
                    ?>
                <option value =<?php echo $tkid?>><?php echo $tkecheng?></option>
             <?php
                    } 
                ?>
      </select>
      </div>
     <div class="juli"></div>
     <div class="juli"></div>
      <div class="juli">

        <span style="font-size:14px;color:red;">*</span><span style="font-size:14px;">&nbsp;上课老师:&nbsp;</span>
       
        <select name="teacher" id="city" class="shuru">

            <option >请选择老师</option>     
        </select>      

    </div>
</div>

    <div class="leftbig">&nbsp;</div>
    <div class="left">
        <div class="juli2"></div>
        <div class="juli">
           <div class="rightcenter">&nbsp;</div>
           <div class="leftmiddle3"><span style="font-size:16px">基本信息</span>&nbsp;&nbsp; <span style="font-size:12px;color:blue;"></span></div>
        </div>
       
       
        
        <div class="juli"></div>
        <div class="juli"></div>
            <div class="juli">
        <div class="rightcenter"><span style="font-size:14px;color:red;">*</span><span style="font-size:14px;">上课时间:&nbsp;&nbsp;</span></div>
        <div class="leftcenter">

            <input type="date" name="studentdate" class="shuru" >

        </div>
        <div class="leftmiddle2"><span style="font-size:12px;color:red;"><span style="font-size:12px;color:red;"></span></div>
        </div>
      
        <div class="juli"></div>
        <div class="juli"></div>
            <div class="juli">
        <div class="rightcenter"><span style="font-size:14px;color:red;">*</span><span style="font-size:14px;">时间段:&nbsp;&nbsp;</span></div>
        <div class="leftcenter">
        <select name="shiduan" id="other" class="shuru">请选择
           <option >请选择时段</option>
           <option >10:00-12:00</option>
           <option >13:30-15:30</option>
           <option >15:30-17:30</option>
           <option >19:00-21:00</option>
        </select>
        </div>
        </div>         
        
        <div class="juli"></div>
        <div class="juli"></div>
            <div class="juli">
        <div class="rightcenter"><span style="font-size:14px;color:red;">*</span><span style="font-size:14px;">上课课时:&nbsp;&nbsp;</span></div>
        <div class="leftcenter3"> <input type="text" name="studentkeshi" placeholder="请输入上课课时" class="shuru" id="studentkeshi">&nbsp;&nbsp;次</div>
        </div>
        <div class="juli"></div>
        <div class="juli"></div>
        <div class="juli">
        <div class="rightcenter"><span style="font-size:14px;color:red;">*</span><span style="font-size:14px;">课程有效时间:&nbsp;&nbsp;</span></div>
        <div class="leftmiddle3"><input type="text" name="studenttime" placeholder="请输入课程有效时间" class="shuru" id="studenttime">&nbsp;&nbsp;天</div>

        <div>
        <div class="juli"></div>
        <div class="juli"></div>
        <div class="juli"></div>
        <div class="juli">
        <div class="rightcenter"></div>
        <div class="width:500px;height:30px;margin: 0px auto;" aligin="center"><input type="submit" name="submit" value="确认" class="button" /></div>
        </div>

    </div>
    </form>
</div>
</div>
</div>
  <script type="text/javascript">
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

         $("#userForm").validate({
            rules: {

             studentkeshi:{
                required: true,
                digits:true,
             },
            studenttime: {
               required: true,
               digits:true,
             },

            studentphone:{
             required: true,
             digits:true,
              minlength: 11,
             maxlength:11,
           },        

           },
           
                studentkeshi: {
             studentkeshi: {
                required: "请输入上课课时",
                digits:"上课课时必须是整数"
             },
             studenttime: {
               required: "请输入课程有效时间",
               digits:"课程有效时间必须是整数"
             },
          
               studentphone:{
                  required: "请输入手机号码",
                  digits:"必须输入整数",
                  minlength: "手机号码长度应为11位",
                  maxlength:"手机号码长度应为11位",
                 
                  
              },
         
           }, 
        });
    });
    </script> 


