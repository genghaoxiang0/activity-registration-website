<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>Change Password</title>
</head>

<body>
<form name="changepwdform" action="/menghu_activity/check_new_pwd.php" method="post">
  <table width="485" border="1" cellpadding="1" cellspacing="1" bordercolor="#FFFFFF" bgcolor="#FFFFFF"
    <td align="center" valign="middle">
      <tr bgcolor="#FFFFFF">
	    <td width="103" height="25" align="right">User:</td>
	    <td width="144" height="25"><input name="user" type="text" id="user" size="20" maxlength="100"></td>
  	    <td width="103" height="25" align="left">@harman.com</td>
	  </tr>
	  <tr bgcolor="#FFFFFF">
	    <td width="103" height="25" align="right">Old Password:</td>
	    <td width="289" height="25" colspan="2" align="left"><input name="oldpwd" type="password" id="oldpwd" size="20" maxlength="100"></td>
	  </tr>
	  <tr bgcolor="#FFFFFF">
	    <td width="103" height="25" align="right">New Password:</td>
	    <td width="289" height="25" colspan="2" align="left"><input name="newpwd" type="password" id="newpwd" size="20" maxlength="100"></td>
	  </tr>
	  <tr bgcolor="#FFFFFF">
	    <td width="103" height="25" align="right">Confirm Password:</td>
	    <td width="289" height="25" colspan="2" align="left"><input name="confirmpwd" type="password" id="confirmpwd" size="20" maxlength="100"></td>
	  </tr>
	  <tr align="center" bgcolor="#FFFFFF">
        <td height="25" colspan="3">
          <input type="submit" name="ok" value="OK">
	    </td>
      </tr>
    </td>
  </table>
</form>
</body>
</html>
