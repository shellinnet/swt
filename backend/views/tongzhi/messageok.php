<?php
ini_set("display_errors", "on");

use yii\helpers\Html;
$lj='/data/home/hyu4458630001/htdocs/swtmanager';
require $lj . '/vendor/api_sdk/vendor/autoload.php';

use Aliyun\Core\Config;
use Aliyun\Core\Profile\DefaultProfile;
use Aliyun\Core\DefaultAcsClient;
use Aliyun\Api\Sms\Request\V20170525\SendSmsRequest;
use Aliyun\Api\Sms\Request\V20170525\SendBatchSmsRequest;
use Aliyun\Api\Sms\Request\V20170525\QuerySendDetailsRequest;

set_time_limit(0);
header('Content-Type: text/plain; charset=utf-8');
Config::load();
$conn=mysqli_connect('hdm121115553.my3w.com','hdm121115553','swt62899308swt','hdm121115553_db');
  if($conn->connect_errno){
      die('连接失败'.$conn->connect_errno);
  }
  $conn->set_charset('utf8');
$submit=isset($_POST["submit"])?$_POST["submit"]:'';
$begindate=isset($_POST["begindate"])?$_POST["begindate"]:'';
$enddate=isset($_POST["enddate"])?$_POST["enddate"]:'';
$tnameid=isset($_POST["tnameid"])?$_POST["tnameid"]:'';  //teacherid
$content=isset($_POST["content"])?$_POST["content"]:''; //短信内容

$tname="select m_name from admin where id='".$tnameid."'";
$tnames=mysqli_query($conn,$tname);
while($tt=mysqli_fetch_array($tnames)){
     $ttname=$tt['m_name'];
}

$tleibie=$ttname."老师休息";

$all="INSERT INTO cunrest(begintime,endtime,leibie) VALUES('".$begindate."','".$enddate."','".$tleibie."')";
$alls=mysqli_query($conn,$all);

//1.查询休息期间该老师所有学员的上课信息
$xue="SELECT * from course where teacherid='".$tnameid."' and time>='".$begindate."' and time<='".$enddate."' and xueyuan<>'' group by xueyuan";
$xues=mysqli_query($conn,$xue);
while($xueyuan=mysqli_fetch_array($xues)){
     $xuesheng=$xueyuan['xueyuan'];
     echo $xuesheng." / ";
     //查询该学员上什么课
     $sk="SELECT * from course where teacherid='".$tnameid."' and time>='".$begindate."' and time<='".$enddate."' and xueyuan='".$xuesheng."' group by kid ";
     $sks=mysqli_query($conn,$sk);
     
     //2.查询每个学员什么课上几次课
     while($sjc=mysqli_fetch_array($sks)){
        $skid=$sjc["kid"];
        $kec="SELECT * from course where teacherid='".$tnameid."' and time>='".$begindate."' and time<='".$enddate."' and xueyuan='".$xuesheng."' and kid='".$skid."' order by time";
        $kes=mysqli_query($conn,$kec);
        $num_rows=mysqli_num_rows($kes); //共几次课程
         echo $num_rows."<br>";
         //3.查询每个学员最后一次上课时间
        $zuihou="select * from course where teacherid='".$tnameid."'  and xueyuan='".$xuesheng."' and kid='".$skid."' order by time desc limit 1";
        $zh=mysqli_query($conn,$zuihou);
        while($end=mysqli_fetch_array($zh)){
              $times=$end['time']; 
              $weeks=$end['week'];
              $ktimes=$end['ktime'];
              $totals=$end['total'];
              $sykss=$end['syks'];
              $states=$end['state'];
       }
  
       $newtimes=$times;
        //向后添加几次课程
        for($i=0;$i<$num_rows;$i++){
           $newtimes=date("Y-m-d", strtotime("$newtimes+7 day"));

          //插入课程
          $cr="INSERT INTO course(time,week,ktime,kid,total,teacherid,syks,qian,state,closed,xueyuan) VALUES('".$newtimes."','".$weeks."','".$ktimes."','".$skid."','".$totals."','".$tnameid."','".$sykss."',0,'".$states."',0,'".$xuesheng."')";
          echo $cr."<br>";
          $crs=mysqli_query($conn,$cr);
        }
       
       //查询有效期，有效期增加7天*几次
       $yx="select * from student where sname='".$xuesheng."' and teacherid='".$tnameid."' and knameid='".$skid."'";
       $you=mysqli_query($conn,$yx);
       while($qi=mysqli_fetch_array($you)){
            $qtime=$qi["oktime"];
            $cishu=7*$num_rows;
            $qtimes=date("Y-m-d", strtotime("$qtime   +$cishu day"));
           //更新有效期
           $gen="UPDATE student SET oktime='".$qtimes."' where sname='".$xuesheng."' and teacherid='".$tnameid."' and knameid='".$skid."' ";
           $genx=mysqli_query($conn,$gen);
       }
     }
  
}

//6.删除休息期间该老师所有学员的课程
$delno="DELETE FROM course where teacherid='".$tnameid."' and time>='".$begindate."' and time<='".$enddate."' ";
$delnos=mysqli_query($conn,$delno);
//查询所有该老师学员的手机
//$sj="select a.xueyuan,b.mobile from course a,student b where a.xueyuan=b.sname and a.teacherid=b.teacherid and a.teacherid='".$tnameid."' and  a.time>='".$begindate."' and a.time<='".$enddate."' group by a.xueyuan,b.mobile";
//$shou=mysqli_query($conn,$sj);
//while($shouji=mysqli_fetch_array($shou)){
//    $mobile=$shouji['mobile'];
//    $xueyaun=$shouji['xueyuan'];
//}
////发送短信
////查询老师名
//$teacher="select id,m_name from admin where id='".$tnameid."'";
//$teachers=mysqli_query($conn,$teacher);
//while($tn=mysqli_fetch_array($teachers)){
//    $teachername=$tn['m_name'];
//}

//class SmsDemo
//{
//
//    static $acsClient = null;
//
//    /**
//     * 取得AcsClient
//     *
//     * @return DefaultAcsClient
//     */
//
//    public static function getAcsClient() {
//        //产品名称:云通信短信服务API产品,开发者无需替换
//        $product = "Dysmsapi";
//
//        //产品域名,开发者无需替换
//        $domain = "dysmsapi.aliyuncs.com";
//
//        // TODO 此处需要替换成开发者自己的AK (https://ak-console.aliyun.com/)
//        $accessKeyId = "LTAIUgNdwZrVD68Z"; // AccessKeyId
//
//        $accessKeySecret = "RfmHNKea6VpAEAJFM98Muq8P1CviZO"; // AccessKeySecret
//
//        // 暂时不支持多Region
//        $region = "cn-hangzhou";
//
//        // 服务结点
//        $endPointName = "cn-hangzhou";
//
//
//        if(static::$acsClient == null) {
//
//            //初始化acsClient,暂不支持region化
//            $profile = DefaultProfile::getProfile($region, $accessKeyId, $accessKeySecret);
//
//            // 增加服务结点
//            DefaultProfile::addEndpoint($endPointName, $region, $product, $domain);
//
//            // 初始化AcsClient用于发起请求
//            static::$acsClient = new DefaultAcsClient($profile);
//        }
//        return static::$acsClient;
//
//    }
//
//    /**
//     * 发送短信
//     * @return stdClass
//     */
//    public static function sendSms($teachername,$begindate,$enddate) {
//      $a=$teachername;
//
//        // 初始化SendSmsRequest实例用于设置发送短信的参数
//        $request = new SendSmsRequest();
//
//        //可选-启用https协议
//        //$request->setProtocol("https");
//
//        // 必填，设置短信接收号码
//        $request->setPhoneNumbers("13764041075");
//
//        // 必填，设置签名名称，应严格按"签名名称"填写，请参考: https://dysms.console.aliyun.com/dysms.htm#/develop/sign
//        $request->setSignName("四物堂");
//
//        // 必填，设置模板CODE，应严格按"模板CODE"填写, 请参考: https://dysms.console.aliyun.com/dysms.htm#/develop/template
//        $request->setTemplateCode("SMS_154593487");
//
//        // 可选，设置模板参数, 假如模板中存在变量需要替换则为必填项
//        $request->setTemplateParam(json_encode(array(  // 短信模板中字段的值
//            "teacher"=>$teachername,
//            "begintime"=>$begindate,
//            "endtime"=>$enddate
//        ), JSON_UNESCAPED_UNICODE));
//
//        // 可选，设置流水号
//        $request->setOutId("yourOutId");
//
//        // 选填，上行短信扩展码（扩展码字段控制在7位或以下，无特殊需求用户请忽略此字段）
//        $request->setSmsUpExtendCode("1234567");
//
//        // 发起访问请求
//        $acsResponse = static::getAcsClient()->getAcsResponse($request);
//
//        return $acsResponse;
//    }
//
//}
//
//
//$response = SmsDemo::sendSms($teachername,$begindate,$enddate);
//echo "发送短信(sendSms)接口返回的结果:\n";
//print_r($response);

?>
<script type="text/javascript" src="http://www.qingyingtech.cn/swt/backend/web/statics/js/jquery-1.4.2.min.js"></script>
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
color:#fff;/*字体颜色*/
width:100px;
height:28px;
border-radius:10px;
cursor:pointer;
border:2px;
text-align: center;
line-height: 28px;

}
.button link{
  color:#fff; !important;
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

         table  
        {  
            border-collapse: collapse;  
            margin: 0 auto;  
            text-align: center;
             border-color:#fff;  
        }  
        table td, table th  
        {  
            border: 2px solid #fff;  
            color: #666;  
            height: 30px;  
        }  
        table thead th  
        {  
            background-color: #7CC7EA; 
           
            text-align: center;
            color:#fff; 
        }  
        table tr:nth-child(odd)  
        {  
            background: #ECF5FB;  
        }  
        table tr:nth-child(even)  
        {  
            background: #CBE9F7;  
        }

</style>

<div class="container">
  <div class="juli"></div>
  <div class="ziti">四物堂---老师休息发送短信消息</div>
     <img src="/swtmanager/backend/web/statics/images/top.jpg" width="1100" height="82" border="0" usemap="#Map" />
<map name="Map" id="Map"><area shape="rect" coords="3,3,192,78" href="/swtmanager/backend/web/index.php?r=usermobile/register" />
<area shape="rect" coords="229,4,420,78" href="/swtmanager/backend/web/index.php?r=usermobile/main" /><area shape="rect" coords="454,3,643,79" href="/swtmanager/backend/web/index.php?r=teacher/main" /><area shape="rect" coords="679,5,863,80" href="/swtmanager/backend/web/index.php?r=tongzhi/main" /><area shape="rect" coords="902,4,1091,78" href="/swtmanager/backend/web/index.php?r=admin/main" /></map>
  <div class="juli"></div>
</div>

<div class="juli"></div>

<div class="main">

<div class="juli"></div>
<div class="left">&nbsp;</div>
<div class="kuan">
    老师休息，课程调课通知发送成功！
</div>

</div>