<html>
<head>
  <title>表白信息删除</title>
  <?php require_once("./header.php");
  $information = $_GET['information'];
  $to = $_GET['to'];
  $from = $_GET['from'];
  $time = $_GET['time'];
  ?>
</head>
<body>
  <?php
  if (isset($_GET['to'])) {
    $information = $_GET['information'];
    $to = $_GET['to'];
    $from = $_GET['from'];
    $time = $_GET['time'];
    if (empty($information) || empty($to) || empty($from) || empty($time)) {
      echo("<center><h2>检测到危险!请稍后再试,如一直发现此问题,请联系管理员!</h2></center>");
    } else {
      $comd2 = "delete from `bbq` WHERE time='$time' AND information='$information'";
      //确认账号所有者是否为admin
      $go = mysqli_query($conn,$comd2);
      echo("<center><h2>删除成功!</h2></center>");
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
      echo("<h3>你将要删除的信息:</h3>" . $html1);
      echo("
      <tr>
        <td>$to</td>
        <td>$information</td>
        <td>$from</td>
        <td>$time</td>
      </tr></table></div>");
      echo("<h3>你真的要删除吗?</h3>");
      echo("<center><a href=\"./del.php?from=$from&&to=$to&&information=$information&&time=$time\" class=\"mdui-btn mdui-btn-raised mdui-ripple\">确认删除</a></center><br/>");
    } else {
      header("Refresh:0;url=\"./control.php\"");
    }
  }
  ?>
</body>
<?php require_once("../footer.php");
?>
</html>