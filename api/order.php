<?php

include_once "../base.php";

$movie = $_POST['movie'];
$date = $_POST['date'];
$session = $_POST['session'];
$seat = $_POST['seat'];
sort($seat);
$db_movie = new DB("movie");
$data['movie'] = $db_movie->find($movie)['name'];
$data['date'] = $date;
$data['session'] = $sess[$session];
$data['qt'] = count($seat); 
$data['seat'] = serialize($seat); //將陣列轉為字串
$no =  $db_movie->q("select max(`id`) from `ord`")[0][0]+1;
//日期+流水號(4位數不足補0)
$data['no'] = date("Ymd") . sprintf("%04d",$no);

$db_ord = new DB("ord");
$db_ord->save($data);
echo $data['no']; //回給前端的資訊




?>