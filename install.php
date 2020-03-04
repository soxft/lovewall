<title>星辰安装系统</title>
<body background="./assets/img/background.png">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <meta charset="utf-8">
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/mdui/0.4.2/css/mdui.min.css">
  <script src="//cdnjs.cloudflare.com/ajax/libs/mdui/0.4.2/js/mdui.min.js"></script>
  <br />
  <center><h2>星辰网站安装系统</h2></center>
  <?php
  $lockfile = "install.lock";
  if (file_exists($lockfile)) {
    exit("<center><h3>您已经安装过了，如果需要重新安装请先删除根目录下的install.lock(如果你只需要修改内容请访问数据库修改config表<br />如有疑问请加qq群：657529886)</center></h3>");
  }
  if (!isset($_POST['submit'])) {
    ?>
    <form action="" method="post" enctype="multipart/form-data">
      <div class="mdui-textfield mdui-textfield-floating-label">
        <label class="mdui-textfield-label">数据库地址</label>
        <input name="db_host" type="text" class="mdui-textfield-input" value="localhost" />
      </div>
      <div class="mdui-textfield mdui-textfield-floating-label">
        <label class="mdui-textfield-label">数据库用户名</label>
        <input name="db_username" type="text" class="mdui-textfield-input" />
      </div>
      <div class="mdui-textfield mdui-textfield-floating-label">
        <label class="mdui-textfield-label">数据库名称</label>
        <input name="db_name" type="text" class="mdui-textfield-input" />
      </div>
      <div class="mdui-textfield mdui-textfield-floating-label">
        <label class="mdui-textfield-label">数据库密码</label>
        <input name="db_password" type="password" class="mdui-textfield-input" />
      </div>
      <br />
      <center>
        <input class="mdui-btn mdui-btn-raised mdui-ripple" type="submit" name="submit" value="安装" />
      </center>
    </form>
    <?php
  } else {
    if (empty($_POST['db_host']) || empty($_POST['db_username']) || empty($_POST['db_name']) || empty($_POST['db_password'])) {
      exit("<br/><center><h1>请检查您是否填写完全部内容后重试!</h1></center>");
    } else {
      $db_host = $_POST['db_host'];
      $db_username = $_POST['db_username'];
      $db_password = $_POST['db_password'];
      $db_name = $_POST['db_name'];
    }
    @$conn = mysqli_connect($db_host,$db_username,$db_password,$db_name);
    if ($conn) {
      $content = "
        CREATE TABLE `content` (
        `uid` mediumtext NOT NULL,
        `to` mediumtext NOT NULL,
        `content` mediumtext NOT NULL,
        `from` mediumtext NOT NULL,
        `ip` mediumtext NOT NULL,
        `time` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
      mysqli_query($conn,$content);
    } else {
      exit("<br/><center><h1>数据库连接失败!请确认数据库信息填写正确!</h1></center>");
    }
    //写数据库
    $config_file = "config.php";

    $config_strings = "<?php\n";
    $config_strings .= "\$conn=mysqli_connect(\"".$db_host."\",\"".$db_username."\",\"".$db_password."\",\"".$db_name."\");\n";
    $config_strings .= "\$conns=mysqli_connect(\"".$db_host."\",\"".$db_username."\",\"".$db_password."\",\"information_schema\");\n//你的数据库信息\n";
    $config_strings .= "\$px=25              \n//每页显示表白数\n";
    $config_strings.= "?>";
    //文件内容
    $fp = fopen($config_file,"wb");
    fwrite($fp,$config_strings);
    fclose($fp);
    //写config.php
    $fp2 = fopen($lockfile,'w');
    fwrite($fp2,'安装锁文件,请勿删除!');
    fclose($fp2);
    //写注册锁
    echo "<br/><center><h1>安装成功!4s后将为您自动跳转到首页!</h1></center>";
    file_get_contents("https://xsot.cn/api/detection/?type=lovewall&&domain=" . $_SERVER['HTTP_HOST']);
    //仅用作版权检测,无他用,如果您能保证不修改版权,可自行移除
    header("Refresh:4;url=\"./index.php\"");
  }
  ?>