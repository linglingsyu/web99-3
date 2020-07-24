<?php

include_once "../base.php";

$db = new DB("movie");
$movie = $db -> find($_GET['id']);
$today = strtotime(date("Y-m-d"));
$ondate = strtotime($movie['ondate']);
$db_ord = new DB('ord');

if( strtotime($_GET['date']) == $today ){
  $now = floor((date("G")-12)/2); // 現在電影在播放第幾場  (早上時10-12 = -2 會有負值的問題)
  $now = ($now > 0) ? $now  :  0 ;//修正負值 . 早上訂票顯示問題 (考試不用打) 
  for($i = ($now+1) ; $i <= 5 ; $i++ ){
    //計算剩餘座位數 20-x
   $qt = $db_ord->q("select sum(`qt`) from `ord` where `movie` = '".$movie['name']."' && `date` = '".$_GET['date']."' && `session` = '".$sess[$i]."'")[0][0];
    //要顯示的場次從下一場開始算
    echo '<option data-name='.$sess[$i].' value="'.$i.'">'.$sess[$i].' 剩餘座位：'.(20-$qt).'</option>';
  }
}else{
  for($i = 1; $i<=5;$i++){
    $qt = $db_ord->q("select sum(`qt`) from `ord` where `movie` = '".$movie['name']."' && `date` = '".$_GET['date']."' && `session` = '".$sess[$i]."'")[0][0];
      echo '<option data-name='.$sess[$i].' value="'.$i.'">'.$sess[$i].' 剩餘座位：'.(20-$qt).'</option>';
    } 
}


?>

