<?php
//ブラウザをサーバーで判定するphp
$ua = $_SERVER['HTTP_USER_AGENT'];//ユーザーエージェントを取得して代入
echo $ua;

echo '[SERVER_ADDR] : '.$_SERVER['SERVER_ADDR']."<br/>\n";
$ua_list = ['iPhone','iPad','iPod'];//比較する文字列

$user_agent = 'pc';

foreach($ua_list as $v){
  if(strpos($ua,$v) !== false){//ユーザーエージェントに含まれていた場合ブレイク
    $user_agent = 'sp';
    break;
  }else{
    $user_agent = 'pc';
  }
}

//echo $user_agent;

if($user_agent == 'pc'){?>

<ul><!--pcならリスト表示-->
<li>menu1</li>
<li>menu2</li>
<li>menu3</li>
</ul>

<?php }else{?>
<span>menu</span><strong>1</strong></span>
<span>menu</span><strong>2</strong></span>
<span>menu</span><strong>3</strong></span>
<?php }

?>
