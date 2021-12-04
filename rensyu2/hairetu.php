<p>P75を参考にしてTシャツのサイズごとの在庫を代入して,表示してください
  インデクスSには3,Mは1,Lは0
</p>
<?php
$Tshuts = ['S'=>3, 'M'=>1, 'L'=>0];
foreach($Tshuts as $key=>$value){
  echo '<p>'.$key.$value.'</p>';
}

?>