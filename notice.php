<center>                     <!-- 顶部公告栏 -->
  <div class="mdui-chip">
  <span class="mdui-chip-icon"><i class="mdui-icon material-icons">&#xe04e;</i></span>
  <?php
      $commd1="select * from notice where updater='adminer'";
      $result=mysqli_query($conn,$commd1);
      $arr1=mysqli_fetch_assoc($result);
      $notice=$arr1['notices'];
      echo("<span class=\"mdui-chip-title\">$notice</span>");
      echo("</div>");
      echo("</div>");
  ?>
  </center>