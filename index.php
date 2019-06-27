<?php
require_once("header.php");
//包括头部
require_once("config.php");
//包括信息
if (isset($_POST['submit'])) {
  //判断是否已经按下按钮
  require_once("./app/time.php");
  $to = $_POST['to'];
  $information = $_POST['information'];
  $from = $_POST['from'];
  if (empty($to)) {
    echo("<center><h3>你还没说你要表白谁呢!<br/><br/>");
    unset($_POST['submit']);
    header("Refresh:1;url=\"./index.php\"");
    echo("</h2></center>");
    require_once('footer.php');
    exit();
    //如果to值为空
  } elseif (empty($information)) {
    echo("<center><h3>你平常写情书都没有内容的吗?请检查你是否填写了告白内容!<br/><br/>");
    unset($_POST['submit']);
    header("Refresh:1;url=\"./index.php\"");
    echo("</center><br/>");
    require_once('footer.php');
    exit();
    //如果info值为空
  } elseif (empty($from)) {
    $from = "匿名";
  }
    //如果对方没有输入姓名
    $comd1 = "insert into bbq values('$to','$information','$from','$time');";
    $go = mysqli_query($conn,$comd1);
    //上传表白信息至数据库
    unset($_POST['submit']);
    echo('<center><h2>已送达!跳转中!</h2></center>');
    header("Refresh:1;url=\"./index.php\"");
} else {
  ?>
  <!-- 顶部公告栏 -->
      <?php
      $commd1 = "select * from notice where updater='adminer'";
      $result = mysqli_query($conn,$commd1);
      $arr1 = mysqli_fetch_assoc($result);
      $notice = $arr1['notices'];
      if(empty($notice)){
      }else{
    echo"   <center>
         <div class=\"mdui-chip\">
      <span class=\"mdui-chip-icon\"><i class=\"mdui-icon material-icons\">&#xe04e;</i></span>
      <span class=\"mdui-chip-title\">$notice</span>
  </div>
      </div>";
      }
      ?>
    </center>
    <!-- 添加表白 -->
    <form action="" method="post" enctype="multipart/form-data">
      <div class="mdui-textfield mdui-textfield-floating-label">
        <label class="mdui-textfield-label">TO:</label>
        <input name="to" type="text" class="mdui-textfield-input" type="email" />
      </div>
      <div class="mdui-textfield mdui-textfield-floating-label">
        <label class="mdui-textfield-label">表白内容:</label>
        <input name="information" type="text" class="mdui-textfield-input" type="email" />
      </div>
      <div class="mdui-textfield mdui-textfield-floating-label">
        <label class="mdui-textfield-label">FROM:</label>
        <input name="from" type="text" class="mdui-textfield-input" type="email" />
        <div class="mdui-textfield-helper">
          提示:该处如果不填写则显示为匿名
        </div>
      </div>
      <center>
        <input class="mdui-btn mdui-btn-raised mdui-ripple" type="submit" name="submit" value="表白" />
      </center>
    </form>
    <!--表白内容-->
    <?php
    $comd = "SELECT * FROM bbq order by time DESC;";
    $sql = mysqli_query($conn,$comd);
    $del = "delete from `bbq` where `from`='' or `to`='';";
    $sql1 = mysqli_query($conn,$del);
    //防止出现空白
    //信息
    while ($row = mysqli_fetch_object($sql)) {
      echo("<div class=\"mdui-card\">");
      //卡片的标题和副标题
      echo("<div class=\"mdui-card-primary\">");
      echo("<div class=\"mdui-card-primary-title\">TO:" . $row->to . "</div>");
      echo("<div class=\"mdui-card-primary-subtitle\">" . $row->time . "</div>");
      echo("</div>");
      // 卡片的内容
      echo("<div class=\"mdui-card-content\">「" . $row->information . "」</div>");
      echo("<div style=\"float:right; class=\"mdui-card-primary-subtitle\">FROM:" . $row->from . "</div>");
      echo("</div>");
      echo("<br/>");
    }
  }
  ?>
  <?php
  require_once('footer.php');
  ?>