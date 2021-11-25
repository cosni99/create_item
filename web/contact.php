<?php	session_start();

//CSRF対策乱数発生関数
function random($length = 10)
{
    return substr(bin2hex(random_bytes($length)), 0, $length);
}

//トークン
$csrf_token = random();

//echo $csrf_token;

$_SESSION['token'] = $csrf_token;
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">

<title>お問い合わせ - FITTED</title>
<meta name="viewport" content="width=device-width">

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

<link href="https://fonts.googleapis.com/css?family=Exo+2:400,700" rel="stylesheet">

<link rel="stylesheet" href="style.css">
<script src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
	crossorigin="anonymous"></script>
	
</head>
<body>

<header>
<div class="container">

<a href="index.html">FITTED</a>

<nav>
<ul>
<li><a href="index.html">トップ</a></li>
<li><a href="about.html">サイトについて</a></li>
<li><a href="contact.php">お問い合わせ</a></li>
</ul>
</nav>

</div>
</header>


<div class="contents">
<div class="container">

<article>

<h1>お問い合わせ</h1>

<section id="input"><!--入力画面-->
<p>ご意見、ご感想などがありましたら、以下の欄にご記入の上、送信してください。記事に関するご質問などもお気軽にお寄せください。</p>

<form id="fm" method="post" action="soshin.php">
	<input type="hidden" name="token" value="<?=$_SESSION['token']?>">
	
	
<p>
<label>
名前：
<input type="text" name="name" id="name">
</label>
</p>

<p>
<label>
メールアドレス：
<input type="email" name="mail" id="mail">
</label>
</p>

<p>
<label>
コメント：
<textarea name="comment" id="comment"></textarea>
</label>
</p>

<p><input id="kaku" type="button" value="確認へ"></p>
</section><!--入力画面ここまで-->

<section id="confirm" class="hidden"><!--確認画面-->
	<label>名前：</label>
	<p type="text" id="name_c"></p>
	<label>メールアドレス：</label>
	<p type="text" id="mail_c"></p>
	<label>コメント：</label>
	<p type="text" id="comment_c"></p>
	<p><input id="sou" type="submit" value="送信"></p>
	<p><input id="modo" type="button" value="戻る"></p>
</section><!--確認画面ここまで-->

</form>

</article>


<div class="sub">
<aside class="profile">
<h2>PROFILE</h2>
<figure>
<img src="img/foot.svg" alt="FITTEDの管理人">
</figure>
<p>街歩き＆食べ歩きがライフスタイル。天気がいい日はあちこちに出没しています。</p>
</aside>


<aside class="topics">
<h2>TOPICS</h2>

<ul>
<li>
<a href="#">
	<figure><img src="img/tomato.jpg" alt=""></figure>
	<h3>甘いトマトとすっぱいトマト</h3>
</a>
</li>

<li>
<a href="#">
	<figure><img src="img/cycle.jpg" alt=""></figure>
	<h3>自転車で行けるところまで行ってみる</h3>
</a>
</li>

<li>
<a href="#">
	<figure><img src="img/green.jpg" alt=""></figure>
	<h3>緑のワンポイント</h3>
</a>
</li>

<li>
<a href="#">
	<figure><img src="img/time.jpg" alt=""></figure>
	<h3>タイムアタックでやる気を出してみる</h3>
</a>
</li>
</ul>
</aside>
</div>

</div>
</div>


<footer>
© FITTED
</footer>

<script>
$(function () {
	
		//確認ボタン処理
    $('#kaku').click(function(){
				var name = $('#name').val();
				var mail = $('#mail').val();
				var comment = $('#comment').val();
				$('#input').addClass('hidden');//入力画面に非表示クラスをつける

				$('#name_c').text(name);
				$('#mail_c').text(mail);
				$('#comment_c').text(comment);
        $('#confirm').removeClass('hidden');//確認画面の非表示クラスを取る
    });

		//送信ボタン処理
		$("#sou").click(function(){
			$('#fm').submit();
		});

		//戻るボタン処理
		$('#modo').click(function(){
			$('#input').removeClass('hidden');
			$('#confirm').addClass('hidden');
		});
});
</script>

</body>
</html>