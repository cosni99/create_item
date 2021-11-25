<?php
//[2,'1.','2.','3.','4.',1,'問']テンプレ
$question = [[1,'1.webクライアントで実行されるプログラミング言語である','2.webブラウザに新しいウィンドをポップアップさせる機能をもつ','3.プログラムをコンパイルせずに実行する','4.常に同じ静的なページを生成する',3,'PHPの動作として正しいものを選択してください'],
[2,'1.PHPはライセンス料を支払えば誰でも使用することができる','2.PHPはほとんどのLinuxディストリビューションに同梱されている','3.PHPはオープンソースである','4.PHPは広範なデータベースをサポートする',1,'PHPの特徴として誤っているものを選択してください'],
[3,'1.windows環境のみで使用することができる','2.windows,macOS環境でのみ使用することができる','3.Linux,Solaris,その他のバージョンのUNIX環境でのみ使用することができる','4.Windows,macOS,Linux,Solaris,あらゆるバージョンのUNIX環境すべてで使用することができる',4,'PHPの実行環境の説明として正しいものを選択してください'],
[4,'1.PHPはApacheでのみ動作する','2.PHPはMicrosoft internet information Services (IIS)でのみ動作する','3.CGI規格がサポートするWebサーバーであれば動作する','4.どのようなWebサーバーでも動作する',3,'PHPが動作するWebサーバーの説明として正しいものを選択してください']
]; //id,選択肢1,選択肢2,選択肢3,選択肢4,解答,出題

$ec = count($question) - 1;//問題の配列をカウント
$randq = rand(0,$ec);//総問題数からランダムで

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>PHP7初級ランダム出題</title>
</head>
<body>
<h2>問題:<?php echo $question[$randq][0]; ?></h2>
<h2><?php echo $question[$randq][6]; ?></h2>

<form method="POST" action="answer.php">
<?php
for ($i = 1; $i < 5; $i++) {?>
     <input type="radio" name="question" value="<?=$i?>"> <?php echo $question[$randq][$i]; ?><br>
    <?php } ?>
    <input type="hidden" name="qnumber" value="<?php echo $question[$randq][0] ?>">
   <input type="hidden" name="answer" value="<?php echo $question[$randq][5] ?>">
   <input type="submit" value="回答する">
</form>
 
</body>
</html>