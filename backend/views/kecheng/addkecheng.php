<?php 
use yii\helpers\Html;
$conn=mysqli_connect('hdm121115553.my3w.com','hdm121115553','swt62899308swt','hdm121115553_db');
  if($conn->connect_errno){
      die('连接失败'.$conn->connect_errno);
  }
  $conn->set_charset('utf8');
//老师  
$ls="SELECT id,m_name FROM admin where leibie='老师' and m_name<>'' order by id desc limit 1";
$tech=mysqli_query($conn,$ls);
while($hh=mysqli_fetch_array($tech)){
     $hj=$hh['m_name'];
     $hjid=$hh['id'];
}

//课程
$kc="SELECT id,kname FROM ke ";
$kecheng=mysqli_query($conn,$kc);
//类别
$lei="select leibie from ke group by leibie desc";
 $kechenglei=mysqli_query($conn,$lei);
?>
<style>

.ziti{
  font-size: 16px;
  font-family: 微软雅黑;
}
.juli{
  width: 300px;
  height: 15px;
}
.julibig{
  width: 300px;
  height:300px;
}

.kuang{
	width:1100px;
	height:45px;
}
.left{
  width: 50px;
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
  text-align: right;
}
.leftcenter{
  width: 100px;
  float:left;
  display: inline;
  height:30px;
  text-align:right;
/*  margin-top:5px;*/
}

.shuru{
  width: 150px;
  height: 25px;
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

.img{
  width: 58px;
  height: 58px;
}
.kuan1{
   width:50%;
  height:30px;
 margin: auto;
}
</style>

<div class="main">
<div class="nei">
<div class="juli"></div>
  <div class="kuan ziti"><a href="http://www.siwutang.vip/swtmanager/backend/web/index.php?r=kecheng/addkecheng">添加课程</a></div>

<div class="kuan1">
<form action="/swtmanager/backend/web/index.php?r=kecheng/addok" method="post" enctype="multipart/form-data">
    <div class="juli"></div>
    <div class="kuang">
        <div class="left">&nbsp;</div>
        <div class="leftmiddle">　课程名：<input id="kecheng" name="kecheng"  ></div>
         
    </div>

     <div class="kuang">
        <div class="left">&nbsp;</div>
       <div class="leftmiddle">课程类别：
      <select name="leibie" id='leibie' class="shuru">
       <option >请选择类别</option>
        <?php
                    while($tk=mysqli_fetch_array($kechenglei)){
                           $tleibie=$tk['leibie'];
                         

                    ?>
                <option value =<?php echo $tleibie?>><?php echo $tleibie?></option>
             <?php
                    } 
                ?>

      </select>
       </div>                  
    </div>
    <div class="kuang">
       <div class="left">&nbsp;</div>
       <div class="leftcenter">选择课程图片：</div>

       <div class="leftbig"> <input type="radio" name="images" value="http://www.siwutang.vip/image/%E4%B9%A6%E6%B3%95@2x.png"/>　　<img src="http://www.siwutang.vip/image/%E4%B9%A6%E6%B3%95@2x.png" class="img"/>　　　 <input type="radio" name="images" value="http://www.siwutang.vip/image/%E5%9B%BD%E7%94%BB@2x.png"/>　　<img src="http://www.siwutang.vip/image/%E5%9B%BD%E7%94%BB@2x.png" class="img"/>
       </div> 
	  </div>
    <div class="juli"></div>
  <div class="juli"></div>
    <div class="kuang">
       <div class="left">&nbsp;</div>
       <div class="leftcenter">　　</div>

       <div class="leftbig"> <input type="radio" name="images" value="http://www.siwutang.vip/swtmanager/backend/web/img/1540335475Group11@2x.png"/>　　<img src="http://www.siwutang.vip/swtmanager/backend/web/img/1540335475Group11@2x.png" class="img"/>　　　 <input type="radio" name="images" value="http://www.siwutang.vip/swtmanager/backend/web/img/1541116278Group14@2x.png"/>　　<img src="http://www.siwutang.vip/swtmanager/backend/web/img/1541116278Group14@2x.png" class="img"/>
       </div> 
    </div>
  <div class="juli"></div>
  <div class="juli"></div>
   <div class="kuang">
        <div class="left">&nbsp;</div>
       <div class="leftcenter">是否允许调课：</div>
       <div class="leftbig">
          <select name="tiao">
           <option value ="0">允许</option>
           <option value ="1">不允许</option>         
        </select>
       </div>                  
    </div>
    <div class="juli"></div>
   
   <div class="kuang">
        <div class="left">&nbsp;</div>
       <div class="leftcenter">是否VIP：</div>
       <div class="leftbig">
          <select name="vip">
           <option value ="0">不是</option>
           <option value ="1">是</option>         
        </select>
       </div>                  
    </div>
    <div class="juli"></div>
    <div class="left">&nbsp;</div>
    <div class="leftcenter">&nbsp;</div>
    <div class="leftbig">
    <input type ="submit"  name="submit" value="添加" class="button" />
    </div>
    <div class="julibig"></div>
    <div class="kuan"></div>
    </div>
</form> 
</div>
</div>
</div>
<script type="text/javascript">
        //js本地图片预览，兼容ie[6-9]、火狐、Chrome17+、Opera11+、Maxthon3
        function PreviewImage(fileObj, imgPreviewId, divPreviewId) {
            var allowExtention = ".jpg,.bmp,.gif,.png"; //允许上传文件的后缀名document.getElementById("hfAllowPicSuffix").value;
            var extention = fileObj.value.substring(fileObj.value.lastIndexOf(".") + 1).toLowerCase();
            var browserVersion = window.navigator.userAgent.toUpperCase();
            if (allowExtention.indexOf(extention) > -1) {
                if (fileObj.files) {//HTML5实现预览，兼容chrome、火狐7+等
                    if (window.FileReader) {
                        var reader = new FileReader();
                        reader.onload = function (e) {
                            document.getElementById(imgPreviewId).setAttribute("src", e.target.result);
                        }
                        reader.readAsDataURL(fileObj.files[0]);
                    } else if (browserVersion.indexOf("SAFARI") > -1) {
                        alert("不支持Safari6.0以下浏览器的图片预览!");
                    }
                } else if (browserVersion.indexOf("MSIE") > -1) {
                    if (browserVersion.indexOf("MSIE 6") > -1) {//ie6
                        document.getElementById(imgPreviewId).setAttribute("src", fileObj.value);
                    } else {//ie[7-9]
                        fileObj.select();
                        if (browserVersion.indexOf("MSIE 9") > -1)
                            fileObj.blur(); //不加上document.selection.createRange().text在ie9会拒绝访问
                        var newPreview = document.getElementById(divPreviewId + "New");
                        if (newPreview == null) {
                            newPreview = document.createElement("div");
                            newPreview.setAttribute("id", divPreviewId + "New");
                            newPreview.style.width = document.getElementById(imgPreviewId).width + "px";
                            newPreview.style.height = document.getElementById(imgPreviewId).height + "px";
                            newPreview.style.border = "solid 1px #d2e2e2";
                        }
                        newPreview.style.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod='scale',src='" + document.selection.createRange().text + "')";
                        var tempDivPreview = document.getElementById(divPreviewId);
                        tempDivPreview.parentNode.insertBefore(newPreview, tempDivPreview);
                        tempDivPreview.style.display = "none";
                    }
                } else if (browserVersion.indexOf("FIREFOX") > -1) {//firefox
                    var firefoxVersion = parseFloat(browserVersion.toLowerCase().match(/firefox\/([\d.]+)/)[1]);
                    if (firefoxVersion < 7) {//firefox7以下版本
                        document.getElementById(imgPreviewId).setAttribute("src", fileObj.files[0].getAsDataURL());
                    } else {//firefox7.0+                    
                        document.getElementById(imgPreviewId).setAttribute("src", window.URL.createObjectURL(fileObj.files[0]));
                    }
                } else {
                    document.getElementById(imgPreviewId).setAttribute("src", fileObj.value);
                }
            } else {
                alert("仅支持" + allowExtention + "为后缀名的文件!");
                fileObj.value = ""; //清空选中文件
                if (browserVersion.indexOf("MSIE") > -1) {
                    fileObj.select();
                    document.selection.clear();
                }
                fileObj.outerHTML = fileObj.outerHTML;
            }
            return fileObj.value;    //返回路径
        }
    </script>
