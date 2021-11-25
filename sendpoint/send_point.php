<?php
session_start();
// POSTでcsrf_tokenの項目名でパラメーターが送信されていること且つ、
// セッションに保存された値と一致する場合は正常なリクエストとして処理を行います
if (isset($_POST["csrf_token"]) 
 && $_POST["csrf_token"] === $_SESSION['csrf_token']) {

 echo "正常なリクエストです";

 // TODO
 // 指定されたsend_user_idに自分のポイントからpointを移す処理を行います
        
 } else {
  echo "不正なリクエストです";
 }
?>