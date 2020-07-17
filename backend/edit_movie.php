<style>
  .item {
    width: 95%;
    margin: 10px auto;
    display: flex;
  }

  .item>div:nth-child(1) {
    width: 10%;
  }
</style>

<?php

$db = new DB('movie');
$row = $db->find($_GET['id']);


?>

<h1 class="ct">編輯院線片</h1>
<form action="api/edit_movie.php" method="post" enctype="multipart/form-data">
  <div class="item">
    <div>影片資料</div>
    <div>
      <div>片名: <input type="text" name="name" value="<?= $row['name'] ?>"> </div>
      <div>分級:
        <select name="level">
          <option value="1" <?= ($row['level'] == "1") ? "selected" : "" ?>>普遍級</option>
          <option value="2" <?= ($row['level'] == "2") ? "selected" : "" ?>>保護級</option>
          <option value="3" <?= ($row['level'] == "3") ? "selected" : "" ?>>輔導級</option>
          <option value="4" <?= ($row['level'] == "4") ? "selected" : "" ?>>限制級</option>
        </select>(請選擇分級)
      </div>
      <div>片長: <input type="text" name="length" value="<?= $row['length'] ?>"></div>
      <div>上映日期:

        <select name="year">
          <?php
          $arr =  explode("-", $row['ondate']);
          for ($i = 0; $i < 3; $i++) {
            $year = (date("Y") + $i) == $arr[0] ? "selected" : "";
            echo '<option value="' . (date("Y") + $i) . '" ' . $year . '>';
            echo date("Y") + $i;
            echo "</option>";
          }
          ?>
        </select>年
        <select name="month">
          <?php
          for ($i = 1; $i < 12; $i++) {
            $month = ($i == $arr[1]) ? "selected" : "";
            echo '<option value="' . $i . '"' . $month . '>';
            echo $i;
            echo "</option>";
          }
          ?>
        </select> 月
        <select name="day">
          <?php
          for ($i = 1; $i <= 31; $i++) {
            $day = ($i == $arr[2]) ? "selected" : "";
            echo '<option value="' . $i . '"' . $day . '>';
            echo $i;
            echo "</option>";
          }
          ?>
        </select>日

      </div>
      <div>發行商: <input type="text" name="publish" value="<?= $row['publish'] ?>"></div>
      <div>導演: <input type="text" name="director" value="<?= $row['director'] ?>"></div>
      <div>預告影片: <input type="file" name="trailer"></div>
      <div>電影海報: <input type="file" name="poster"></div>
      <input type="hidden" name="id" value="<?= $row['id']; ?>">
    </div>
  </div>

  <div class="item">
    <div>劇情簡介</div>
    <div><textarea name="intro" style="width:90%;height:50px;"><?= $row['intro'] ?></textarea></div>
  </div>
  <hr>
  <div class="ct"><input type="submit" value="修改"><input type="reset" value="重置"></div>
</form>