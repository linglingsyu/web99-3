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
    <div style="overflow:auto; height:150px;">
      <?php
      $db = new DB("poster");
      $rows = $db->all();
      foreach ($rows as $row) {
        $ischecked = ($row['sh'] == 1) ? "checked" : "";
      ?>
        <div class="row">
          <div><img style="width:90px;" src="img/<?= $row['path'] ?>"></div>
          <div><input type="text" name="name[]" value="<?= $row['name'] ?>"></div>
          <div>
            <button>往上</button><button>往下</button>
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
    <div class="ct"><input type="submit" value="編輯確定"><input type="reset" value="重置"></div>
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