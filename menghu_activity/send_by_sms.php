<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>�ޱ����ĵ�</title>
</head>

<body>
<?php
$statusStr = array(
"0" => "0", //���ŷ��ͳɹ�
"-1" => "-1", //������ȫ
"-2" => "-2", //�������ռ䲻֧��,��ȷ��֧��curl����fsocket����ϵ���Ŀռ��̽�����߸����ռ䣡
"30" => "30", //�������
"40" => "40", //�˺Ų�����
"41" => "41", //����
"42" => "42", //�ʻ��ѹ���
"43" => "43", //IP��ַ����
"50" => "50" //���ݺ������д�
);
$smsapi = "http://api.smsbao.com/";
$user = "genghaoxiang"; //����ƽ̨�ʺ�
$pass = md5("111111"); //����ƽ̨����
$content="New password: 111111";//Ҫ���͵Ķ�������
$phone = "18801971503";//Ҫ���Ͷ��ŵ��ֻ�����
$sendurl = $smsapi."sms?u=".$user."&p=".$pass."&m=".$phone."&c=".urlencode($content);
$result =file_get_contents($sendurl) ;
echo $statusStr[$result];
?>
</body>
</html>
