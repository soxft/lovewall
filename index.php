<?php
if (!file_exists("install.lock")) {
    header("Refresh:0;url=\"./install.php\"");
    exit("正在跳转到安装界面...");
}
//检测是否已经安装
require_once("header.php");
require_once("config.php");
$p = $_GET['p'];
if (empty($p) || $p < "1") 
{
  $p = "1";
}
$mysql = "select * from `TABLES` where `TABLE_NAME`='content';";
$result = mysqli_query($conns,$mysql);
$arr = mysqli_fetch_assoc($result);
$num_all = $arr['TABLE_ROWS'];

if ($num_all <= $px) 
{
  $p_all = 1;
} 
else if ($num_all % $px == 0) 
{
  $p_all = $num_all / $px;
} else 
{
  $p_all = (($num_all - ($num_all % $px)) / $px) + 1;
}

if ($p >= $p_all) 

{
  $p = $p_all;
}
$num = ($p - 1) * $px;
//计算出第几条数据
?>
<p style="font-weight:500;">
  &emsp;快来表白吧-><a class="mdui-text-color-grey-800" href="add.php">戳我戳我</a>
</p>
<?php
$comd = "SELECT * FROM content order by time DESC limit $num,$px;";
$sql = mysqli_query($conn,$comd);
//防止出现空白
//信息
while ($row = mysqli_fetch_object($sql)) {
  echo("<div class=\"mdui-card\">");
  //卡片的标题和副标题
  echo("<div class=\"mdui-card-primary\">");
  echo("<div class=\"mdui-card-primary-title\">TO:" . $row->to . "</div>");
  echo("<div class=\"mdui-card-primary-subtitle\">" . date("Y-m-d H:i:s",$row->time) . "</div>");
  echo("</div>");
  // 卡片的内容
  echo("<div class=\"mdui-card-content\" style=\"word-break:break-all;\">「" . htmlspecialchars($row->content) . "」</div>");
  echo("<div style=\"float:right; class=\"mdui-card-primary-subtitle\">FROM:" . $row->from . "&emsp;</div>");
  echo("</div>");
  echo("<br/>");
}
$p_next = $p + 1;
$p_last = $p - 1;
//计算一下上一页或者下一页的num
echo "<br /><center>";
if ($p != 1) {
  echo  "<a href=\"./?p=$p_last\" class=\"mdui-btn mdui-btn-dense mdui-color-theme-accent mdui-ripple\">上一页</a>";
}
echo "&emsp;";
if ($p != $p_all) {
  echo "<a href=\"./?p=$p_next\" class=\"mdui-btn mdui-btn-dense mdui-color-theme-accent mdui-ripple\">下一页</a>";
}
echo "</center><br />";
require_once('footer.php');
?>