<html>
<head>
  <title>表白信息修改&删除</title>
  <?php
  require_once("./header.php");
  echo "<br /><center><div class=\"mdui-table-fluid\">
                        <table class=\"mdui-table mdui-table-hoverable\">
                            <tr>
                                <th>TO</th>
                                <th>information</th>
                                <th>FROM</th>
                                <th>时间</th>
                                <th>状态</th>
                            </tr>";
  $comd = "SELECT * FROM bbq order by time DESC";
  $sql = mysqli_query($conn,$comd);
  while ($row = mysqli_fetch_object($sql)) {
    if (!empty($row->to)) {
      echo("
      <tr>
        <td>$row->to</td>
        <td>$row->information</td>
        <td>$row->from</td>
        <td>$row->time</td>
              <td><a href=\"./del.php?from=$row->from&&to=$row->to&&information=$row->information&&time=$row->time\" class=\"mdui-btn mdui-btn-raised mdui-ripple\">删除</a>
              <a href=\"./change.php?from=$row->from&&to=$row->to&&information=$row->information&&time=$row->time\" class=\"mdui-btn mdui-btn-raised mdui-ripple\">修改</a></td>
      </tr>");
    } else {
      echo("<center><h2>暂时没有更多信息</h2></center>");
    }
  }
  echo("</table></div>");
  ?>
</body>
<?php require_once("../footer.php");
?>
</html>