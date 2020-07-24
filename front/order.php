<div class="order_form">
  <form>
    <h3 class="ct">線上訂票</h3>
    <table style="width:70%;margin:auto;">
      <tr>
        <td width="10%">電影</td>
        <td>
          <select name="movie" id="movie">
            <?php

            $db = new DB('movie');
            $today = date("Y-m-d");
            $ondate = date("Y-m-d", strtotime("-2 days"));
            $rows = $db->all(['sh' => 1], "  && `ondate` >= '$ondate' && `ondate` <= '$today'");
            foreach ($rows as $row) {
              if (!empty($_GET['id'])) {
                $selected = ($_GET['id'] == $row['id']) ? "selected" : "";
                echo ' <option data-name=' . $row['name'] . ' value="' . $row['id'] . '"' . $selected . '>' . $row['name'] . '</option>';
              } else {
                echo ' <option data-name=' . $row['name'] . ' value="' . $row['id'] . '">' . $row['name'] . '</option>';
              }
            }
            ?>
          </select>
        </td>
      </tr>
      <tr>
        <td>日期</td>
        <td><select name="date" id="date"></select></td>
      </tr>
      <tr>
        <td>場次</td>
        <td><select name="session" id="session"></select></td>
      </tr>
    </table>
    <div class="ct"><input type="button" value="確定" onclick="booking()"><input type="reset" value="重置"></div>
  </form>
</div>

<style>
  .room {
    width: 320px;
    height: 320px;
    display: flex;
    flex-wrap: wrap;
    position: relative;
  }

  .room>div {
    width: 64px;
    height: 80px;
    position: relative;
  }

  .null {
    background: url(../icon/03D02.png) no-repeat center;
  }

  .booked {
    background: url(../icon/03D03.png) no-repeat center;
  }

  input[type='checkbox'] {
    position: absolute;
    right: 0;
    bottom: 0;
  }
</style>

<div class="booking_form" style="display:none;">

  <div class="room">

  </div>
  <div class="info">
    <p>您選擇的電影是：<span id="infom"></span></p>
    <p>您選擇的時刻是：<span id="infot"></span></p>
    <p>您已勾選<span id="ticket">0</span> 張票，最多可以購買四張票</p>
  </div>
  <button onclick="prev()">上一步</button>
  <button onclick="order()">訂購</button>

</div>

<script>
  getDuration();

  $("#movie").on("change", function() {
    getDuration();
  })

  $("#date").on("change", function() {
    getSession();
  })


  function getDuration() {
    let id = $("#movie").val();
    $.get("api/get_duration.php", {
      id
    }, function(duration) {
      $("#date").html(duration);
      getSession();
    })
  }

  function getSession() {
    let date = $("#date").val();
    let id = $("#movie").val();
    $.get("api/get_session.php", {
      date,
      id
    }, function(session) {
      $("#session").html(session);
    })
  }


  //挑選座位
  function booking() {
    let movive = $("#movie").val();
    let date = $("#date").val();
    let session = $("#session").val();
    let moviename = $("#movie option:selected").data("name");
    let sessionname = $("#session option:selected").data("name");
    $("#infom").html(moviename);
    $("#infot").html(date + " " + sessionname);
    $(".order_form").hide();


    $.get("api/get_seats.php", function(seats) {
      $(".room").html(seats);
      //ajax做完才會產生seat，所以有關於checkbox的change事件要放在產生座位後才會生效
      let ticket = 0;
      let seat = new Array();
      $("input[type='checkbox']").on("change", function() {

        //點完checkbox後，將票數++或--
        let chk = $(this).prop("checked");
        switch (chk) {
          case true:
            ticket++;
            if (ticket > 4) {
              alert("最多只能選4張!!");
              ticket--;
              $(this).prop("checked", false);
            }else{
              //勾選的座位值放到seat這個陣列內
              seat.push($(this).val());
            }
            break;
          case false:
            ticket--;
            //取消勾選的座位從seat陣列移除
            seat.splice(seat.indexOf($(this).val()));
            break;
        }
      //  console.log(seat);
        $("#ticket").html(ticket);
      })

    })



    $(".booking_form").show();



  }

  //上一步
  function prev() {
    $(".order_form").show();
    $(".booking_form").hide();
    $(".room").html(""); //清空資料
  }
</script>