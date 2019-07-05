<?php 

header("Content-type: text/html; charset=utf-8"); 

?>
<style>
.main{
    width:1210px;
    height:500px;
    border:1px #8A8A8A solid;
    background-color:#fff;
    margin-left:15px;
    border-radius:5px;
}
.nei{
	margin:12px;
	background-color:#eee;
	width:98%;
    height:95%;
}
.inline{
	
	width:100%;
	height: 30px;
	background-color:yellow;
} 
.left{
	display:inline;
	width: 200px;
	line-height: 30px;
	background-color:blue;
	float:left;
}
.right{
	display:inline;
	width: 200px;
	line-height: 30px;
	background-color:blue;
	float:right;
}
.center{
	width:100%;
	margin: auto;
 
}
.middle{
	width:90%;
	margin: auto;
    background-color:blue;
}
</style>
<div class="main">
    <div class="nei">
        <div class="inline">
	        <div class="left">left</div>
	        <div class="right">right</div>
        </div>
        <div class="center">

            <div class="middle">center</div>

        </div>

    </div>



</div>