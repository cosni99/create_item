複数の条件がある場合の条件式 && (AND) ||(OR)

https://ultimai.org/mdlsrc/pazl/iceBuying.html

AND → 論理積 掛け算
OR	→ 論理和	 足し算
true=1 等しい, false=0と等しい

食べてない:1	,	食べた:0
所持金あり:1 , 所持金なし:0
	1 x 1 (食べてないx所持金あり) = 1
	0 x 1 (食べたx所持金あり) = 0
	0 x 0 (食べたx所持金なし) = 0

	if( $tabeta==true && $shojikin >= 500 )

1.まだ食べておらず,所持金が500円以上なら"買える",どちらか１方でも満たせなければ"買えない" → ANDで評価するべき条件
と画面表示しなさい｡

$tabeta = true; //食べてないをtrueとする
$shojikin = 500;

<?php
  $shojikin = 500;
  $tabeta = true;

  if( $tabeta==false && $shojikin >= 500 ){
    echo "買える";
  } else {
    echo "買えない";
  }
?>

所持金あり 1  , 所持金なし 0
商品券あり 1	, 商品券なし 0
	1 + 1 (あり + あり) = 10 (2進数の2) → true
	0 + 0 (なし + なし) = 0 → false


2.所持金が400円以上あるか,商品券があれば買える,どちらか１方でも満たせれば"買える"  → ORで評価するべき条件
$shojikin = 500;
$shohinken = false;

<?php
  $shojikin = 500;
  $shohinken = false;

  if( $shohinken==true || $shojikin >= 400 ){
    echo "買える";
  } else {
    echo "買えない";
  }
?>

3.
値段は500円
引換券が必要
割引券があれば400円で買える
アイスは1日1個までしか食べてはいけない事になっているのでもちろ
<?php
  $shojikin = 400;//所持金
  $tabeta = false;//食べたか
  $shohinken = true;//割引券
  $hikikae = true;//引換券

  if( $tabeta==false && $shojikin >= 400 ){
    if($hikikae == true && $shohinken == true){
      echo "買える";
    } elseif ($hikikae == true&& $shojikin >= 500) {
      echo "買える";
    } else{
      echo "買えない";
    }
  } else{
    echo "買えない";
  }
?>