<?php

$num = rand(1,100);
if($num <= 5){
  $data = "daikyo.png";
}elseif($num > 5 && $num <= 15){
  $data = "kyo.png";
}elseif($num > 15 && $num <= 30){
  $data= "sue.png";
}elseif($num > 30 && $num <= 50){
  $data= "shou.png";
}elseif($num > 50 && $num <= 75){
  $data = "chu.png"; 
}elseif($num > 75 && $num <= 95){
  $data = "kichi.png";
}else{
  $data = "dai.png";
}

//echo $num;
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>おみくじ結果</title>
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
</head>
<body>

<div class="animate__animated animate__fadeInDown">
  <img src="img/<?= $data?>">
</div>

</body>
</html>