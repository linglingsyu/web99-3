<style>
  .list {
    overflow: auto;
    width: 95%;
    height: 420px;
    background: #eee;
  }

  .movie-item {
    width: 100%;
    font-size: 0;
    margin: 2px auto;
  }

  .movie-item>div {
    display: inline-block;
    font-size: 1rem;
  }

  .movie-item>div:nth-child(1),
  .movie-item>div:nth-child(2) {
    width: 10%;
    font-size: 1rem;
  }

  .movie-item>div:nth-child(3) {
    width: 80%;
    font-size: 1rem;
  }

  .movie-item>div:nth-child(3) span {
    display: inline-block;
    width: 30%;
  }
</style>

<button onclick="location.href='?do=add_movie'">新增電影</button>
<hr>
<div class="list">


</div>

<script>
  reloadlist();

  function reloadlist() {
    $.get("api/movie_list.php", function(list) {
      $(".list").html(list);
        $(".shift").on("click", function() {
          let id = $(this).data("rank").split("-");
          //我點下的那個按鈕的data-rank的值用-分開後，轉成陣列存放
          $.post("api/rank.php", {
            id,
            "table": "movie"
          }, function(res) {
            location.reload();
          })
        })
    })
  }

  function del(table, id) {
    $.post("api/del.php", {
      "table": table,
      id
    }, function() {
      reloadlist()
    })
  }

  function sh(table, id) {
    $.post("api/sh.php", {
      table,
      id
    }, function() {
      reloadlist()
    })
  }
</script>