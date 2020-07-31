<?php

include_once "../base.php";

echo $Ord->del([$_POST['type']=>$_POST['data']]);

?>