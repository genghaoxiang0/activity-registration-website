<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>�ޱ����ĵ�</title>
</head>

<body>
<?php
require_once("class.phpmailer.php"); //���ص��ļ�������ڸ��ļ�����Ŀ¼
$mail = new PHPMailer(); //�����ʼ�������
$mail->SMTPDebug = 2;
$address = $_POST['address']."@harman.com";
$mail->IsSMTP(); // ʹ��SMTP��ʽ����
$mail->CharSet='UTF-8';// �����ʼ����ַ�����
$mail->Host = "smtp.163.com"; // ������ҵ�ʾ�����
//$mail->Host = "HICGWSMB10.ad.harman.com";
$mail->SMTPSecure = 'ssl';
$mail->SMTPAuth = true; // ����SMTP��֤����
$mail->Port = "465"; //SMTP�˿�
//$mail->Port = "25";
$mail->Username = "18801971503@163.com"; // �ʾ��û���(����д������email��ַ)
$mail->Password = "ghx123"; // �ʾ�����
$mail->From = "18801971503@163.com"; //�ʼ�������email��ַ
//$mail->From = "Admin@DeviceTool.sh";
//$mail->FromName = "��������";
$mail->AddAddress("$address", "");//�ռ��˵�ַ�������滻���κ���Ҫ�����ʼ���email����,��ʽ��AddAddress("�ռ���email","�ռ�������")
//$mail->AddReplyTo("", "");
//$mail->AddAttachment("/var/tmp/file.tar.gz"); // ��Ӹ���
//$mail->IsHTML(true); // set email format to HTML //�Ƿ�ʹ��HTML��ʽ
$mail->Subject = "New Password for Menghu Activity System"; //�ʼ�����
$newpassword = rand(100000,999999);
$mail->Body = "Hello, new password is '".$newpassword."'"; //�ʼ�����
//$mail->AltBody = "This is the body in plain text for non-HTML mail clients"; //������Ϣ������ʡ��
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
