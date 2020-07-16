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

  .poster {
    width: 200px;
    height: 260px;
    margin: 0 auto 20px auto;
    border: 1px solid;
    position: relative;
  }

  .po {
    display: none;
    width: 100%;
    height: 100%;
    position: absolute;
  }

  .po img {
    width: 100%;
  }

  .mb{
    background: red;
    width: 48%;
    height:160px;
    display: inline-block;
    margin:0.5%;
  }
</style>

<div class="half" style="vertical-align:top;">
  <h1>預告片介紹</h1>
  <div class="rb tab" style="width:95%;">
    <div class="poster">
      <!-- 放大圖 -->
      <?php
      foreach ($rows as $k => $row) {
        echo "<div class='po' data-ani='" . $row['ani'] . "'>";
        echo '<img src="img/' . $row['path'] . '">';
        echo "<div class='ct'>" . $row['name'] . "</div>";
        echo "</div>";
      }
      ?>
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
  <?php
  $db = new DB('movie');
  $today = date("Y-m-d");
  $ondate = date("Y-m-d",strtotime("-2 days"));
  $total = $db->count(['sh'=>1],"  && `ondate` >= '$ondate' && `ondate` <= '$today' ");
  $div = 4;
  $pages = ceil($total/$div);
  $now = (!empty($_GET['p']))? $_GET['p']:1;
  $start = ($now-1) * $div;
  $rows = $db->all(['sh'=>1],"  && `ondate` >= '$ondate' && `ondate` <= '$today'  order by `rank` limit $start,$div");
  foreach ($rows as $row) {
    ?>

    <div class="mb">
    <table>
      <tr>
        <td rowspan="3"><a href="?do=intro&id=<?= $row['id']; ?>"><img src="img/<?= $row['poster']; ?>"  style="width:80px; height:100px;"></a></td>
        <td><?= $row['name'] ?></td>
      </tr>
      <tr>
        <td><img src="icon/<?= $row['level']; ?>.png" style="width:18px"><?= $level[$row['level']]; ?></td>
      </tr>
      <tr>
        <td><?= $row['ondate'] ?></td>
      </tr>
    </table>
    <div class="ct"> 
    <botton onclick="location.href='?do=intro&id=<?=$row['id'];?>'">劇情簡介</botton>
    <botton onclick="location.href='?do=order&id=<?= $row['id']; ?>'">線上訂票</botton>
    </div>
    </div>

  <?php
    }
  ?>  
    <div class="ct">
<?php

for($i = 1; $i <= $pages ; $i++){
  $font = ($i == $now)? "24px":"18px";
  echo ' <a style="font-size:'.$font.';" href="?p='.$i.'">'.$i.'</a>';
}

?>
    </div>
  

  </div>
</div>

<script>
  $(".po").eq(0).show();
  let auto = setInterval(() => {
    slider()
  }, 3000);
  console.log(auto);

  function slider() {
    let dom = $(".po:visible"); // dom 等於 看的到的那一張
    let next = $(dom).next(); //抓到下一張要轉場進來的資料
    if (next.length <= 0) {
      next = $(".po").eq(0);
    }
    let ani = $(dom).data("ani"); //得到的是數字
    switch (ani) {
      case 1:
        //淡入淡出
        $(dom).fadeOut(1000, function() {
          $(next).fadeIn(1000);
        });
        break;

      case 2:
        //放大縮小
        $(dom).hide(1000, function() {
          $(next).show(1000);
        });
        break;

      case 3:
        //滑入滑出
        $(dom).slideUp(1000, function() {
          $(next).slideDown(1000);
        });
        break;

      case 4:
      //縮放  left: ($(dom).width)/2
      $(dom).animate({width:0,height:0,left:100,top:130},function(){
        $(next).css({width:0,height:0,left:100,top:130});
        $(next).show();
        $(next).animate({width:200,height:260,left:0,top:0});
        $(dom).hide();
        $(dom).css({widht:200,height:260,left:0,top:0});
      });
      break;

    }

    $(".icon").on("click", function() {
      clearInterval(auto); //先停止剛剛的動畫
      let index = $(".icon").index($(this));
      $(".po").hide(); //所有圖片隱藏
      $(".po").eq(index).show();

    })

    $(".nav").hover(
      function() {
        clearInterval(auto);
      },

      function() {
        auto = setInterval(() => {
          slider()
        }, 3000);
      }
    );

  }


  let p = 0; //計算可以點幾下
  let total = $(".icon").length; //有幾張圖

  function shift(direct) {
    switch (direct) {
      case 'right':
        //判斷P可以點幾下
        if (p < (total - 4)) {
          p++;
          $(".icon").animate({
            right: 80 * p
          });
        } else {
          p--;
        }
        break;

      case 'left':
        if (p > 0) {
          p--;
          $(".icon").animate({
            right: 80 * p
          });
        }
        break;
    }
  }
</script>