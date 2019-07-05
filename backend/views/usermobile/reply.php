<?php 
use yii\helpers\Html;
$lj='/data/home/hyu4458630001/htdocs/swtmanager';
require $lj . '/vendor/api_sdk/vendor/autoload.php';
use Aliyun\Core\Config;
use Aliyun\Core\Profile\DefaultProfile;
use Aliyun\Core\DefaultAcsClient;
use Aliyun\Api\Sms\Request\V20170525\SendSmsRequest;
use Aliyun\Api\Sms\Request\V20170525\SendBatchSmsRequest;
use Aliyun\Api\Sms\Request\V20170525\QuerySendDetailsRequest;
$conn=mysqli_connect('hdm121115553.my3w.com','hdm121115553','swt62899308swt','hdm121115553_db');
  if($conn->connect_errno){
      die('连接失败'.$conn->connect_errno);
  }
  $conn->set_charset('utf8');
  //学生注册
$submit=isset($_POST["submit"])?$_POST["submit"]:'';
$studentphone=isset($_POST["studentphone"])?$_POST["studentphone"]:'';
$studentname=isset($_POST["studentname"])?$_POST["studentname"]:'';
$kname=isset($_POST["kname"])?$_POST["kname"]:'';
$teacher=isset($_POST["teacher"])?$_POST["teacher"]:'';
$shiduan=isset($_POST["shiduan"])?$_POST["shiduan"]:'';
$studentkeshi=isset($_POST["studentkeshi"])?$_POST["studentkeshi"]:'';
$studentdates=isset($_POST["studentdate"])?$_POST["studentdate"]:'';
$studenttime=isset($_POST["studenttime"])?$_POST["studenttime"]:'';

//算出周几
$datetime=$studentdates;   
    $zho=mysqli_query($conn,"select dayofweek('".$datetime."');");
    $zhou=mysqli_fetch_array($zho);
  
    $week2=$zhou[0];

    switch ($week2){
      case 1:
         $weekmsg='周日';
         break;
      case 2:
         $weekmsg='周一';
         break;
      case 3:
         $weekmsg='周二';
         break;
      case 4:
         $weekmsg='周三';
         break;
      case 5:
         $weekmsg='周四';
         break;
      case 6:
         $weekmsg='周五';
         break;
      case 7:
         $weekmsg='周六';
         break;
      default:
         $weekmsg='';
         break;
    }

//获取当前日期
$date=date('Y-m-d',time());
$jj=array();


//计算有效时间
$youxiaotime=date("Y-m-d",strtotime($studentdates."+".$studenttime."day"));

$createdtime=date("Y-m-d",time());

//根据$teacher查询老师id号
$ls="select * from admin where m_name='".$teacher."'";
$laoshi=mysqli_query($conn,$ls);
while($tt=mysqli_fetch_array($laoshi)){
     $teas=$tt['id'];
}

if($studentphone==''){
  echo "<script>alert('请输入手机号!');location.href='http://www.siwutang.vip/swtmanager/backend/web/index.php?r=usermobile/register';</script>";

}else if(strlen($studentphone)!=11){
  echo "<script>alert('手机号必须为11位!');location.href='http://www.siwutang.vip/swtmanager/backend/web/index.php?r=usermobile/register';</script>";

}else if(is_numeric($studentphone))
{
 
    //查询该课程的座位总数,上课学生总数
    $zs="SELECT state,count(xueyuan) FROM course where time='".$studentdates."' and kid='".$kname."' and ktime='".$shiduan."' and teacherid='".$teas."' group by time,kid,ktime,teacherid";
    $zong=mysqli_query($conn,$zs);
    $row= mysqli_num_rows($zong);

    if($row>0){
         while($state=mysqli_fetch_array($zong)){
         $weizi=$state['state'];
         $totalxue=$state['count(xueyuan)']; 

          }            
          //有空位则添加，否则跳到注册不成功界面
          if($totalxue<$weizi){
            $ls="INSERT INTO student(mobile,password,sname,knameid,teacherid,duan,zkeshi,date,oktime,created_at,syks,week) VALUES('".$studentphone."','000000','".$studentname."','".$kname."','".$teas."','".$shiduan."','".$studentkeshi."','".$studentdates."','".$youxiaotime."','".$createdtime."','".$studentkeshi."','".$weekmsg."')";
            $student=mysqli_query($conn,$ls);

                $ma="select max(id)  from student";
                $max=mysqli_query($conn,$ma);
                $shu=mysqli_fetch_array($max);
                $maxid=$shu['max(id)'];
                  //获取时间
                $sj="select date,id from student where id='".$maxid."'";
                $dates=mysqli_query($conn,$sj);
                $date2=mysqli_fetch_array($dates);
              
              //读取输入的总课时和时间,计算时间，循环每次+7天
              
               //排课

              $pk="INSERT INTO course(time,kid,ktime,teacherid,xueyuan,total,syks,week) VALUES('".$studentdates."','".$kname."','".$shiduan."','".$teas."','".$studentname."','".$studentkeshi."','".$studentkeshi."','".$weekmsg."') ";
              $pks=mysqli_query($conn,$pk);

              for($i=2;$i<=$studentkeshi;$i++){

                 $studentdates=date("Y-m-d",strtotime($studentdates."+7day"));
                
                 //查询该日期是否在休假日期内
                 $sfrest="SELECT * FROM rest";
                 $sfrests=mysqli_query($conn,$sfrest);
                 while($xiuxi=mysqli_fetch_array($sfrests)){
                       $startTime=$xiuxi['begintime'];
                       $endTime=$xiuxi['endtime'];

                       $rq=rangeTime($startTime,$endTime,$studentdates);
                    
                       if($rq=='true'){
                         $i=$i-1; 
                       
                       }else{
                          $pk2="INSERT INTO course(time,kid,ktime,teacherid,xueyuan,total,syks,week) VALUES('".$studentdates."','".$kname."','".$shiduan."','".$teas."','".$studentname."','".$studentkeshi."','".$studentkeshi."','".$weekmsg."') ";
                          $pks2=mysqli_query($conn,$pk2);
                       }

                 }
                               
              }
                           
          }else{
            echo "<script>alert('该课程已满!');location.href='http://www.siwutang.vip/swtmanager/backend/web/index.php?r=usermobile/register';</script>";

          } 
            
    }else{

          $ls="INSERT INTO student(mobile,password,sname,knameid,teacherid,duan,zkeshi,date,oktime,created_at,syks,week) VALUES('".$studentphone."','000000','".$studentname."','".$kname."','".$teas."','".$shiduan."','".$studentkeshi."','".$studentdates."','".$youxiaotime."','".$createdtime."','".$studentkeshi."','".$weekmsg."')";
            $student=mysqli_query($conn,$ls);
            $ma="select max(id)  from student";
            $max=mysqli_query($conn,$ma);
            $shu=mysqli_fetch_array($max);
            $maxid=$shu['max(id)'];

              //获取时间
            $sj="select date,id from student where id='".$maxid."'";
            $dates=mysqli_query($conn,$sj);
            $date2=mysqli_fetch_array($dates);

          $weizi=8;


          $xs="INSERT INTO course(time,kid,ktime,total,teacherid,xueyuan,state,syks,week) VALUES('".$studentdates."','".$kname."','".$shiduan."','".$studentkeshi."','".$teas."','".$studentname."','".$weizi."','".$studentkeshi."','".$weekmsg."')";
          $xue=mysqli_query($conn,$xs);

          for($i=2;$i<=$studentkeshi;$i++){
                 $studentdates=date("Y-m-d",strtotime($studentdates."+7day"));
                  
                 //查询该日期是否在休假日期内
                 $sfrest="SELECT * FROM rest";
                 $sfrests=mysqli_query($conn,$sfrest);
                 while($xiuxi=mysqli_fetch_array($sfrests)){
                       $startTime=$xiuxi['begintime'];
                       $endTime=$xiuxi['endtime'];

                       $rq=rangeTime($startTime,$endTime,$studentdates);
                   
                       if($rq=='true'){
                         $i=$i-1; 
                    
                       }else{
                          $pk2="INSERT INTO course(time,kid,ktime,teacherid,xueyuan,total,syks,week) VALUES('".$studentdates."','".$kname."','".$shiduan."','".$teas."','".$studentname."','".$studentkeshi."','".$studentkeshi."','".$weekmsg."') ";
                          $pks2=mysqli_query($conn,$pk2);
                       }

                 }                            
                
              }
         }

}else{
   echo "<script>alert('手机号必须为数字!');location.href='http://www.siwutang.vip/swtmanager/backend/web/index.php?r=usermobile/register';</script>";
}
function rangeTime($startTime,$endTime,$studentdates){ 
$start = strtotime($startTime); 
$end = strtotime($endTime); //当前时间 
$now = strtotime($studentdates); 
if($now >=$start && $now<=$end){ 
  $uu='true';
  return $uu; 
}else{ 
  $uu='false';
  return $uu;
} 
}


//$kname查课程名
$km="select * from ke where id='".$kname."'";
$ke=mysqli_query($conn,$km);
while($kcm=mysqli_fetch_array($ke)){
    $kcname=$kcm['kname'];
}

//发送报名成功短信通知，学生名$studentname，手机名：$studentphone，课程名：$kcname
// class SmsDemo
// {
//     static $acsClient = null;
//     public static function getAcsClient() {
//         //产品名称:云通信短信服务API产品,开发者无需替换
//         $product = "Dysmsapi";
//         //产品域名,开发者无需替换
//         $domain = "dysmsapi.aliyuncs.com";
//         // TODO 此处需要替换成开发者自己的AK (https://ak-console.aliyun.com/)
//         $accessKeyId = "LTAIUgNdwZrVD68Z"; // AccessKeyId
//         $accessKeySecret = "RfmHNKea6VpAEAJFM98Muq8P1CviZO"; // AccessKeySecret
//         // 暂时不支持多Region
//         $region = "cn-hangzhou";
//         // 服务结点
//         $endPointName = "cn-hangzhou";
//         if(static::$acsClient == null) {
//             //初始化acsClient,暂不支持region化
//             $profile = DefaultProfile::getProfile($region, $accessKeyId, $accessKeySecret);
//             // 增加服务结点
//             DefaultProfile::addEndpoint($endPointName, $region, $product, $domain);

//             // 初始化AcsClient用于发起请求
//             static::$acsClient = new DefaultAcsClient($profile);
//         }
//         return static::$acsClient;

//     }

//     /**
//      * 发送短信
//      * @return stdClass
//      */
//     public static function sendSms($studentname,$kcname,$studentphone) {
//       $a=$studentname;

//         // 初始化SendSmsRequest实例用于设置发送短信的参数
//         $request = new SendSmsRequest();

//         //可选-启用https协议
//         //$request->setProtocol("https");

//         // 必填，设置短信接收号码
//         $request->setPhoneNumbers("13764041075");

//         // 必填，设置签名名称，应严格按"签名名称"填写，请参考: https://dysms.console.aliyun.com/dysms.htm#/develop/sign
//         $request->setSignName("四物堂");

//         // 必填，设置模板CODE，应严格按"模板CODE"填写, 请参考: https://dysms.console.aliyun.com/dysms.htm#/develop/template
//         $request->setTemplateCode("SMS_161592852");

//         // 可选，设置模板参数, 假如模板中存在变量需要替换则为必填项
//         $request->setTemplateParam(json_encode(array(  // 短信模板中字段的值
//             "name"=>$studentname,
//             "kcname"=>$kcname

//         ), JSON_UNESCAPED_UNICODE));

//         // 可选，设置流水号
//         $request->setOutId("yourOutId");

//         // 选填，上行短信扩展码（扩展码字段控制在7位或以下，无特殊需求用户请忽略此字段）
//         $request->setSmsUpExtendCode("1234567");

//         // 发起访问请求
//         $acsResponse = static::getAcsClient()->getAcsResponse($request);

//         return $acsResponse;
//     }

// }
// $response = SmsDemo::sendSms($studentname,$kcname,$studentphone);
// echo "发送短信(sendSms)接口返回的结果:\n";
// print_r($response);

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

.left{
  width: 50px;
  float:left;
  display: inline;
}
.leftbig{
  width: 400px;
  float:left;
  display: inline;
}

</style>

<script type="text/javascript" src="http://www.siwutang.vip/swtmanager/backend/web/statics/js/jquery-1.4.2.min.js"></script>

<div class="main">

<div class="juli"></div>
<div class="kuan ziti"><a href="http://www.siwutang.vip/swtmanager/backend/web/index.php?r=usermobile/main">返回所有学员管理</a></div>
   <div style="width: 697px;height: 440px;background-image: url(/swtmanager/backend/web/statics/images/zhuceok.jpg);margin: auto;"></div>
</div>
