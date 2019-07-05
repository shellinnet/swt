<?php 
set_time_limit(0);

require_once dirname(__DIR__) . '/htdocs/api_sdk/vendor/autoload.php';

use Aliyun\Core\Config;
use Aliyun\Core\Profile\DefaultProfile;
use Aliyun\Core\DefaultAcsClient;
use Aliyun\Api\Sms\Request\V20170525\SendSmsRequest;
use Aliyun\Api\Sms\Request\V20170525\SendBatchSmsRequest;
use Aliyun\Api\Sms\Request\V20170525\QuerySendDetailsRequest;

Config::load();

$conn=mysqli_connect('hdm121115553.my3w.com','hdm121115553','swt62899308swt','hdm121115553_db');
  if($conn->connect_errno){
      die('连接失败'.$conn->connect_errno);
  }
  $conn->set_charset('utf8');

$qunfa= array();
$ming=array();
$xue=array();
//发送短信
  class SmsDemo
{
    static $acsClient = null;

    /**
     * 取得AcsClient
     *
     * @return DefaultAcsClient
     */
   
    public static function getAcsClient() {
        //产品名称:云通信短信服务API产品,开发者无需替换
        $product = "Dysmsapi";

        //产品域名,开发者无需替换
        $domain = "dysmsapi.aliyuncs.com";

        // TODO 此处需要替换成开发者自己的AK (https://ak-console.aliyun.com/)
        $accessKeyId = "LTAIUgNdwZrVD68Z"; // AccessKeyId

        $accessKeySecret = "RfmHNKea6VpAEAJFM98Muq8P1CviZO"; // AccessKeySecret

        // 暂时不支持多Region
        $region = "cn-hangzhou";

        // 服务结点
        $endPointName = "cn-hangzhou";


        if(static::$acsClient == null) {

            //初始化acsClient,暂不支持region化
            $profile = DefaultProfile::getProfile($region, $accessKeyId, $accessKeySecret);

            // 增加服务结点
            DefaultProfile::addEndpoint($endPointName, $region, $product, $domain);

            // 初始化AcsClient用于发起请求
            static::$acsClient = new DefaultAcsClient($profile);
        }
        return static::$acsClient;

    }

   public static function sendBatchSms($qunfa,$ming,$c) {

        // 初始化SendSmsRequest实例用于设置发送短信的参数
        $request = new SendBatchSmsRequest();

        //可选-启用https协议
        //$request->setProtocol("https");

        // 必填:待发送手机号。支持JSON格式的批量调用，批量上限为100个手机号码,批量调用相对于单条调用及时性稍有延迟,验证码类型的短信推荐使用单条调用的方式
        $request->setPhoneNumberJson(json_encode($qunfa, JSON_UNESCAPED_UNICODE));

        // 必填:短信签名-支持不同的号码发送不同的短信签名
         $request->setSignNameJson(json_encode($ming, JSON_UNESCAPED_UNICODE));

        // 必填:短信模板-可在短信控制台中找到
        $request->setTemplateCode("SMS_153993661");

        // 必填:模板中的变量替换JSON串,如模板内容为"亲爱的${name},您的验证码为${code}"时,此处的值为
        // 友情提示:如果JSON中需要带换行符,请参照标准的JSON协议对换行符的要求,比如短信内容中包含\r\n的情况在JSON中需要表示成\\r\\n,否则会导致JSON在服务端解析失败
        $request->setTemplateParamJson(json_encode($c, JSON_UNESCAPED_UNICODE));

        // 可选-上行短信扩展码(扩展码字段控制在7位或以下，无特殊需求用户请忽略此字段)
        // $request->setSmsUpExtendCodeJson("[\"90997\",\"90998\"]");

        // 发起访问请求
        $acsResponse = static::getAcsClient()->getAcsResponse($request);

        return $acsResponse;
    }


}


//查找明天上课的学员手机号
$cz="SELECT b.xueyuan,a.mobile FROM student a,course b where b.xueyuan=a.sname and a.teacherid=b.teacherid and time=date_sub(curdate(),interval -1 day)";
$czm=mysqli_query($conn,$cz);
while($shouji=mysqli_fetch_array($czm)){
	 $mobile=$shouji['mobile'];
	 $xueyuan=$shouji['xueyuan'];
	 $qunfa[]=$mobile;
     $xue[]=$xueyuan;
     $ming[]="四物堂";
}


$json=json_encode($qunfa);
$newarray = array();
$jj=array();
 $count=count($qunfa);


$b = Array();
foreach ($qunfa as $key => $value) {
$b[]=Array('code'=>$value);
} 

$c = Array();
foreach ($xue as $key => $value) {
$c[]=Array('name'=>$value);
}

print_r(array_merge_recursive($c,$b));

print_r(json_encode($c,JSON_UNESCAPED_UNICODE));

echo "<br>";

$response = SmsDemo::sendBatchSms($qunfa,$ming,$c);
echo "发送短信(sendBatchSms)接口返回的结果:\n";
print_r($response);

?>
<!DOCTYPE html>
 <html>
 <head> 
 <meta charset="UTF-8"> 
 <title>短信</title> 
<script type="text/javascript">


function myrefresh()
{
window.location.reload();
}

var minits=1000*60*5;//5分钟
var hour=1000*60*60*4;//1小时
setTimeout('myrefresh()',hour); //指定1小时刷新一次


var setTimeoutName ;
    var i = 0;
    var setTimeoutDemo = function(){
      
        console.log(Date());
        console.log(<?php echo $json?>);
        
        console.log(++i);

        setTimeoutName = setTimeout(setTimeoutDemo,300000);
        
    }   
    //关闭定时器
    function clearTimeoutDemo(){
        clearTimeout(setTimeoutName);
        i = 0;
        alert("关闭定时器成功");
    }
</script>
 </head>
  <body> 


</body>
 

</html>