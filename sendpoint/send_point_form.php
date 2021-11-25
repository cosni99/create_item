<?php
//csrf対策
 // ログインした状態と同等にするためセッションを開始します
 session_start();

 // 暗号学的的に安全なランダムなバイナリを生成し、それを16進数に変換することでASCII文字列に変換します
  $toke_byte = openssl_random_pseudo_bytes(16);
  $csrf_token = bin2hex($toke_byte);
  // 生成したトークンをセッションに保存します
  $_SESSION['csrf_token'] = $csrf_token;
?>

 <form method="POST" action="send_point.php">
 <input type="hidden" name="csrf_token" value="<?=$csrf_token?>">
 <input type="text" name="send_user_id">
 <input type="text" name="point">
 <input type="submit" value="ポイントを送付する">
 </form>