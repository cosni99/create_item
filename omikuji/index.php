<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<!-- CSShake -->
	<!-- or from surge.sh -->
	<link rel="stylesheet" type="text/css" href="https://csshake.surge.sh/csshake.min.css">
</head>
<style>

a{
  display: block;
}

.omi{
	background-image: url(img/box2.png);
	background-repeat: no-repeat;
	background-position: left top;
	width: 300px;
	height: 300px;
}
.img1{
	background-image: url(img/box1.png);
	background-repeat: no-repeat;
	background-position: left top;
	width: 300px;
	height: 300px;
}

.omi:active{
	background-image: url(img/box1.png);
	background-repeat: no-repeat;
	background-position: left top;
	width: 300px;
	height: 300px;
}

</style>
<body>

  <a href="kekka.php" onclick="delay()">
    <div class="omi shake"></div>
  <a>
  
</body>


<script src="https://code.jquery.com/jquery-3.5.1.js" ></script>
<script>
	$(".omi").click(function() {
		$(".omi").removeClass('shake');
		//シェイククラスをはずす
		$(".omi").addClass('img1');
  });

//遅らせる関数
	function delay(){
    var a = new Date().getTime();
    var b = new Date().getTime();
	    while ( b-a < 2000){
	      b = new Date().getTime();
	    }
  }
</script>
</html>