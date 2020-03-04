<?php
$time = time();

if ($HTTP_SERVER_VARS["HTTP_X_FORWARDED_FOR"]) {
  $ip = $HTTP_SERVER_VARS["HTTP_X_FORWARDED_FOR"];
} elseif ($HTTP_SERVER_VARS["HTTP_CLIENT_IP"]) {
  $ip = $HTTP_SERVER_VARS["HTTP_CLIENT_IP"];
} elseif ($HTTP_SERVER_VARS["REMOTE_ADDR"]) {
  $ip = $HTTP_SERVER_VARS["REMOTE_ADDR"];
} elseif (getenv("HTTP_X_FORWARDED_FOR")) {
  $ip = getenv("HTTP_X_FORWARDED_FOR");
} elseif (getenv("HTTP_CLIENT_IP")) {
  $ip = getenv("HTTP_CLIENT_IP");
} elseif (getenv("REMOTE_ADDR")) {
  $ip = getenv("REMOTE_ADDR");
} else
{
  $ip = "Unknown";
}

$ban = array(
  "1.1.1.2" => "ban"
);
//ban用户数据库

function emailsend($sendto,$topic,$content) {
  $data = array (
    'key' => "emailapikeyxcsoft",
    'sendto' => $sendto,
    'topic' => $topic,
    'content' => $content,
    'name' => 'lovewall'
  );
  $ch = curl_init ();
  curl_setopt ($ch, CURLOPT_URL, "https://xsot.cn/api/email/emailsend.php");
  curl_setopt ($ch, CURLOPT_POST, 1);
  curl_setopt ($ch, CURLOPT_HEADER, 0);
  curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt ($ch, CURLOPT_POSTFIELDS, $data);
  $return = curl_exec ($ch);
  curl_close ($ch);
  $arr = json_decode($return, true);
  //获取返回值
  return $arr;
}
//邮件api
  ?>