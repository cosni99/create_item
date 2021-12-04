<pre style="font: normal 1.1em/125% Consolas">
ファイル一つで送信→受信するための分岐
<?php
	// 確認画面
  if( !empty( $_POST['submit']) && !empty( $_POST['onamae']) ){
/*
  送信された値があればここに出す
*/  
    echo  $_POST['onamae'] ;
?>
<form action="" method="post">
  <input type="hidden" name="onamae" 
  value="<?= $_POST['onamae']?>">
  <input type="submit" name="soshin" value="送信">
</form>

<?php
  }elseif(!empty( $_POST['soshin'])){
  	// 送信ボタンを押してるならここに来る
  	$to = ''; // メールアドレス自分の
  	$sub = '名前を受け取り' ; //メールの件名
  	$body = $_POST['onamae'] .'ありがとう!' ;//メール本文
  	
  	mail( $to , $sub , $body );
  	echo '送信しました(たぶん)';
  }else{	
  	//何も押して無い,初回開いたときはここに来る
?>    

<form action="" method="post">
  <input type="text" name="onamae">
  <input type="submit" name="submit" value="確認へ">
</form>

<?php    
  }
?>