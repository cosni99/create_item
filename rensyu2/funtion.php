<?php
//セレクト関数戻り値は文字列
//引数は名前と回数
function m($n,$c){
  $s =  '<select name='.$n.'>';
  for ($i =1;$i<$c;$i++){
    $s= $s.'<option>'.$i;
  }
  $s = $s.'</select>';
  return $s;
}

echo m('名前',30);//echoで表示
////////////////////////////////////////

function st(){
  global $a;//グローバル変数外でも使える
  $a =0;
  for($i=0; $i<9;$i++){
    $a += 1;
  }
}

st();
echo $a;
//////////////////////////////////////

?>