<?php
//アクセスしてきた人のログを記録保存
date_default_timezone_set('UTC');
$counter_file = 'log.txt';

$fp = fopen($counter_file, 'a+');

if ($fp){
  $counter = date("Y-m-d H:i:s")."    IP:".$_SERVER["REMOTE_ADDR"]."\n";
  if (fwrite($fp,  $counter) === FALSE){
    print('ファイル書き込みに失敗しました');
  }
}
fclose($fp);
?>