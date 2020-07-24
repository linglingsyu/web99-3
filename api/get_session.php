<?php

include_once "../base.php";
$sess = [
  1=>"14:00~16:00",
  2=>"16:00~18:00",
  3=>"18:00~20:00",
  4=>"20:00~22:00",
  5=>"22:00~24:00",
];

// $db = new DB("movie");
// $movie = $db -> find($_GET['id']);
$today = strtotime(date("Y-m-d"));
// $ondate = strtotime($movie['ondate']);

if( strtotime($_GET['date']) == $today ){
  $now = floor((date("G")-12)/2); // 現在電影在播放第幾場  (早上時10-12 = -2 會有負值的問題)
  $now = ($now > 0) ? $now  :  0 ;//修正負值 . 早上訂票顯示問題 (考試不用打) 
  for($i = ($now+1) ; $i <= 5 ; $i++ ){
    //要顯示的場次從下一場開始算
    echo '<option value="'.$i.'">'.$sess[$i].'</option>';
  }

}else{

    for($i = 1; $i<=5;$i++){
      echo '<option value="'.$i.'">'.$sess[$i].'</option>';
    } 
}


?>

