<?php

include_once "../base.php";

$db = new DB("ord");


$ords = $db->all([
  "movie"=>$_GET['moviename'],
  "date"=>$_GET['date'],
  "session"=> $_GET['sessionname']
]);

$seat = [];

foreach ($ords as $ord){
  //得到目前已被訂走的座位陣列
  $seat = array_merge($seat,unserialize($ord['seat']));
}

for($i=0 ; $i<20; $i++){
  if(in_array($i,$seat)){
    echo "<div class='booked'>";
  }else{
    echo "<div class='null'>";
    echo '<input type="checkbox" name="seat" value="'.$i.'">';
  }
  echo floor($i/5)+1;
  echo "排";
  echo ($i%5)+1;
  echo "號";
  echo "</div>";
}



?>