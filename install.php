<title>星辰安装系统</title>
<body background=".//assets/img/bg.jpg">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <meta charset="utf-8">
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/mdui/0.4.2/css/mdui.min.css">
  <script src="//cdnjs.cloudflare.com/ajax/libs/mdui/0.4.2/js/mdui.min.js"></script>
  <br />
  <center><h2>星辰网站安装系统</h2></center>
  <?php
  $lockfile = "install.lock";
  if (file_exists($lockfile)) {
    exit("<center><h3>您已经安装过了，如果需要重新安装请先删除根目录下的install.lock(如果你只需要做轻微修改请直接修改根目录下的config.php)</center></h3>");
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
      <br />
      <br />
      <hr><hr>
      <br />
      <br />
      <div class="mdui-textfield mdui-textfield-floating-label">
        <label class="mdui-textfield-label">后台管理密码</label>
        <input name="passwd" type="text" class="mdui-textfield-input" value="admin" />
      </div>
      <div class="mdui-textfield mdui-textfield-floating-label">
        <label class="mdui-textfield-label">默认公告</label>
        <input name="notice" type="text" class="mdui-textfield-input" value="欢迎使用星辰表白墙!" />
      </div>
      <br />
      <center>
        <input class="mdui-btn mdui-btn-raised mdui-ripple" type="submit" name="submit" value="安装" />
      </center·
      </form>
      <?php
    } else {
      if (!empty($_POST['db_host']) || $_POST['notice'] ||!empty($_POST['db_username']) || !empty($_POST['db_name']) || !empty($_POST['db_password']) || !empty($_POST['passwd'])
      ) {
        $db_host = $_POST['db_host'];
        $db_username = $_POST['db_username'];
        $db_password = $_POST['db_password'];
        $db_name = $_POST['db_name'];
        $notices = $_POST['notice'];
        $passwd = $_POST['passwd'];
      } else {
        exit("<br/><center><h1>请检查您是否填写完全部内容后重试!</h1></center>");
      }
      @$conn = mysqli_connect($db_host,$db_username,$db_password,$db_name);
      if ($conn) {
       $bbq="CREATE TABLE `bbq` (
      `to` char(100) NOT NULL,
      `information` varchar(1000) NOT NULL,
      `from` char(100) NOT NULL,
      `time` char(40) NOT NULL
      )";
      $notice="CREATE TABLE `notice` (
      `updater` char(10) NOT NULL,
      `notices` varchar(200) NOT NULL
      )";
      $noticex="INSERT INTO `notice` VALUES( 'adminer',	'$notices');";
      mysqli_query($conn,$bbq);
      mysqli_query($conn,$notice);
      mysqli_query($conn,$noticex);
      
      } else {
        exit("<br/><center><h1>数据库连接失败!请确认数据库信息填写正确!</h1></center>");
      }
      $config_file = "config.php";
      $config_strings = "<?php\n";
      $config_strings .= "\$conn=mysqli_connect(\"".$db_host."\",\"".$db_username."\",\"".$db_password."\",\"".$db_name."\");\n//你的数据库信息\n\n";
      $config_strings .= "\$pass=\"$passwd\";  \n//设置后台管理密码 \n\n";
      $config_strings.= "?>";
      $fp = fopen($config_file,"wb");
      fwrite($fp,$config_strings);
      fclose($fp);
      $fp2 = fopen($lockfile,'w');
      fwrite($fp2,'安装锁文件,请勿删除!');
      fclose($fp2);
      file_get_contents("https://xsot.cn/api/detection/?type=lovewall&&domain=" . $_SERVER['HTTP_HOST']); //向官方发送你的网站域名以进行网址版权检测
      echo "<h1>安装成功,跳转中..</h1>";
      header("Refresh:1;url=\"./index.php\"");
    }
    ?>