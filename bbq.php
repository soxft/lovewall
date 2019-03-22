<?php
     $comd="SELECT * FROM bbq ORDER by time DESC";
                $sql=mysqli_query($conn,$comd);
     //信息
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
     ?>
