<?php 

if(!isset($_POST['test_submit']) && !isset($_POST['test3_submit']) && !isset($_POST['test2_submit'])){?>
  <form action="BLACK.php" method="post">
  <input type="submit" name="test_submit" value="スタート"></form>
  Aは1として判定<br>
  21以上はバースト<br>
  3枚まで引ける
<?php }
if(!empty($_POST['test_submit'])){

  $deck = array();//カード作成処理
  for($i2=0;$i2 < 4;$i2++){
    $i3 = $i2*100;
    for ($i=1;$i < 14;$i++){
      $deck[] = $i + $i3;
    }
  }
  shuffle($deck);//デッキシャッフル
  //var_dump($deck);
  $b=0;
  $psum=0;
  $dsum=0;
  $futuresum=0;
  unset($_POST['psum']);
  unset($_POST['dsum']);
  unset($_POST['futuresum']);//初期化

  $draw = array_shift($deck);//ドロー
  $b = hiku($draw);//1～13が入ってる
  echo mark($draw).king($b);
  $psum = $b;//1枚めの結果

  $draw = array_shift($deck);//ドロー
  $b = hiku($draw);
  echo mark($draw).king($b);
  $psum = $b + $psum;
  echo '合計[',$psum,']<br>';

  $draw = array_shift($deck);//ディーラードロー
  $b = hiku($draw);
  echo 'CPU',mark($draw).king($b),'と裏返しが1枚';
  $dsum = $b;//ディーラー1枚めの結果
  $draw = array_shift($deck);//ドロー
  $b = hiku($draw);
  $dsum = $b + $dsum;

  if($dsum <= 13){//ディーラー3枚目引く条件
    $draw = array_shift($deck);//ドロー
    $b = hiku($draw);
    $dsum = $b + $dsum;
    echo '追加でもう１枚引いた';
  }

  $draw = array_shift($deck);//プレイヤー追加ドローに使う処理
  $b = hiku($draw);
  //echo mark($draw).king($b);
  $futuresum = $b + $psum;
  
  echo '<form action="BLACK.php" method="post">';
  echo '<input type="submit" name="test2_submit" value="判定">';
  echo '<input type="hidden" name="psum" value="',$psum, '">';
  echo '<input type="hidden" name="dsum" value="',$dsum, '">';
  echo '<input type="hidden" name="futuresum" value="',$futuresum, '">';
  echo '<input type="submit" name="test3_submit" value="もう1枚引く"></form>';
  
  unset($_POST['test_submit']);
  
}
if(isset($_POST['test2_submit'])){//判定ボタンを押した時
  echo 'CPU合計:',$_POST['dsum'],'<br>';
  echo 'あなた合計:',$_POST['psum'],'<br>';
  judge($_POST['dsum'], $_POST['psum']);
  unset($_POST['test2_submit']);
  echo '<form action="BLACK.php" method="post">';
  echo '<input type="submit" name="test_submit" value="もう一回スタート"></form>';
}

if(isset($_POST['test3_submit'])){
  //もう一枚引いた時
  echo 'CPU合計:',$_POST['dsum'],'<br>';
  echo 'あなた合計:',$_POST['futuresum'],'<br>';
  judge($_POST['dsum'], $_POST['futuresum']);
  unset($_POST['test3_submit']);
  echo '<form action="BLACK.php" method="post">';
  echo '<input type="submit" name="test_submit" value="もう一回スタート"></form>';
}


function king($n){//AJQK関数
  if($n==1){
    return 'A';
  }elseif($n==11){
    return 'J';
  }elseif($n==12){
    return 'Q';
  }elseif($n==13){
    return 'K';
  }else{
    return $n;
  }
}
function mark($n){//記号返し関数
  if($n>300){
    return '&#9829;';
  }elseif($n>200){
    return '&#9830;';
  }elseif($n>100){
    return '&#9824;';
  }else{
    return '&#9827;';
  }
}
function hiku($n){//３桁目引く関数
  if($n >= 300){
    return $n -= 300;
  }elseif($n >= 200){
    return $n -= 200;
  }elseif($n >= 100){
    return $n -= 100;
  }else{
    return $n;
  }
}
function judge($dc ,$pc){//判定の関数
  if($dc == $pc || ($dc > 21 && $pc >21)){
    echo "引き分け";
  }elseif($dc >21 && $pc <22) {
     echo "勝ち";
  }elseif($pc >21 && $dc <22){
     echo "負け";
  }elseif($dc>$pc){
     echo "負け";
  }else{
     echo "勝ち";
  }
}
?>