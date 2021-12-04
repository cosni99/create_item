<pre style="font: normal 1.1em/125% Consolas">
なにも選ばずに送信した場合に値が届くのはどれ?
不足したタグを追加して試してください

<?php
	if(isset($_POST['btn'] )){  
		// sousin ボタンが押された場合
	
		// var_dump($_POST['txt']); // → string(0) ""
		// // 未入力の場合は0バイトの文字列が送られてくる
		// var_dump( isset($_POST['txt'])); // bool(true)
		// var_dump( !empty($_POST['txt'])); //bool(false)
		
		// echo "checkBox\n";
		// var_dump($_POST['chk']);
		// // 
		// var_dump( 
		// 	!empty($_POST['chk'][0]) , !empty($_POST['chk'][1]) , !empty($_POST['chk'][2])  
		// );
		// var_dump( 
		// 	isset($_POST['chk'][0]) , isset($_POST['chk'][1]) , isset($_POST['chk'][2])  
		// );



		
		// echo "radioButton\n";
		// var_dump($_POST['rdo']);
		// var_dump( 
		// 	!empty($_POST['rdo']) , !empty($_POST['rdo']) , !empty($_POST['rdo'])  
		// );
		// var_dump( 
		// 	isset($_POST['rdo']) , isset($_POST['rdo']) , isset($_POST['rdo'])  
		// );

				
		echo "select\n";
		var_dump($_POST['sct']);		// string(0) ""
		var_dump( !empty($_POST['sct']) ); // bool(false)
		var_dump( isset($_POST['sct']) );	//	bool(true)


	}
?>

<form method="post">
	<input type="text" name="txt" >
	
	<input type="checkbox" name="chk[]" value="0"> 0
	<input type="checkbox" name="chk[]" value="1"> 1
	<input type="checkbox" name="chk[]" value="2"> 2
	
	<input type="radio" name="rdo" value="4"> 4
	<input type="radio" name="rdo" value="5"> 5
	<input type="radio" name="rdo" value="0"> 0

	<select name="sct">
		<option value="">選択してね</option>
		<option>7</option>
		<option>8</option>
		<option>9</option>
	</select>
<!-- 送信ボタン -->
	<input type="submit" name="btn" value="sousin">
</form>