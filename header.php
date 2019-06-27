<!--
xcsoft版权所有 | 盗版必究
http://blog.xsot.cn
V2.0
2019/06/26
-->
<head>
<?php session_start();?>
    <!--百度统计-->
    <script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "https://hm.baidu.com/hm.js?769c5c35b29cc05a9acf066f9b3da28d";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>
      <body background="./assets/img/bg.jpg" class="mdui-theme-primary-indigo mdui-theme-accent-pink">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>表白墙 - Powered by XCSOFT</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/mdui/0.4.2/css/mdui.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/mdui/0.4.2/js/mdui.min.js"></script>
 <div class="mdui-tab mdui-tab-full-width mdui-tab-centered">
        <!--首页-->
        <?php 
            echo("<a href=\"./index.php\" class=\"mdui-ripple\">首页</a>");  
       # 登出
        if(!empty($_SESSION['password'])){
            echo("<a href=\"./logout.php\" class=\"mdui-ripple\">登出</a>");
        }
        else{
       }
        # 登陆
        if(!empty($_SESSION['password'])){
            echo("<a href=\"./admin\" class=\"mdui-ripple\">管理</a>");
        }
      else{
            echo("<a href=\"./login.php\" class=\"mdui-ripple\">登录</a>");  
       }
        echo("<a href=\"./find.php\" class=\"mdui-ripple\">查询Beta</a>");  
        echo("<a href=\"http://xsot.tk\" class=\"mdui-ripple\">网址缩短</a>");
        echo("<a href=\"http://blog.xsot.cn/archives/pro-bbq.html\" class=\"mdui-ripple\">关于</a>");
        $password=$_SESSION['password'];
        ?>
</div>
<center><h2>星辰表白墙</h2></center>
</head>
