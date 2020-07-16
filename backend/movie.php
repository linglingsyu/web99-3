<style>
  .list{
    overflow: auto;
    width:95%;
    height:420px;
    background: #eee;
  }

  .movie-item{
    width: 100%;
    font-size: 0;
    margin:2px auto;
  }
  .movie-item > div{
    display: inline-block;
    font-size: 1rem;
  }
  .movie-item > div:nth-child(1),.movie-item > div:nth-child(2){
    width:10%;
    font-size: 1rem;
  }

  .movie-item > div:nth-child(3) {
    width: 80%;
    font-size: 1rem;
  }

  .movie-item > div:nth-child(3) span{
    display: inline-block;
    width: 30%;
  }



</style>

<button>新增電影</button>
<hr>
<div class="list">

<?php

$db = new DB('movie');
$rows = $db->all([]," order by `rank`");
foreach($rows as $k=>$row){
?>
<div class="movie-item">
  <div style="line-height:100%"><img src="img/<?=$row['poster'] ?>" style="width:80px;height:100px;"></div>
  <div style="text-align:center;">分級:<br><img src="icon/<?= $row['level'] ?>.png" ></div>
  <div>
    <div>
      <span>片名:<?=$row['name'] ?></span>
      <span>片長:<?=$row['length'] ?></span>
      <span>上映時間:<?=$row['ondate'] ?></span>
    </div>
    <div>功能按鈕</div>
    <div>劇情簡介:<?=$row['intro'] ?></div>
  </div>
</div>
<hr>
<?php
}
?>

</div>

