<style>
  h4 {
    margin: 5px;
    background: #ccc;
    padding: 5px;
  }

  .header,
  .row {
    display: flex;

  }

  .header div {
    width: 25%;
    background-color: #ccc;
  }

  .row div {
    width: 25%;
    margin: 0 1px;
    text-align: center;

  }
</style>


<form action="api/edit_poster.php" method="post">
    <div style="width:98%;margin:auto;height:350px;">
    <h4 class="ct">預告片清單</h4>
    <div class="header">
      <div>預告片海報</div>
      <div>預告片片名</div>
      <div>預告片排序</div>
      <div>預告片操作</div>
    </div>
    <div style="overflow:auto; height:240px;">
      <?php
      $db = new DB("poster");
      $rows = $db->all([]," order by `rank`");
      foreach ($rows as $k => $row) {
        $ischecked = ($row['sh'] == 1) ? "checked" : "";
        //如果不是第一筆，顯示上一筆的id，如果是第一筆，顯示自己的id
        $prev = ($k != 0)?$rows[$k-1]['id']:$row['id'];      
        //如果不是最後一筆，顯示下一筆的id，如果是最後一筆，顯示自己的id
        $next = ($k != (count($rows)-1))?$rows[$k+1]['id']:$row['id'];;
      ?>
        <div class="row">
          <div><img style="width:90px;" src="img/<?= $row['path'] ?>"></div>
          <div><input type="text" name="name[]" value="<?= $row['name'] ?>"></div>
          <div>
            <!-- 
              上一筆$k-1  + $k == 0 (第一筆)
              下一筆$k+1  + $k ==  (count($rows)-1) (最後一筆)
            -->
            <button type="button" data-rank="<?= $row['id']."-". $prev ?>">往上</button>
            <button type="button" data-rank="<?= $row['id']."-". $next ?>">往下</button>
          </div>
          <div><input type="checkbox" name="sh[]" value="<?= $row['id'] ?>" <?= $ischecked ?>>顯示</div>
          <div><input type="checkbox" name="del[]" value="<?= $row['id'] ?>">刪除</div>
          <div>
            <select name="ani[]">
              <option value="1" <?= $row['ani']== "1" ? "selected" : ""; ?> >淡入淡出</option>
              <option value="2" <?= $row['ani']== "2" ? "selected" : ""; ?> >放大縮小</option>
              <option value="3" <?= $row['ani']== "3" ? "selected" : ""; ?> >滑入滑出</option>
            </select>
            <input type="hidden" name="id[]" value="<?= $row['id'] ?>">
          </div>
        </div>
      <?php
      }
      ?>
    </div>
    <div class="ct" ><input type="submit" value="編輯確定"><input type="reset" value="重置"></div>
  </div>
  </form> 
  <hr>

  <form action="api/add_poster.php" method="post" enctype="multipart/form-data">
  <div style="width:90%;margin:auto;height:150px;">
    <h4 class="ct">新增預告片海報</h4>
    <table>
      <tr>
        <td width="50%"><input type="file" name="poster"></td>
        <td width="50%"><input type="text" name="name"></td>
      </tr>
    </table>
    <div class="ct"><input type="reset" value="重置"><input type="submit" value="新增"></div>
</form>
</div>

<script>
  $("button").on("click",function(){
    let id = $(this).data("rank").split("-");
    //我點下的那個按鈕的data-rank的值用-分開後，轉成陣列存放
    $.post("api/rank.php",{id,"table":"poster"},function(res){
      location.reload();
    })
  })



</script>