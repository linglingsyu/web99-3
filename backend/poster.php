<style>
  h4 {
    margin: 5px;
    background: #ccc;
    padding: 5px;
  }
</style>

<form action="api/add_poster.php" method="post" enctype="multipart/form-data">
  <div style="width:90%;margin:auto;height:350px;">
    <h4 class="ct">預告片清單</h4>
    <div style="overflow:auto;">
      <?php
      $db = new DB("poster");
      $rows = $db -> all();
      foreach ($rows as $row) {
      ?>
        <div><img style="width:10%;" src="img/<?= $row['path'] ?>"></div>
        <div><input type="text" name="name" value="<?= $row['name'] ?>"></div>
        <div>
          <button>往上</button><button>往下</button>
        </div>
        <div><input type="checkbox" name="sh[]" value="<?= $row['id'] ?>"></div>
        <div><input type="checkbox" name="del[]" value="<?= $row['id'] ?>"></div>
      <?php
      }
      ?>
    </div>

  </div>
  <hr>
  <div style="width:90%;margin:auto;height:150px;">
    <h4 class="ct">新增預告片海報</h4>
    <table>
      <tr>
        <td width="50%"><input type="file" name="poster" id=""></td>
        <td width="50%"><input type="text" name="name" id=""></td>
      </tr>
    </table>
    <div class="ct"><input type="reset" value="重置"><input type="submit" value="新增"></div>
</form>
</div>