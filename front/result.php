<?php

$db = new DB('ord');
$ord = $db->find(['no'=>$_GET['ord']]);


?>

<table>
  <tr colspan="2">
    <td>感謝您的訂購，您的訂單編號是：<?= $ord['no'] ?></td>
  </tr>
  <tr>
    <td>電影名稱:<?= $ord['movie'] ?></td>
    <td></td>
  </tr>
  <tr>
    <td>日期：<?= $ord['date'] ?></td>
    <td></td>
  </tr>
  <tr>
    <td>場次時間：<?= $ord['session'] ?></td>
    <td></td>
  </tr>
  <tr>
    <td colspan="2">座位：<br>
    <?php
   $seats = unserialize($ord['seat']);
   foreach($seats as $seat){
    echo floor($seat/5)+1;
    echo "排";
    echo ($seat%5)+1;
    echo "號<br>";
   }

   ?>
    共<?= $ord['qt'] ?>張電影票
  
  </td>

  </tr>
  <tr>
    <td colspan="2"><button onclick="location.href='index.php'">確認</button></td>
  </tr>
</table>