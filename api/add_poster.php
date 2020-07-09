<?php
include_once "../base.php";
$db = new DB("poster");
$data = [];
if(!empty($_FILES['poster']['tmp_name'])){
  $data['path'] = $_FILES['poster']['name']; //檔名
  move_uploaded_file($_FILES['poster']['tmp_name'],"../img/".$data['path']);
}

$data['name'] = $_POST['name'];
$data['sh'] = 1;
$data["ani"] = 1 ;
$rank = (($db->q("select max(`id`) from `poster`")[0][0]) == null) ? 1 : $rank;
$data["rank"] = $rank+1;

$db->save($data);
to("../admin.php?do=poster");

?>