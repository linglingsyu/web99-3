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
$ondate = date("Y-m-d",strtotime("-2 days"));
$rows = $db->all(['sh'=>1],"  && `ondate` >= '$ondate' && `ondate` <= '$today'");
foreach ($rows as $row ){
  if(!empty($_GET['id'])){
    $selected = ($_GET['id'] == $row['id'])? "selected":"";
    echo ' <option value="'.$row['id'].'"'. $selected.'>'.$row['name'].'</option>';
  }else{
    echo ' <option value="'.$row['id'].'">'.$row['name'].'</option>';
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
  .room{
    width:320px;
    height:320px;
    display: flex;
    flex-wrap: wrap;
  }

  .room > div {
    width:64px;
    height:80px;
    position: relative;
    background-color: lightskyblue;
  }

  .room > div:nth-child(odd){
    background-color: lightsalmon;
  }
</style>

<div class="booking_form" style="display:none;">

  <div class="room">
      <?php
      for($i=0 ; $i<20; $i++){
        echo "<div>";
        echo floor($i/5)+1;
        echo "排";
        echo ($i%5)+1;
        echo "號";
        echo "</div>";
      }

      ?>

  </div>


<button onclick="prev();">上一步</button>

</div>

<script>

getDuration();

$("#movie").on("change",function(){
  getDuration();
})

$("#date").on("change",function(){
  getSession();
})

function getDuration(){
  let id = $("#movie").val();
  $.get("api/get_duration.php",{id},function(duration){
    $("#date").html(duration);
    getSession();
  })
}

function getSession(){
  let date = $("#date").val();
  let id = $("#movie").val();
  $.get("api/get_session.php",{date,id},function(session){
    $("#session").html(session);
  })
}


//挑選座位
function booking(){
  $(".order_form").hide();
  $(".booking_form").show();
}

//上一步
function prev(){
  $(".order_form").show();
  $(".booking_form").hide();
}

</script>