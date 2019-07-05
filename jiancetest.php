<?php
use yii\helpers\Html;
use yii\bootstrap\NavBar;
use yii\bootstrap\Nav;

?>
<?php $this->beginPage(); ?>
<!DOCTYPE html>
<html lang="<?php echo Yii::$app->language; ?>">
<head>
  <meta charset="UTF-8">
  <title>监测 - 探针平台</title>
  <?php $this->head(); ?>
  <link href="/test/test/web/css/font-awesome-4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
  <link href="/test/test/web/css/index.css" rel="stylesheet" type="text/css" />
  <link href="/test/test/web/css/doubleDate.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/test/test/web/js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="/test/test/web/js/doubleDate2.0.js"></script>
<script type="text/javascript">
$(function(){
  
  $('.doubledate').kuiDate({
    className:'doubledate',
    isDisabled: "1S"  // isDisabled为可选参数，“0”表示今日之前不可选，“1”标志今日之前可选
  });

});

function load() {
   var input = document.getElementById("txbInfo").value;   //获取用户在Info上输入的值
   var input2 = document.getElementById("txbInfo2").value; 
   window.alert ("您输入的是："+ input + input2);
}
function toggle(){
      var test1 = document.getElementById('img1');
      if(test1.src.indexOf('j7_2') >= 0){
          test1.src="/test/test/web/images/jiance/j7_1.jpg"; //选中
          //加载图表1

      }else{
          test1.src="/test/test/web/images/jiance/j7_2.jpg";
          //隐藏图表1
          
      }
  }

  function toggle1(){
      var test1 = document.getElementById('img2');
      if(test1.src.indexOf('j14_1') >= 0){
          test1.src="/test/test/web/images/jiance/j14_2.jpg";
         
      }else{
          test1.src="/test/test/web/images/jiance/j14_1.jpg";
          
      }
  }

   function toggle2(){
      var test1 = document.getElementById('img3');
      if(test1.src.indexOf('j30_1') >= 0){
          test1.src="/test/test/web/images/jiance/j30_2.jpg";
         
      }else{
          test1.src="/test/test/web/images/jiance/j30_1.jpg";
          
      }
  }

</script>
  <style>
  *{
    margin:0;
    padding:0;
    list-style-type:none;
  }
  body{font:16px/180% Arial, Helvetica, sans-serif, "新宋体";}
  .alltext{
    font:16px/180% Arial, Helvetica, sans-serif, "新宋体";
  }
  .na2{height:105px; width:1350px; background: url(/test/test/web/images/jiance/top.jpg); position:fixed; top:0px; left:-10; transition:0.3s; margin-top:0px; _position:absolute; );}
.na2.on{top:0}

  .center-in-center{
    position: absolute;
    left:50%;
    transform:translate(-50%,0);
    -webkit-transform:translate(-50%,0);
    -moz-transform:translate(-50%,0);
    -ms-transform:translate(-50%,0);
    -o-transform:translate(-50%,0);
  }
  .current {
  color:#f7c200;
}
.current a{
  color:#f7c200;
}
        .bannerbox {
            width:100%;
            position:relative;
            overflow:hidden;
            height:245px;
        }
        .bannerwei {
            width:1000px; /*图片宽度*/
            position:absolute;
            left:50%;
            margin-left:-500px; /*图片宽度的一半*/
        }

        .bannerbox1 {
            width:100%;
            position:relative;
            overflow:hidden;
            height:125px;
        }
        .bannerwei1 {
            width:1250px; /*图片宽度*/
            position:absolute;
            left:50%;
            margin-left:-625px; /*图片宽度的一半*/
        }
        .titlename{
  
  font-family: "微软雅黑";
  font-size: 20px;
color:#000000;}

      .bottomname{
        font-family: "微软雅黑";
       font-size: 20px;
       color:#008858;
      }
      .data{
        width:80px;
        height: 35px;
        cursor:pointer;
      }
   /*     li{
          float:left;
          margin-left:10px;
          font-style: "微软雅黑";
          font-size:14px;
          
          } */
    .litype li{
      list-style-type:disc !important;
    }
        
          .inputsize{
          width: 120px;
          height: 30px !important;

          }  
          .div-inline{ float:left;} 
          .listyle ul li{
list-style:none;
display:inline;
text-align:center; 
}
          .iptgroup{width:900px;height:50px;}
.iptgroup li{float:left;height:30px;line-height:30px;padding:2px;}
.iptgroup li .ipticon{background:url(/test/test/web/images/date_icon.gif) 98% 50% no-repeat;border:1px #CFCFCF solid;padding:2px;}
</style>
</head>

<body>
<?php $this->beginBody(); 
      $username =Yii::$app->user->identity->username;
      $tu = Yii::$app->user->identity->avator;
?> 
<script type="text/javascript" src="http://echarts.baidu.com/gallery/vendors/echarts/echarts.min.js"></script>

 <div class="bannerbox1">
     <div class="bannerwei1">

    <img src="/test/test/web/images/jiance/top.jpg"></image>
   </div> 
</div>
<div style="width:1000px;height: 20px;"></div>
<div style="width:1000px;height: 50px;" class="center-in-center">
  <div style="text-align: left;"><?php echo $username ?>   <img id="imgupload" style="width: 30px;height: 30px;border-radius:50%; "  src= <?php echo $tu  ?>  /></div>

</div>

<div style="width:1000px;height: 20px;">  </div>
<div style="width:1000px;height: 50px;"></div>
    <div class="bannerbox">
         <div class="bannerwei">

        <img src="/test/test/web/images/jiance/head.jpg" usemap="#Map">
            <map name="Map">
              <area shape="rect" coords="66,1,156,126" href="index.php?r=site/jiancetest" onFocus="this.blur()">
              <area shape="rect" coords="301,117,399,243" href="index.php?r=site/diaoxing" onFocus="this.blur()">
              <area shape="rect" coords="555,1,643,123" href="index.php?r=site/meiti" onFocus="this.blur()">
              <area shape="rect" coords="817,122,910,246" href="index.php?r=site/change" onFocus="this.blur()">
            </map>
        </image>
    </div> 
</div>
<div style="width:1000px;height: 50px;"></div>
<div style="width:1000px;height: 50px;" class="center-in-center">

     <ul style="list-style:none;" class="iptgroup">
         <li > <div style="width: 100px;">&ensp;  </div>  </li>
         <li>开始时间：</li>
         <li><input type="text" readonly="readonly" id="txbInfo" class="doubledate ipticon inputsize"/></li>
         <li>结束时间:</li>
         <li><input type="text" readonly="readonly" id="txbInfo2" class="doubledate ipticon inputsize"/></li>
         <li><image src="images/jiance/j7_2.jpg" id="img1" onclick="toggle()" class="data"></image></li>
         <li><image src="images/jiance/j14_1.jpg" id="img2" onclick="toggle1()" class="data"></image></li>
         <li><image src="images/jiance/j30_1.jpg" id="img3" onclick="toggle2()" class="data"></image></li>
         <li><input type ="button" id="btnGet" name="btnGet" value="提交" style="background:#000000;color:white;width:85px;height:26px;border-radius:10px;cursor:pointer;border:1px;font:14px Arial, Helvetica, sans-serif, "新宋体";" onclick="load()" onFocus="this.blur()" /></li>
     </ul>
</div>
    
    <div style="width: 1250px;height: 10px;background-color: #bfbfbf;top:1750px;position:absolute;" class="center-in-center"></div>
    <div style="width: 1250px;height: 10px;background-color: #bfbfbf;top:2350px;position:absolute;" class="center-in-center"></div>
<div style="width:1000px;height: 100px;"></div>
<div style="width:1000px;height: 750px;" class="center-in-center">
    <!-- 第1个数据图 -->
  <div class="center-in-center" style="width:800px;">
  <div class="titlename center-in-center" >舆情调性趋势表</div>
  <div id="showGo" class="iptgroup" style=" position: absolute;left:100px;top:50px;width: 800px;height: 30px;text-align:bottom; ">
     <!--   <ul >
       <li style=" padding: 30px;">13</li>
       <li style=" padding: 35px;">8</li>
       <li style=" padding: 40px;">11</li>
       <li style=" padding: 40px;">8</li>
       <li style=" padding: 40px;">9</li>
       <li style=" padding: 35px;">4</li>
       <li style=" padding: 35px;">11</li>
    </ul>  -->
  </div>

     <div id="container" style="height:400px; width: 760px;left:10px;padding: 0; position: absolute;top:80px;border:2px solid;border-color:#eee;"></div>
    <div  class="svgs center" style="height:100px; width: 700px;left:280px;position: absolute;top:620px;"> 
    </div>

    <!-- <div class="listyle" style="position: absolute; left:105px; top:430px;width: 1200px;height: 80px;"> 
    <ul >
       <li style=" padding: 28px;">DAY1</li>
       <li style=" padding: 27px;">DAY2</li>
       <li style=" padding: 27px;">DAY3</li>
       <li style=" padding: 27px;">DAY4</li>
       <li style=" padding: 27px;">DAY5</li>
       <li style=" padding: 27px;">DAY6</li>
       <li style=" padding: 27px;">DAY7</li>
    </ul>

    </div> -->

 </div>
</div>
<div style="width:1000px;height: 530px;"></div>

<div style="width:1000px;height: 750px;" class="center-in-center" >
  <!-- 第2个数据表 -->
     <div class="titlename center-in-center" >舆情平台分布情况</div>

     <div id="container2" style="height:700px; width: 800px;left:10px;padding: 0;"></div>
</div>

<div style="width:1000px;height: 630px;"></div>
<!-- 第三个数据表 -->
<div style="width:1000px;height: 750px;" class="center-in-center" >
    <div class="titlename center-in-center" > 舆情调性平台趋势</div>
       <div style="width:1000px;height: 30px;" ></div>
       <div style="width:800px;height: 50px;" class="center-in-center iptgroup" >
          <ul >
            <li style=" padding: 58px;"></li>
             <li style=" padding: 30px;">13%</li>
             <li style=" padding: 30px;">15%</li>
             <li style=" padding: 30px;">16%</li>
            <li style="padding: 30px;color: #008858;">17%</li>
             <li style=" padding: 30px;">15%</li>
              <li style="padding: 31px;color: #920211;">10%</li>
               <li style=" padding: 31px;">14%</li>
          </ul>
        </div>    
       <div style="width:1000px;height: 30px;" ></div>
    <div id="containermain" style="height:550px; width: 800px;left:130px;padding: 0;" ></div>
</div>
<div style="width:1000px;height: 630px;"></div>
<div style="width:1000px;height: 750px;" class="center-in-center" >
    <div style="width:890px;height: 750px;" class="center-in-center">
         <div class="div-inline"><image src="images/jiance/no1.jpg"></image></div>
         <div class="div-inline">
            <div style="height: 10px;"></div>
            <div class="bottomname">微信阅读量媒体TOP5</div> 
            <div style="height: 10px;"></div>
            <div style="width:  130px;">
               
               <ul >
                  <li><text style="font-size: 10px;">● </text>直销堂网</li>
                  <li><text style="font-size: 10px;">● </text>P2P内幕</li>
               </ul> 
                                           
             </div>
         </div>
         <div class="div-inline" style="width: 150px;">&ensp;</div>
         <div class="div-inline"><image src="images/jiance/no2.jpg"></div>
          <div class="div-inline">
            <div style="height: 10px;"></div>
            <div class="bottomname">微信发布负面媒体TOP5</div> 
            <div style="height: 10px;"></div>
            <div style="width:  130px;">
               
               <ul >
                  <li><text style="font-size: 10px;">● </text>反转联盟</li>
                  <li><text style="font-size: 10px;">● </text>直销课堂</li>
               </ul> 
                                           
             </div>
         </div>
    </div>
    <div style="width:1000px;height: 230px;"></div>
    <div style="width:890px;height: 750px;" class="center-in-center">
        <div class="div-inline"><image src="images/jiance/no3.jpg"></image></div>
         <div class="div-inline">
            <div style="height: 10px;"></div>
            <div class="bottomname">微博发布负面媒体TOP5</div> 
            <div style="height: 10px;"></div>
            <div style="width:  130px;">
               
               <ul >
                  <li><text style="font-size: 10px;">● </text>求实的人ok</li>
                  <li><text style="font-size: 10px;">● </text>超小呆很乖2016</li>
               </ul> 
                                           
             </div>
         </div>
         <div class="div-inline" style="width: 150px;">&ensp;</div>
         <div class="div-inline"><image src="images/jiance/no4.jpg"></div>
          <div class="div-inline">
            <div style="height: 10px;"></div>
            <div class="bottomname">其他平台负面媒体TOP5</div> 
            <div style="height: 10px;"></div>
            <div style="width:  130px;">
               
               <ul >
                  <li><text style="font-size: 10px;">● </text>百度贴吧</li>
                  <li><text style="font-size: 10px;">● </text>人民网</li>
               </ul> 
                                           
             </div>
         </div>

    </div>
</div>

<!-- 动态加载数据 -->
<script type="text/javascript">
var arr1=[],arr2=[],arr3=[],arr4=[];
              function arrTest(){
                $.ajax({
                  type:"post",
                  async:false,
                  url:"http://www.qingyingtech.com/test/test/test28.php",
                  data:{},
                  dataType:"json",
                  success:function(result){
                    if (result) {
                      for (var i = 0; i < result.length; i++) {
                          arr1.push(result[i].time);
                          arr2.push(result[i].allok);
                          arr3.push(result[i].allzl);
                          arr4.push(result[i].allfu);
                      }
                    }
                  }
                })

                return arr1,arr2;
              }
                  arrTest();//7天数据


</script>
<!-- 第一个数据图 -->
<script type="text/javascript">
var dom = document.getElementById("container");
var myChart = echarts.init(dom);
var app = {};
option = null;

option = {
     toolbox:{  //工具箱配置
          show:true,
          orient :'vertical',

          feature:{
              magicType: {type: ['line', 'bar']},
             
              dataView:{
                  show:true
              },
              restore:{
                  show:true
              },
            
              saveAsImage:{
                  show:true
              },            
          }
      },
     tooltip : {
        trigger: 'axis',
        axisPointer : {            
            type : 'line'       
        },
        textStyle:{
　　align:'left'
　　　　}
    },
     legend: {
         x:'120',    
        orient:'vertical',
        y:'200',
        left:'left',
         itemGap:20,
         data:[
            {
              name:'正面',
              icon:'circle',
              textStyle:{
                 fontSize:15,
                 color:'#008858',
               
              }

            },
             {
              name:'负面',
              icon:'circle',
              textStyle:{
                 fontSize:15,
                 color:'#808080',
                
              }
            },
            {
              name:'中立',
              icon:'circle',
              textStyle:{
                 fontSize:15,
                 color:'#A2D9C4',

              }
            }, 
            
         ]
    },
   
    grid: {
        left: '10%',
        right: '10%',
        bottom: '2%',

        containLabel: true
    },
    xAxis:  {
        type: 'category',
          splitLine: {
          show: false, 
 
    },
       axisLabel: {        
                    show: true,
                    textStyle: {
                        color: '#000',
                       
                    }

                },
        data: arr1          
    },
    yAxis: {
        type: 'value',
          splitLine: {
          show: false, 
 
    },
        show:true,
    },
    series: [

              {
            name: '负面',
            type: 'bar',
            stack: '总数',
             barWidth:50,
            label: {
                normal: {
                   
                    position: 'insideRight'
                }
            },
            itemStyle:{
                normal:{
                    color:'#920211'
                }
            },
            data: arr4
        }, 
       
        {
            name: '中立',
            type: 'bar',
            stack: '总数',
            label: {
                normal: {
                    
                    position: 'insideRight'
                }
            },
             itemStyle:{
                normal:{
                    color:'#808080'
                }
            },
            data: arr3
        },
         {

            name: '正面',
            type: 'bar',
            stack: '总数',
            label: {
                normal: {
                   
                    position: 'insideRight'
                }
            },
            itemStyle:{
                normal:{
                    color:'#008858',

                }
            },
            data: arr2
        }, 
        
    ]

    
};
if (option && typeof option === "object") {
    myChart.setOption(option, true);
}
</script>

<!-- 第二个数据图 -->
<script type="text/javascript">
var dom = document.getElementById("container2");
var myChart = echarts.init(dom);
var app = {};
option = null;
app.title = '环形图';

option = {
     toolbox:{  //工具箱配置
          show:true,
          orient :'vertical',

          feature:{
              magicType: {type: ['line', 'bar']},
             
              dataView:{
                  show:true
              },
              restore:{
                  show:true
              },
            
              saveAsImage:{
                  show:true
              },            
          }
      },
    tooltip: {
        trigger: 'item',
        formatter: "{b}: {d}%"
    },
    legend: {
         left:100,
        orient: 'vertical',
        x: 'left',
        data:['微博','微信','百度','知乎','电商']
    },
    series: [
        {
           
            type:'pie',
             center:['65%','45%'],
            radius: ['20%', '70%'],
            avoidLabelOverlap: false,
            label: {
                normal: {
                    show: false,
                    position: 'center'
                },
                emphasis: {
                    show: true,
                    textStyle: {
                        fontSize: '30',
                        fontWeight: 'bold'
                    }
                }
            },
            labelLine: {
                normal: {
                    show: false
                }
            },
            data:[
                {value:60, name:'微博'},
                {value:80, name:'微信'},
                {value:100, name:'百度'},
                {value:80, name:'知乎'},
                {value:50, name:'电商'}
            ]
        }
    ]
};
;
if (option && typeof option === "object") {
    myChart.setOption(option, true);
}
</script>

<!-- 第三个数据表 -->

<script type="text/javascript">
var dom = document.getElementById("containermain");
var myChart = echarts.init(dom);
var app = {};
option = null;
option = {
    toolbox:{  //工具箱配置
          show:true,
          orient :'vertical',

          feature:{
              magicType: {type: ['line', 'bar']},
             
              dataView:{
                  show:true
              },
              restore:{
                  show:true
              },
            
              saveAsImage:{
                  show:true
              },            
          }
      },
    tooltip: {
        trigger: 'item',
        formatter:"{a}<br>{b}:{c}%",

        // extraCssText:'width:160px;height:80px;background:red;'
    },
    legend: {
        data:['总体','网媒','微信','微博'],

         orient:'vertical',
         left:'left',
         itemGap:20,
         data:[
            {
              name:'总体',
              icon:'circle',
              textStyle:{
                 fontSize:15,
                 color:'#008858'
              }

            },
             {
              name:'网媒',
              icon:'circle',
              textStyle:{
                 fontSize:15,
                 color:'#920211'
              }
            },
            {
              name:'微信',
              icon:'circle',
              textStyle:{
                 fontSize:15,
                 color:'#A2D9C4'
              }
            }, 
            {
              name:'微博',
              icon:'circle',
              textStyle:{
                 fontSize:15,
                 color:'#F7C200'
              }
            }, 
         ]
    },
    grid: {
        left: '13%',
        right: '10%',
        bottom: '15%',
        containLabel: true
    },

    xAxis: {
        type: 'category',
          splitLine: {
          show: false, 
 
        },

        boundaryGap: false,
         splitLine:{
          show:true
        },
        axisLabel:{
          show: true,
          color:'#000',
            fontSize:'16'
        },
        data: ['DAY1', 'DAY2', 'DAY3', 'DAY4', 'DAY5', 'DAY6', 'DAY7']
    },
    yAxis: {
        type: 'value',
          splitLine: {
          show: false, 
 
    },
         show:true,
    },
    series: [
        {
            name:'总体',
            type:'line',
            symbol: 'circle',
            symbolSize: 18,
            itemStyle:{
                   normal:{
                    color:'#008858',
                    lineStyle:{
                         width:0
                    }
                   }

            },
            data:[32, 22, 21, 14, 55, 30, 20]
        },
        {
            name:'网媒',
            type:'line',
            symbol: 'circle',
            symbolSize: 18,
            itemStyle:{
                   normal:{
                    color:'#920211'
                   }
            },
            data:[26, 1, 9, 5, 8, 4, 25]
        },
        {
            name:'微信',
            type:'line',
            symbol: 'circle',
            symbolSize: 18,
            itemStyle:{
                   normal:{
                    color:'#A2D9C4'
                   }
            },
            data:[15, 23, 20, 15, 19, 33, 41]
        },
        {
            name:'微博',
            type:'line',
            symbol: 'circle',
            symbolSize: 18,
            itemStyle:{
                   normal:{
                    color:'#F7C200'
                   }
            },
            data:[32, 32,11, 24, 30, 31, 20]
        },
       
    ]
};
;
if (option && typeof option === "object") {
    myChart.setOption(option, true);
}
</script>

<div class="na2 " >
<div  style="width:1200px;height: 50px;" class="center-in-center " >
  <div style="width:1200px;height: 50px;background:url(/test/test/web/images/jiance/top.jpg)!important;" class="center-in-center " >
 <!--    <div class="row middle" style="width: 1450px;margin-left:5px;background-color:white;"> -->
 
      <div class="div-inline" >
            <image class="logoimgfu" src="/test/test/web/images/logo/fu.jpg"/></image> 
                                         
        </div> 
        <div class="div-inline" style="width:300px;height: 50px;">  </div>
        <div class="div-inline" style="left:50px;">     
    <table width="570" border="0" cellpadding="10">
              <tr>
                <th colspan="5" scope="col" style="text-align:right!important;height: 50px;"><i class="fa fa-user-md"></i><a href="index.php?r=site/change" >个人信息</a></th>
              </tr>
              <tr style="height: 40px !important;">
                <th scope="col" style="width:200px;text-align:right;">
                   <?php
                $status = Yii::$app->user->identity->openid;
                if (!$status == 0) {
                    ?>
                    <a href="index.php?r=site/index" > SEO</a>
                    <?php
                }else{
                    ?>
                    <a href="index.php?r=site/seo" > SEO</a>
                    <?php
                }
                ?>


                </th>
                <th scope="col" style="width: 100px;text-align:right;"><a href="index.php?r=site/sem" >SEM</a></th>
                <th scope="col" style="width:100px;text-align:right;" class="current"><a href="index.php?r=site/jiancetest" >监测</a></th>
                <th scope="col" style="width: 20px;text-align:center;"></th>
                <th scope="col" style="width: 100px;text-align:center;height: 40px;" ><i class="fa fa-sign-out"></i><a href="index.php?r=site/action=logout" >退出</a></th>
              </tr>
            </table>             
</div> 
</div>
        
    </div>
</div>

 <div style="width:1000px;height: 500px;"></div>
    <div style="width:1000px;height: 50px;text-align: center;" class="center-in-center">
探针平台 copyright © 2017-2020 YaGaoTanzhen Corporation All Right Reserved
<?php $this->endBody(); ?>
</body>

</html>
<?php $this->endPage() ?>
