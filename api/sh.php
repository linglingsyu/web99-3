<?php

include_once "../base.php";

$db = new DB($_POST['table']);
$row = $db->find($_POST['id']);
$row['sh'] = ($row['sh']+1)%2;
/*
$a = 1
將a+1 再 / 2取餘數
$a= (1+1)%2 = 0
再重複 +1/2取餘數
$a = (0+1)%2 =1
$a = (1+1)%2 = 0
$a = (0+1)%2 =1.....
這樣一來 只會在0跟1之間做切換

*/
$db->save($row);

?>