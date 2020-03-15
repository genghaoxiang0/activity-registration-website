<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>无标题文档</title>
</head>

<body>
<?php
require_once("class.phpmailer.php"); //下载的文件必须放在该文件所在目录
$mail = new PHPMailer(); //建立邮件发送类
$mail->SMTPDebug = 2;
$address = $_POST['address']."@harman.com";
$mail->IsSMTP(); // 使用SMTP方式发送
$mail->CharSet='UTF-8';// 设置邮件的字符编码
$mail->Host = "smtp.163.com"; // 您的企业邮局域名
//$mail->Host = "HICGWSMB10.ad.harman.com";
$mail->SMTPSecure = 'ssl';
$mail->SMTPAuth = true; // 启用SMTP验证功能
$mail->Port = "465"; //SMTP端口
//$mail->Port = "25";
$mail->Username = "18801971503@163.com"; // 邮局用户名(请填写完整的email地址)
$mail->Password = "ghx123"; // 邮局密码
$mail->From = "18801971503@163.com"; //邮件发送者email地址
//$mail->From = "Admin@DeviceTool.sh";
//$mail->FromName = "您的名称";
$mail->AddAddress("$address", "");//收件人地址，可以替换成任何想要接收邮件的email信箱,格式是AddAddress("收件人email","收件人姓名")
//$mail->AddReplyTo("", "");
//$mail->AddAttachment("/var/tmp/file.tar.gz"); // 添加附件
//$mail->IsHTML(true); // set email format to HTML //是否使用HTML格式
$mail->Subject = "New Password for Menghu Activity System"; //邮件标题
$newpassword = rand(100000,999999);
$mail->Body = "Hello, new password is '".$newpassword."'"; //邮件内容
//$mail->AltBody = "This is the body in plain text for non-HTML mail clients"; //附加信息，可以省略
include_once("conn/conn.php");
$changepwdstr = "update user_info set password=$newpassword where username='".$_POST['address']."'";
mysqli_query($conn,$changepwdstr);
date_default_timezone_set('Asia/Shanghai');
$time = date("Y-m-d H:i:s");
$operatestr = "insert into operation (user, operate, ip, time) values('".$_POST['address']."', 'Send new password', '".$_SERVER["REMOTE_ADDR"]."', '$time')";
mysqli_query($conn,$operatestr);
/*if(!$mail->Send())
{
echo "Mail send fail. <p>";
echo "Failure reason: " . $mail->ErrorInfo;
exit;
}
*/
echo "<script>alert('New password is sent to your mailbox');history.go(-2);</script>";
?>

</body>
</html>
