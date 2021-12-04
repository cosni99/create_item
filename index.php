<?php // 09wp/index.php ディレクトリインデックスの代わり

if ($dir = opendir("./")) {  // ディレクトリが オープンできない場合、opendir() は FALSE
    while (($file = readdir($dir)) !== false) {
        if ( !preg_match('/^\.|(htaccess|cgi|index)/', $file) && '.'!=$file 
        && '..'!=$file || preg_match('/(.php)/', $file)) {
            $farray[]= "<li><a href='$file'> $file </a>";
        }
    } 
    closedir($dir);
		natcasesort($farray) 	;
	 
?>

<!doctype html>
<html lang="ja">
<head>
	<meta charset="UTF-8" />
	<title>mdlsrcファイル一覧</title>
</head>
<body><ol>
	<?php  foreach ($farray as $value) {
			echo $value;
		}
}
?>
</ol>

<hr>

<style>ol.s li,pre,h1{font:1em consolas}</style></head><body>
  <h1>ファイル内文字列検索</h1>
  <form action="" method="post">
    <input type="text" size="55" name="s" />
    <input type="submit" name="findcommand"  value="文字列検索" />
    <input type="submit" name="findname"  value="ファイル名検索" />
    <input type="submit" name="findphp" value="php検索" />
<?php
$dirName = './';
$dirName = realpath($dirName) ;


    // ディレクトリからディレクトリ・ファイル名を昇順で取得します。
$fileArrayAsc = scandir($dirName);
?>

</form><div id="contentbar"> <ol class="s">
<?php


//  main
if(!empty($_POST['s'])  ){

    if(!empty($_POST['findphp']) ){
        recursiv($dirName);
    }elseif( !empty($_POST['findname']) ){
    	find_name();
    }elseif( !empty($_POST['findcommand']) ){
    	
        find_grep();
    }

}


//ファイル名検索
function find_name(){
   $str = $_POST['s'];
   $result = `find ./ -name $str`;
    echo "<pre>". h($result) ."</pre>";
}

//// find コマンド
function find_grep(){
   $str = $_POST['s'];
   $result = `find ./ -type f -print | xargs grep '.$str.'`;
    echo "<pre>". h($result) ."</pre>";
}



function recursiv($dirName) {

 $str = $_POST['s'];
    // ディレクトリからディレクトリ・ファイル名を昇順で取得します。
      $fileArrayAsc = scandir($dirName);  // ./
    	$kac = "";
//$jogai=impload('|',$_POST['jogai[]']);
//var_dump($_POST['jogai[]']);
      foreach($fileArrayAsc as $val){
          $v = $dirName."/".$val;
          //echo '<p>' . $v;

            $path_parts= pathinfo($v); //ファイル情報取得

            $basename= $path_parts['basename'];
              if(isset($path_parts['extension']))
		    			$kac= $path_parts['extension']; //拡張子取得

    		//拡張子がphp |html |htm |txt |csvの時にのみ探す。
//var_dump(preg_match('/php|html|htm|txt|csv|css|js|cgi|json|htaccess|log/', $kac));
		    			if(isset($kac) ){
		    			    if(preg_match('/php|html|htm|txt|csv|css|js|cgi|json|htaccess|log/', $kac))
                             wserch($v,$str); //ファイル内検索実行関数
		    			}
		    			else{  // 拡張子がない=ディレクトリなら
		    				if(is_dir($v) ){
//		    			       var_dump(preg_match('/^wp-|zw/', $val));
	//	    			    if(preg_match('/^wp-|zw/', $val)){

		    			       recursiv($v);
		    			    }
		    			    }
		    			}
    	}




function wserch($fname,$s){
 //   echo $fname .' | ' . $s;
 $fp = fopen($fname, "r"); //ファイルオープン
	while( ! feof($fp) ) {
	$buffer = fgets( $fp, 4096 ); //1行ずつ読み込み

		if (strstr($buffer,$s)){ //postされた文字列が含まれる場合はtrue
			$aaa=$buffer; //初めて検索できた行をaaaにセット
				echo "<li>".$fname ."=>". h($aaa)."</li>";
				break;
		}
	}
fclose ($fp);
}


function h($var) { // HTMLでのエスケープ処理をする関数
  if (is_array($var)) {
    return array_map('h', $var);
  } else {
    return htmlspecialchars($var, ENT_QUOTES);
  }
}

?>

</body>
</html>