<?php
require_once('./config.php');
require_once('./function.php');
$name = $_POST['name'];
$osname = $_POST['osname'];
$content = $_POST['content'];
//获取传值
if (empty($name) || empty($osname) || empty($content)) {
  echo "请检查表单是否填写完整呀!填写完整才能让对方找到你呀!";
  exit();
}
if (strlen($name) > 100 || strlen($osname) > 100) {
  echo "呀!你或对方的名字超过长度限制了!";
  exit();
}
if (strlen($content) > 5000) {
  echo "呀!你给TA发的话超过长度限制了!";
  exit();
}
if(!empty($ban[$ip]))
{
  echo "呀!你的IP被封禁了";
  exit();
}
if (!empty($ip)) {
  $sql = "SELECT * FROM `content` where ip = '$ip'";
  $commd = mysqli_query($conn,$sql);
  $result = mysqli_fetch_assoc($commd);
  if (!empty($result)) {
    $timel = $result['time'];
    if (($time - $timel) <= 3600) {
      echo "呀!每小时只能表白一次呀!";
      exit();
    }
  }
}
$sql = "INSERT INTO `content` VALUES(uuid(),'$osname','$content','$name','$ip','$time')";
@mysqli_query($conn,$sql);
echo 200;
?>
