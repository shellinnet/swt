<?php

     $ltime='2018-11-23';
     $endtime=date("Y-m-d",strtotime("+1 week",strtotime($ltime)));
     echo $endtime;

?>