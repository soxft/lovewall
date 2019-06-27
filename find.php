    <?php
    require_once('config.php');
    require_once("header.php");
    if(isset($_POST['submit'])){
      $info=$_POST['info'];
      $comd2="SELECT * FROM bbq WHERE `to` like '$info'";
            $check2=mysqli_query($conn,$comd2);
                $arr2=mysqli_fetch_assoc($check2);
                $info2=$arr2['from'];
                //检测是否有!
     $comd="SELECT * FROM bbq WHERE `to` like '$info' order by time DESC;";
                $sql=mysqli_query($conn,$comd);
     //信息
     if(empty($info2)){
         echo("<h3 style='font-weight:900;text-align:center;width=1000px;'>没有查询到信息,请稍后再试!</h3>");
         require_once("footer.php"); 
         header("Refresh:1;url=\"./find.php\"");
          exit;
     }
     else{
      while($row = mysqli_fetch_object($sql)){
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
    }else{
    ?>
    </head>
<form action="" method="post" enctype="multipart/form-data">
<!-- 浮动标签 -->
<div class="mdui-textfield mdui-textfield-floating-label">
  <i class="mdui-icon material-icons">account_circle</i>
  <label class="mdui-textfield-label">你的名字</label>
    <div class="mdui-textfield-helper">注意对方可能会使用你的姓名首字母,或者英文名之类的哦!</div>
  <textarea name="info" type="text" class="mdui-textfield-input"/></textarea>
</div>
<center>
<input class="mdui-btn mdui-btn-raised mdui-ripple" type="submit" name="submit" value="查询" />
</center>
</form>
<?php  
}
require_once("footer.php"); 
?>
