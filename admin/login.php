 <body background="../assets/img/bg.jpg" class="mdui-theme-primary-indigo mdui-theme-accent-pink">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>表白墙 - Powered by XCSOFT</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/mdui/0.4.2/css/mdui.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/mdui/0.4.2/js/mdui.min.js"></script>
<?php
session_start();
require_once('../config.php');
if ($_SESSION['password'] == $pass) {
  header("Refresh:0;url=\"./index.php\"");
}
if (isset($_POST['submit'])) {
if ($_POST['password']== $pass) {
    $_SESSION['password'] = $pass;
    echo("<h1 style='font-weight:900;text-align:center;width=1000px;'>登陆成功!跳转中...</h1>");
    header("Refresh:1;url=\"./index.php\"");
  } else {
    echo("<h1 style='font-weight:900;text-align:center;width=1000px;'>用户名或密码错误,请重试!</h1>");
    header("Refresh:1;url=\"./login.php\"");
  }
}else{
?>
<form action="" method="post" enctype="multipart/form-data">
<!-- 浮动标签 -->
<div class="mdui-textfield mdui-textfield-floating-label">
<label class="mdui-textfield-label">密码</label>
<input name="password" type="password" class="mdui-textfield-input" />
</div>
<center>
<input class="mdui-btn mdui-btn-raised mdui-ripple" type="submit" name="submit" value="登陆" />
</center>
</form>
<?php
}
require_once("../footer.php");
?>
