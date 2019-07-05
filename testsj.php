<?php 
$date="2016-11-21";
$timestrap=strtotime($date);
//格式化，取出月份；
echo date('m-d',$timestrap);
echo "<br>";
echo date('d',$timestrap);
?>