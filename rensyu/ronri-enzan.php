<?php
	$h= 120;  //身長
	$a = 11; //age
	$p = false;  //parents
  if ($p == false){
    if($h >= 120 || $a >= 11){
      echo "乗れる";
    } else {
      echo "乗れない";
    }
  } else {
    echo "同伴乗れる";
  }
  
  
?>