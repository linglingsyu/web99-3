<?php

include_once "../base.php";

$db = new DB("movie");
$movie = $db -> find($_GET['id']);
$today = strtotime(date("Y-m-d"));
$ondate = strtotime($movie['ondate']);

for ($i = 0; $i < 3; $i++){
  $chk = strtotime("+$i days",$ondate); 
  if( $chk >= $today ){
    //要顯示出來的
    echo '<option value="'.date("Y-m-d",$chk).'">'.date("m月d日 l",$chk).'</option>';
  }
}


?>