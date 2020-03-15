<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>Forgot Password</title>
</head>

<body>
Please input your mail address:
<form name="phpmailer" action="/menghu_activity/send.php" method="post">
<input type="hidden" name="submitted" value="1"/>
Mail address: <input type="text" size="20" name="address" /> @harman.com
<br/>
<input type="submit" value="Send"/>
</form>
<!--
Please input your phone number:
<form name="phpmailer" action="send_by_sms.php" method="post">
<input type="hidden" name="submitted" value="1"/>
Phone number: <input type="text" size="20" name="phonenumber" />
<br/>
<input type="submit" value="Send"/>
</form> 
-->
Note: Default password is '000000'.  If you haven't changed password or requested a new one, please use default password.
</body>
</html>