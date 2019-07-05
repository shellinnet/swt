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

//老师注册
$submit=isset($_POST["submit"])?$_POST["submit"]:'';
$teacherphone=isset($_POST["teacherphone"])?$_POST["teacherphone"]:'';
$teachername=isset($_POST["teachername"])?$_POST["teachername"]:'';
$createdtime=time();

if($teacherphone<>''){
$ls="INSERT INTO admin(username,password,created_at,m_tel,m_name,status,leibie) VALUES('".$teacherphone."','000000','".$createdtime."','".$teacherphone."','".$teachername."','10','老师')";
$teacher=mysqli_query($conn,$ls);

$df="select max(id) from admin";
$dfs=mysqli_query($conn,$df);
while($ddf=mysqli_fetch_array($dfs)){
    $id=$ddf['max(id)'];
    $kc="INSERT INTO kecheng(keid,kname,teacherid) VALUES('0','暂无课程','".$id."')";
    $kcs=mysqli_query($conn,$kc);
}

}

?>
<style>
.container{
    width:1120px;
    height:150px;
    border:1px #8A8A8A solid;
    background-color:#fff;
    margin-left:15px;
    border-radius:5px;
   }
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
.main{
    width:1120px;
    height:500px;
    border:1px #8A8A8A solid;
    background-color:#fff;
    margin-left:15px;
    border-radius:5px;
}
.kuang{
	width:1100px;
	height:30px;
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
}
.leftcenter{
  width: 100px;
  float:left;
  display: inline;
  height:30px;
  text-align:center;
  margin-top:5px;
}
.button{

background:#259dab;/*背景色*/
font-size: 14px;
color:white;/*字体颜色*/
width:85px;
height:28px;
border-radius:10px;
cursor:pointer;
border:2px;

}

.kuan{
  width:1000px;
  height: 50px;
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


</style>
<div class="container">
  <div class="juli"></div>
  <div class="ziti">四物堂---老师课程添加</div>
    <img src="/swtmanager/backend/web/statics/images/top.jpg" width="1100" height="82" border="0" usemap="#Map" />
<map name="Map" id="Map"><area shape="rect" coords="3,3,192,78" href="/swtmanager/backend/web/index.php?r=usermobile/register" />
<area shape="rect" coords="229,4,420,78" href="/swtmanager/backend/web/index.php?r=usermobile/main" /><area shape="rect" coords="454,3,643,79" href="/swtmanager/backend/web/index.php?r=teacher/main" /><area shape="rect" coords="679,5,863,80" href="/swtmanager/backend/web/index.php?r=tongzhi/main" /><area shape="rect" coords="902,4,1091,78" href="/swtmanager/backend/web/index.php?r=admin/main" /></map>
  <div class="juli"></div>
</div>
<div class="juli"></div>
<div class="main">
<form action="/swtmanager/backend/web/index.php?r=kecheng/addok" method="post">
    <div class="juli"></div>
    <div class="kuang">
        <div class="left">&nbsp;</div>
        <div class="leftmiddle">课程名：<input id="kecheng" name="kecheng"  ></div>
        <div class="left">&nbsp;</div>
        <div class="leftmiddle">课程类别：<input id="leibie" name="leibie"  ></div>
           
    </div>
    <div class="juli"></div>
    <div class="kuang">
       <div class="left">&nbsp;</div>
       <div class="leftmiddle">上传课程图片： <input type="file" name="file" onchange="PreviewImage(this,'imgHeadPhoto','divPreview');" size="20" /></div>

	</div>
 
    <div class="juli"></div>
    <div class="left">&nbsp;</div>
    <input type ="submit"  name="submit3" value="添加" class="button" />
    <div class="julibig"></div>
        <div class="kuan"></div>
    </div>
</form> 
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
