<?php 
  header("Content-type: text/html; charset=utf-8"); 
?>
<!DOCTYPE html>
  <head>
	  <meta charset="UTF-8">
	  <title>弹出窗口</title>
  </head>
<style>
#mask{
	background: #000;
	opacity:0.75;
	filter:alpha(opacity=75);
	position: absolute;
	left:0;
	top:0;
	z-index:1000;
}
#login{
	position:fixed;
	left:30%;
	top:30%;
	z-index:1001;
}
.loginCon{
	width:670px;
	height: 380px;
	background: green;
	position: relative;
}
#close{
	width: 30px;
	height: 30px;
	background: url(img/close.png) no-repeat;
	cursor:pointer;
	position: absolute;
	right:5px; 
	top:5px;
}
</style>
<body>
<script type="text/javascript" src="http://www.siwutang.vip/swtmanager/backend/web/statics/js/jquery-1.4.2.min.js"></script>
<div id="wrapper">
    <a href="javascript:void(0)" target="_parent"  onclick = "openWindow('studentxiang.php?id=<?php echo '175';?>')">详情ew</a>

</div>
<!-- <div id="mask"><div> -->
<!-- <div id="login">
   <div>
      Login
      <div id="close"></div>
   </div>

</div> -->

<script  type="text/javascript" >
// window.onload=function(){
// 	var oBtn=document.getElementById("popup");
//         oBtn.onclick=function(){
//         	var sHeight=document.documentElement.scrollHeight;
// 			var sWidth=document.documentElement.scrollWidth;
// 			//可视区域
// 			var wHeight=document.documentElement.clientHeight;

// 			var oMask=document.createElement("div");
// 			    oMask.id="mask";
// 			    oMask.style.height=sHeight+"px";
// 			    oMask.style.width=sWidth+"px";
// 			    document.body.appendChild(oMask);  //创建遮罩层
// 			var oLogin=document.createElement("div");
// 			    oLogin.id="login";
// 		        oLogin.innerHTML="<div  class='loginCon'><div id='close'></div></div>";
// 			    document.body.appendChild(oLogin);
// 			    //获取login宽度和高度
// 			var dHeight=oLogin.offsetHeight;
// 			var dWidth=oLogin.offsetWidth;

// 			oLogin.style.left=(sWidth-dWidth)/2+"px";
// 			oLogin.style.top=(sHeight-dHeight)/2+"px";

// 			var oClose=document.getElementById("close");
// 			   oMask.onclick= oClose.onclick=function(){
// 			    	document.body.removeChild(oMask);
// 			    	document.body.removeChild(oLogin);
// 			    }
//         }
	
// }
 function openWindow(url){  
           window.open(url,"openWindow","height=200,width=700,menubar=no,titlebar=no,toolbar=no,location=no,scrollbars=no,left=600,top=300");  
       } 
</script>
</body>
</html>