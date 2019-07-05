<?php 
use yii\helpers\Html;
$conn=mysqli_connect('hdm121115553.my3w.com','hdm121115553','swt62899308swt','hdm121115553_db');
  if($conn->connect_errno){
      die('连接失败'.$conn->connect_errno);
  }
  $conn->set_charset('utf8');

$id=$_REQUEST['id']; 


//课程
$kc="SELECT * FROM ke where id='".$id."'";
$kecheng=mysqli_query($conn,$kc);
while($kk=mysqli_fetch_array($kecheng)){
     $name=$kk['kname'];
     $lei=$kk['leibie'];
     $kurl=$kk['img'];
     $ktiao=$kk['tiao'];
     $kvip=$kk['vip'];
}

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
  width:100%;
  height:40px;
  margin: auto;
}

.leftbig{
  width: 400px;
  float:left;
  display: inline;
  height:30px;
}
.leftmiddle{
  width: 290px;
  float:left;
  display: inline;
  height:30px;
  text-align: right;
}
.leftcenter{
  width: 200px;
  float:left;
  display: inline;
  height:30px;
  text-align:center;
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
  width:35%;
  height:30px;
 margin: auto;
} 
.inline{
  margin: auto;
  width:80%;
  height: 30px;
  background-color:#eee;
} 
.left{
  display:inline;
  width:300px;
  line-height: 30px;
  background-color:#eee;
  float:left;
}
.shuru{
  width: 150px;
  height: 30px;
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
.font{
    font-size: 14px;
  font-family: 微软雅黑;
}
</style>


<div class="main ziti">
<div class="nei">
<div class="juli"></div>
  <div class="kuan ziti"><a href="http://www.siwutang.vip/swtmanager/backend/web/index.php?r=kecheng/main">课程管理</a></div>
<form action="/swtmanager/backend/web/index.php?r=kecheng/xiuok" method="post" enctype="multipart/form-data">
     <div class="juli"></div>
    <div class="kuang font">
        <div class="left">&nbsp;</div>
        <div class="leftmiddle">　课程名：<input id="kecheng" name="kecheng" value=<?php echo $name;?>  readonly="readonly" disabled="disabled" class="shuru"></div>
         
    </div>

     <div class="kuang">
        <div class="left">&nbsp;</div>
       <div class="leftmiddle">课程类别：<input id="leibie" name="leibie"  value=<?php echo $lei;?>  readonly="readonly"  disabled="disabled" class="shuru"></div>                  
    </div>
   <div class="kuang">
       <div class="left">&nbsp;</div>
       <div class="leftcenter">课程图片：</div>

       <div class="leftbig"> <input type="radio" name="images" value=<?php echo $kurl ?>/>　　<img src=<?php echo $kurl ?> class="img"/>　　　 
       </div> 
    </div>
    <div class="juli"></div>
   
    <div class="juli"></div>
  <div class="juli"></div>
   <div class="kuang">
        <div class="left">&nbsp;</div>
       <div class="leftcenter">是否允许调课：</div>
       <div class="leftbig">
          <select name="tiao">
          <option value =<?php echo $ktiao?>><?php 
          if($ktiao==0){
            echo "允许";
          }else{
            echo "不允许";
          }


          ?></option>
           <option value ="0">允许</option>
           <option value ="1">不允许</option>         
        </select>

       </div>                  
    </div>
     <div class="kuang">
        <div class="left">&nbsp;</div>
       <div class="leftcenter">是否VIP课程：</div>
       <div class="leftbig">
         <?php if($kvip==0){
           echo "否";
          }else{
            echo "是";
          }
          ?>

       </div>                  
    </div>
    <div class="juli"></div>
    <div class="left">&nbsp;</div>
    <div class="leftcenter">&nbsp;</div>
    <div class="leftbig">
    <input type ="submit"  name="submit" value="修改" class="button" />
    </div>
 <div class="juli"></div>


    </div>
</form>
 
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
