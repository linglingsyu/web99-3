<?php
include_once "../base.php";
$db = new DB('movie');
$rows = $db->all([]," order by `rank`");
foreach($rows as $k=>$row){
  $prev = ($k != 0)?$rows[$k-1]['id']:$row['id'];      
  //如果不是最後一筆，顯示下一筆的id，如果是最後一筆，顯示自己的id
  $next = ($k != (count($rows)-1))?$rows[$k+1]['id']:$row['id'];
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
    <div>
    <button onclick="sh('movie',<?= $row['id'] ?>)"><?= $row['sh']==1?"顯示":"隱藏" ?></button>
    <button data-rank="<?= $row['id']."-". $prev ?>" class="shift">往上</button>
    <button data-rank="<?= $row['id']."-". $next ?>" class="shift">往下</button>
    <button onclick="location.href='?do=edit_movie&id=<?=$row['id'] ?>'">編輯電影</button>
    <button onclick="del('movie',<?= $row['id'] ?>)">刪除電影</button>
  </div>
    <div>劇情簡介:<?=$row['intro'] ?></div>
  </div>
</div>
<hr>
<?php
}
?>