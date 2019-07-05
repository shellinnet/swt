<!DOCTYPE html>
<html >
   <head>
       <meta charset="utf-8">
   </head>
   <body >
      
       <script type="text/javascript" src="http://echarts.baidu.com/gallery/vendors/echarts/echarts.min.js"></script>
     <script type="text/javascript" src="js/jquery-3.3.1.js"></script>
      <!--    <link rel="stylesheet" href="easyui/themes/default-bak/easyui.css">  
    <link rel="stylesheet" href="resources/easyui/themes/icon.css">  
    <script src="easyui/jquery.min.js"></script>  
    <script src="easyui/jquery.json-2.4.js"></script>  
    <script src="easyui/jquery.easyui.min.js"></script>  
    <script src="easyui/locale/easyui-lang-zh_CN.js"></script>   -->
<!-- <script src="js/echars/echarts.js"></script> -->
<!--  <script type="text/javascript" src="http://echarts.baidu.com/build/dist/echarts.js"></script>  -->
      <div id="container" style="height:400px; width: 760px;left:10px;padding: 0; position: absolute;top:80px;border:2px solid;"></div>


<script type="text/javascript">
//初始化echarts实例  
 var  myChart = echarts.init(document.getElementById('container'));
     var arr1=[],arr2=[];
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
                          arr1.push(result[i].name);
                          arr2.push(result[i].age);
                      }
                    }
                  }
                })

                return arr1,arr2;
              }
              arrTest();
              var  option = {
                    tooltip: {
                        show: true
                    },
                    legend: {
                       data:['age']
                    },
                    xAxis : [
                        {
                            type : 'category',
                            data : arr1
                        }
                    ],
                    yAxis : [
                        {
                            type : 'value'
                        }
                    ],
                    series : [
                        {
                            "name":"age",
                            "type":"bar",
                            "data":arr2
                        }
                    ]
                };
                // 为echarts对象加载数据
                console.log(option);
                myChart.setOption(option);
            // }
</script>
   </body>
</html>