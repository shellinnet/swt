<?php
ini_set("display_errors", "on");
echo "bi";
$dd= array();
$dd[]=array(
            array(
                "name" => "Jack",
                "code" => "123",
            ),
            array(
                "name" => "Jack",
                "code" => "456",
            ),
        );
        
print_r(json_encode($dd));

?>


<!DOCTYPE html> 
<html> 
<head> 
<meta charset="UTF-8">
 <title>短信</title>
  </head> 
  <body>
   <button onclick="alertDemo();" >提示框</button><br/> <button onclick="confirmDemo();" >确认框</button><br/> <button onclick="promptDemo();" >输入框</button><br/> <button onclick="openDemo();" >打开一个新的页面</button><br/> <button onclick="setTimeoutDemo();" >打开定时器</button><br/> <button onclick="clearTimeoutDemo();" >关闭定时器</button><br/> <button onclick="setIntervalDemo();" >打开定时器2</button><br/> <button onclick="clearIntervalDemo();" >关闭定时器2</button><br/> 
   </body> 
   <script type="text/javascript">
   window.alert(5+6);
    //提示框
    function alertDemo(){
        alert("我是个提示框");
    }
    //确认框
    function confirmDemo(){
        var cf = confirm("是否确认？");
        alert("如果你点击了确认，返回值 为true，如果你点击了取消，返回值 为false；本次的返回值 为："+cf);
    }
    //输入框
    function promptDemo(){
        var name = prompt("请输入您的用户名：");
        alert("您输入的用户名为："+name);
    }
    //打开一个新的页面
    function openDemo(){
        open("JSDemo1.html");
    }

    //开启第一种定时器，每隔三秒执行一次
    var setTimeoutName ;
    var i = 0;
    var setTimeoutDemo = function(){
        alert("第一种定时器执行第："+(++i)+"次");
        setTimeoutName = setTimeout(setTimeoutDemo,10000);
    }   
    //关闭定时器
    function clearTimeoutDemo(){
        clearTimeout(setTimeoutName);
        i = 0;
        alert("关闭定时器成功");
    }

    //开启第二种定时器，每隔二秒执行一次
    function setIntervalDemo(){
        setTimeoutName = setInterval(function(){
            alert("第二种定时器执行第："+(++i)+"次");
        },20000);
    }
    //关闭第二种定时器
    var clearIntervalDemo = function(){
        clearInterval(setTimeoutName);
        i = 0; 
        alert("关闭定时器成功");
    }
</script> </html>
