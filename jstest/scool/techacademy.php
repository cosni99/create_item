<?php
  $id = $_POST['id'];
  $school = $_POST['school'];
  $list = array("id" => $id, "school" => $school, "skill" => "PHPプログラミングスキル" );
  header("Content-type: application/json; charset=UTF-8");
  echo json_encode($list);
  exit;

