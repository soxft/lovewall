<!DOCTYPE html>
<!-- xcsoft版权所有 -->
<html>
    <?php include('mysql.php'); ?>
        <?php include("hearder.php");?>
    <center><h2>xcsoft-bbq</h2></center>
<?php 
$time = date("Y/m/d H:i");
    $to=$_POST['to'];  
    $information=$_POST['information'];             
    $from=$_POST['from']; 
    if(empty($to)){
     echo("<center/><h2/>你还没说你要表白谁呢!<br/><br/>");
     echo("<input type=\"button\" value=\"< 返回\" class=\"mdui-btn mdui-btn-raised mdui-ripple\" onclick=\"history.go(-1);\">");
     exit;
    }
    else{
         if(empty($information)){
     echo("<center/><h2/>你平常写情书都没有内容的吗?请检查你是否填写了告白内容!<br/><br/>");
     echo("<input type=\"button\" value=\"< 返回\" class=\"mdui-btn mdui-btn-raised mdui-ripple\" onclick=\"history.go(-1);\">");
     exit;
    }
     if(empty($from)){
     $from = "匿名";
     goto go;
    }
 else{       
     go:
//处理将文件数据上传到数据库
                $comd1="insert into bbq values('$to','$information','$from','$time');";
                $go=mysqli_query($conn,$comd1);
echo('<center/><h2/>已送达!即将跳转至首页!</h2></center>');
header("Refresh:1;url=\"./index.php\"");
}
}
?>
</body>
<?php include("footer.php"); ?>
</html>