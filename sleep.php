<?php
    

echo "times";
$startTime='2019-02-01';
$endTime='2019-03-02';
echo $endTime;
echo "<br>";
$jj=rangeTime($startTime,$endTime);
echo $jj;
public function rangeTime($startTime,$endTime){ 
$date = date("Ymd",time()); //开始时间 
$start = strtotime($date.$startTime); 
$end = strtotime($date.$endTime); //当前时间 
$now = time();
if($now >=$start && $now<=$end){ 
  $uu='true';
  return $uu; 
}else{ 
	$uu='false';
  return $uu;
} 
}


?>