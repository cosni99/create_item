配列をループして以下の3行と同じタグを出してください

<p><input type="radio" name="meal" value="和食">和食</p>
<p><input type="radio" name="meal" value="洋食">洋食</p>
<p><input type="radio" name="meal" value="中華">中華</p>

<?php
  $m = ["和食","洋食","中華"];  // ←配列
  foreach($m as $val){
    echo '<p><input type="radio" name="meal" value="',$value,'">',$val,'</p>';
  }
?>