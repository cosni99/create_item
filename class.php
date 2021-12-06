<?php

class Seiseki{

  protected $class_total = [];  //配列として初期化
  protected $name;//名前
  protected $scores;//点数の配列

  public function get(){  //配列クラストータールをリターンする
    arsort($this->class_total);
    return $this->class_total;
  }
  public function set($name , $scores){//値をセットする
    $this->name = $name;
    $this->scores = $scores;
    $this->sum();
  }
  
  protected function sum(){//合計を出してクラス合計配列へ追加 クラス外から呼び出せない
    $this->class_total +=
      [ $this->name=>array_sum($this->scores) ];
  }

  public function avg(){  //平均を計算して名前と平均を表示する
    $avg = array_sum($this->scores)/count($this->scores);
    echo $this->name .'さんの平均 '. $avg. '点<br>';
  }

}

//継承した子クラス
class Seiseki_child extends Seiseki{
  protected function sum(){//親のsumオーバーライド
    $this->scores[3] /= 2;//配列最後の点を50％評価で再代入
    $this->class_total +=
      [ $this->name=>array_sum($this->scores) ];
  }
  public function get(){  //継承した親クラスのgetをオーバーライドしている
    arsort($this->class_total);
      foreach($this->class_total as $key =>$value){
        echo "<li>$key さんの合計は $value 点です</li>";
      }
    
  }
}

//小クラスをインスタンス化してgetした
$sc = new Seiseki_child();
$sc->set('後藤',[82,59,62,65]);
$sc->avg();

$sc->set('衛藤',[77,88,55,45]);
$sc->avg();

$sc->set('宮本',[69,74,54,87]);
$sc->avg();

$sc->get();
//var_dump($sc);
//親クラスの機能を継承していることがわかる


echo "---------親クラス-------<br>";
$seiseki = new Seiseki();//インスタンス化
$seiseki->set('佐藤',[90,88,65]);
$seiseki->avg();

$seiseki->set('伊藤',[77,88,55]);
$seiseki->avg();

$seiseki->set('田中',[69,74,54]);
$seiseki->avg();

$seiseki->set('加藤',[82,59,62]);
$seiseki->avg();

$goukei = $seiseki->get();//クラストータルを表示
//print_r($seiseki->get());
foreach($goukei as $key =>$value){//親クラスにはないので配列を回して表示
  echo "<li>$key さんの合計は $value 点です</li>";
}
//var_dump($seiseki);

?>