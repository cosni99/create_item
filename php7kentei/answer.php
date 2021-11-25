<?php

$qlist  = [[1,'1.webクライアントで実行されるプログラミング言語である','2.webブラウザに新しいウィンドをポップアップさせる機能をもつ','3.プログラムをコンパイルせずに実行する','4.常に同じ静的なページを生成する',3,'PHPの動作として正しいものを選択してください'],
[2,'1.PHPはライセンス料を支払えば誰でも使用することができる','2.PHPはほとんどのLinuxディストリビューションに同梱されている','3.PHPはオープンソースである','4.PHPは広範なデータベースをサポートする',1,'PHPの特徴として誤っているものを選択してください'],
[3,'1.windows環境のみで使用することができる','2.windows,macOS環境でのみ使用することができる','3.Linux,Solaris,その他のバージョンのUNIX環境でのみ使用することができる','4.Windows,macOS,Linux,Solaris,あらゆるバージョンのUNIX環境すべてで使用することができる',4,'PHPの実行環境の説明として正しいものを選択してください'],
[4,'1.PHPはApacheでのみ動作する','2.PHPはMicrosoft internet information Services (IIS)でのみ動作する','3.CGI規格がサポートするWebサーバーであれば動作する','4.どのようなWebサーバーでも動作する',3,'PHPが動作するWebサーバーの説明として正しいものを選択してください']
];

$qn = $_POST['qnumber'] - 1 ;//問題番号
$question = $_POST['question']; //ラジオボタンの内容を受け取る
$answer = $_POST['answer'];   //hiddenで送られた正解を受け取る

//結果の判定
if($question == $answer){
	$result = "正解！";
}else{
	$result = "<p style='color:red'>不正解･･･</p>";
}
 
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>PHP7初級解答</title>
</head>
<body>
 


<?php 
//問題 表示
echo $qlist[$qn][6]."<br>";
for($i = 1; $i < 5; $i++){
	echo $qlist[$qn][$i]."<br>";
}
?>

<!--正解表示-->
<?php echo $result ?>
<br>
あなたの解答は<?=$question?><br>
正解は<?=$answer?><br>
<a href="index.php">問題へ</a>

</body>
</html>