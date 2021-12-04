<?php
/* ファイルポインタをリードオンリーでオープン */
$file = fopen("list.txt", "r"); 

/* ファイルを1行ずつ出力しなさい */
while (($line = fgets($file))) {
  echo '<p>'.$line.'</p>';
}

fclose($file);
?>