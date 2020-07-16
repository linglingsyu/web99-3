<?php
$po = new DB("poster");
$rows = $po->all(['sh' => 1], " order by `rank`");
?>
<style>
  .btns {
    display: flex;
  }

  .nav {
    display: flex;
    width: 320px;
    overflow: hidden;
  }

  .icon img {
    width: 50px;
  }

  .icon {
    width: 80px;
    flex-shrink: 0;
    /* 圖片保持自己的大小(不收縮) */
    text-align: center;
    position: relative;
  }

  .control {
    width: 45px;
    font-size: 45px;
    text-align: center;
    cursor: pointer;
  }
</style>

<div class="half" style="vertical-align:top;">
  <h1>預告片介紹</h1>
  <div class="rb tab" style="width:95%;">
    <div class="poster">
      <!-- 放大圖 -->
    </div>
    <div class="btns">
      <div class="control" onclick="shift('left')">&#9664;</div>
      <div class="nav">
        <!-- 放小圖 -->
        <?php
        foreach ($rows as $k => $row) {
          echo "<div class='icon'>";
          echo '<img src="img/' . $row['path'] . '">';
          echo "</div>";
        }
        ?>
      </div>
      <div class="control" onclick="shift('right')">&#9654;</div>
    </div>
  </div>
</div>

<!-- 院線片區 -->
<div class="half">
  <h1>院線片清單</h1>
  <div class="rb tab" style="width:95%;">
    <table>
      <tbody>
        <tr> </tr>
      </tbody>
    </table>
    <div class="ct"> </div>
  </div>
</div>

<script>
  let p = 0; //計算可以點幾下
  let total = $(".icon").length ;    //有幾張圖

  function shift(direct) {

    switch (direct) {
      case 'left':
        //判斷P可以點幾下
        if( p < (total-4)){
          p++;
          $(".icon").animate({right: 80 * p});
        }else{
          p--;
        }
        break;

      case 'right':
        if(p>0){
          p--;
          $(".icon").animate({ right: 80 * p});
        }
        break;
    }

  }
</script>