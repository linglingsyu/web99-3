<?php

include_once "../base.php";
$table = $_POST['table'];
$db = new DB($table);

$row1 = $db->find($_POST['id'][0]);  //第一個值
$row2 = $db->find($_POST['id'][1]);  //第二個值

// $row1 & $row2 rank值的交換
$tmp = $row1 ;
$row1['rank'] = $row2['rank'];
$row2['rank'] = $tmp['rank'];
$db->save($row1);
$db->save($row2);


?>