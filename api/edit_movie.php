<?php


include_once "../base.php";
$db= new DB('movie');
$data = $db->find($_POST['id']);
$data['name'] = $_POST['name'];
$data['length'] = $_POST['length'];
$data['publish'] = $_POST['publish'];
$data['director'] = $_POST['director'];
$data['level'] = $_POST['level'];
if(!empty($_FILES['trailer']['tmp_name'])){
  $data['trailer'] = $_FILES['trailer']['name'];
  move_uploaded_file($_FILES['trailer']['tmp_name'],"../img".$data['trailer']);
}
if(!empty($_FILES['poster']['tmp_name'])){
  $data['poster'] = $_FILES['poster']['name'];
  move_uploaded_file($_FILES['poster']['tmp_name'],"../img".$data['poster']);
}
$data['ondate'] = $_POST['year']."-".$_POST['month']."-".$_POST['day'];
$data['intro'] = $_POST['intro'];
// 這邊不需要更新rank 跟 sh  所以將那兩行程式刪除
$db->save($data);
to("../admin.php?do=movie");

?>