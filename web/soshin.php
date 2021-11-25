<?php 	session_start();

if( //　csrf
  isset( $_SESSION['token'] , $_POST['token']) 
  &&  $_SESSION['token'] == $_POST['token']
)

//送信されたもの全てチェック
foreach ($_POST as $key => $value) {
    $post[$key] = htmlspecialchars($value ,ENT_QUOTES);
}


mb_language("ja");
mb_internal_encoding("UTF-8");
//複数のメルアドがある場合はカンマ（,）で区切る
$site_name = 'サイト名';
$admin_email = 'sample@sample.jp' ;//管理者
$mailto   = "$admin_email , $post[mail]";
$subject = "メールタイトル";
$header = "From: " .mb_encode_mimeheader($site_name) ."<{$admin_email}>";


//mb_send_mail($mailto , $subject , $post['comment'] , $header);



header('Location: ./thanks.html');
