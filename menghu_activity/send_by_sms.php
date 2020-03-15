<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>无标题文档</title>
</head>

<body>
<?php
$statusStr = array(
"0" => "0", //短信发送成功
"-1" => "-1", //参数不全
"-2" => "-2", //服务器空间不支持,请确认支持curl或者fsocket，联系您的空间商解决或者更换空间！
"30" => "30", //密码错误
"40" => "40", //账号不存在
"41" => "41", //余额不足
"42" => "42", //帐户已过期
"43" => "43", //IP地址限制
"50" => "50" //内容含有敏感词
);
$smsapi = "http://api.smsbao.com/";
$user = "genghaoxiang"; //短信平台帐号
$pass = md5("111111"); //短信平台密码
$content="New password: 111111";//要发送的短信内容
$phone = "18801971503";//要发送短信的手机号码
$sendurl = $smsapi."sms?u=".$user."&p=".$pass."&m=".$phone."&c=".urlencode($content);
$result =file_get_contents($sendurl) ;
echo $statusStr[$result];
?>
</body>
</html>
