<?php
echo "redbook"."</br>";

$param=array();
$param['search_id']="C543D6010F1924395FFD682BC8918DD2";
$param['channel']="Xiaomi";
$param['deviceId']="1c33ef66-486d-399c-afffa7da613f7aa8";
$param['device_fingerprint']="20180917141423826aaf90c35c4e2a9ab22b66d9f9a6d1017a346c2c08125e";
$param['filters']="";
$param['lang']="zh-Hans";
$param['sort']="";
$param['source']="explore_feed";
$param['platform']="Android";
$param['sid']="session.1221660913554209071";
$param['page']="1";
$param['t']="1537485050";
$param['page_size']="20";
$param['versionName']="5.24.1";
$param['device_fingerprint1']="20180917141423826aaf90c35c4e2a9ab22b66d9f9a6d1017a346c2c08125e";

var_dump($param);
echo "</br>";
function get_sign($param)
{
	ksort($param);
	$param_name=array_keys($param);
	$param_value=array_values($param);
	$key='';
	foreach ($param as $k=>$v){
		$key.=$k.'%3D'.$v;
	}
	$deviceId = $param['deviceId'];
	echo $deviceId."</br>";
	$paramMap=get_bytes($key);
	var_dump($paramMap);
	echo "</br>";
	$v2='';
	$vj=0;
	$v1=get_bytes($deviceId);
	$vi=0;
	while($vj<count($paramMap)){
		$v2=$v2.strval($paramMap[$vj]^$v1[$vi]);
		$vi=($vi+1)%count($v1);
		$vj++;
	}
	$v2=strtolower($v2);
	$temp=strtolower(md5($v2).$deviceId);
	$sign=md5($temp);
	echo $sign;
	echo "</br>";
	return $sign;
} 
function get_bytes($string){
	$bytes=array();
	for($i=0;$i<strlen($string);$i++){
		$bytes[]=ord($string[$i]);
	}
	return $bytes;
}

$hh=get_sign($param);
echo $hh;

?>