<?php
require_once('config.php');
require_once("header.php");
if ($_SESSION['password'] == $pass) {
  header("Refresh:0;url=\"./admin\"");
}
if (isset($_POST['submit'])) {
if (!empty($_POST['password'])&&$_POST['password']== $pass) {
    $_SESSION['password'] = $pass;
    echo("<h1 style='font-weight:900;text-align:center;width=1000px;'>登陆成功!跳转中...</h1>");
    header("Refresh:1;url=\"./admin\"");
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
 <div class="mdui-textfield-helper">
          注意只支持管理登录!
</div>
</div>
<center>
<input class="mdui-btn mdui-btn-raised mdui-ripple" type="submit" name="submit" value="登陆" />
</center>
</form>
<?php
}
require_once("footer.php");
?>
