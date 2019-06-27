<html>
<head>
  <title>表白信息修改</title>
  <?php require_once("./header.php");
  $information = $_GET['information'];
  $to = $_GET['to'];
  $from = $_GET['from'];
  $timex = $_GET['time'];
  ?>
</head>
<body>
  <?php
  if (isset($_POST['submit'])) {
    require_once("../app/time.php");
    $informationx = $_POST['informationx'];
    $timex = $_POST['timex'];
    $information = $_POST['information'];
    $to = $_POST['to'];
    $from = $_POST['from'];
    if (empty($information) || empty($to) || empty($from) || empty($password)) {
      echo("<center><h2>检测到危险!请稍后再试,如一直发现此问题,请联系管理员!</h2></center>");
    } else {
      $comd2 = "delete from bbq where information='$informationx' AND time='$timex';";
      $go1 = mysqli_query($conn,$comd2);
      $comd3 = "insert into bbq values('$to','$information','$from','$time');";
      //UPDATE
      $go2 = mysqli_query($conn,$comd3);
      echo("<center><h2>修改成功!</h2></center>");
      header("Refresh:2;url=\"./control.php\"");
    }
  } else {
    if (!empty($information)) {
      $html1 = "<br /><center><div class=\"mdui-table-fluid\">
                        <table class=\"mdui-table mdui-table-hoverable\">
                            <tr>
                                <th>TO</th>
                                <th>information</th>
                                <th>FROM</th>
                                <th>时间</th>
                            </tr>";
      echo("<h3>你将要修改的原始信息:</h3>" . $html1);
      echo("
      <tr>
        <td>$to</td>
        <td>$information</td>
        <td>$from</td>
        <td>$timex</td>
      </tr></table></div></center>");
      echo("<h3>进行修改:</h3>");
    } else {
      header("Refresh:0;url=\"./control.php\"");
      exit;
    }
    ?>
    <form action="" method="post" enctype="multipart/form-data">
      <!-- 浮动标签 -->
      <div class="mdui-textfield mdui-textfield-floating-label">
        <label class="mdui-textfield-label">TO:</label>
        <input name="to" type="text" value='<?php echo($to);
        ?>' class="mdui-textfield-input" type="email" />
      </div>
      <div class="mdui-textfield mdui-textfield-floating-label">
        <label class="mdui-textfield-label">表白内容:</label>
        <input name="information" type="text" value='<?php echo($information);
        ?>' class="mdui-textfield-input" type="email" />
      </div>
      <div class="mdui-textfield mdui-textfield-floating-label">
        <label class="mdui-textfield-label">FROM:</label>
        <input name="from" type="text" value='<?php echo($from);
        ?>' class="mdui-textfield-input" type="email" />
      </div>
      <input type="hidden" name="informationx" value="<?echo $information ?>">
      <input type="hidden" name="timex" value="<?echo $timex ?>">
      <center>
        <input class="mdui-btn mdui-btn-raised mdui-ripple" type="submit" name="submit" value="提交修改" />
      </center>
    </form>
  </body>
  <?php
}
require_once("../footer.php");
?>
</html>