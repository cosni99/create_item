<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <script src="http://code.jquery.com/jquery-3.6.0.js"></script>
    <title>php</title>
  </head>

  <body>

<script>
var inputed
jQuery(function ($) {
  $('#tohoku').focus(function() {//フォーカスが当たったとき
    inputed = $(this).val();//インプットされた文字を代入
    $(this).val('');//インプット値を空に
    $(this).attr('placeholder',inputed);//プレスホルダーの文字をインプットされてた文字に
  });

  $('#tohoku').blur(function() {//フォーカスが外れたとき
    if($(this).val() == '') {//インプット値が空なら変数をインプット値に
      $(this).val(inputed);
    }
  });

  $('#tohoku').change(function() {
    if($(this).val() != '') {
      $(this).blur();
    }
  });

});
</script>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <label for="tohoku" class="form-label">東北</label>
    <input class="form-control" list="datalistOptions" id="tohoku" placeholder="何県？">
    <datalist id="datalistOptions">

    <?php 
    $touhoku = ['秋田','岩手','山形','青森','宮城'];
    //東北表示
    foreach ($touhoku as $row) {
      echo "<option value=$row>";
    }
    ?>
    </datalist>

  </body>
</html>