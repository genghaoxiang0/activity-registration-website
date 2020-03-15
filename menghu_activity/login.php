<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login</title>
</head>

<body>
<form name="loginform" action="/menghu_activity/activity_choose.php" method="post">
  <table width="405" border="1" cellpadding="1" cellspacing="1" bordercolor="#FFFFFF" bgcolor="#FFFFFF"
    <td align="center" valign="middle">
      <tr bgcolor="#FFFFFF">
	    <td width="103" height="25" align="right">User:</td>
	    <td width="144" height="25"><input name="user" type="text" id="user" size="20" maxlength="100"></td>
  	    <td width="103" height="25" align="left">@harman.com</td>
	  </tr>
	  <tr bgcolor="#FFFFFF">
	    <td width="103" height="25" align="right">Password:</td>
	    <td width="289" height="25" colspan="2" align="left"><input name="pwd" type="password" id="pwd" size="20" maxlength="100"></td>
	  </tr>
	  <tr align="center" bgcolor="#FFFFFF">
        <td height="25" colspan="3">
          <input type="submit" name="login" value="Login">
	    </td>
      </tr>
    </td>
  </table>
</form>
<form name="changepwdform" action="/menghu_activity/change_password.php" method="post">
  <table width="405" border="1" cellpadding="1" cellspacing="1" bordercolor="#FFFFFF" bgcolor="#FFFFFF"
    <td align="center" valign="middle">
	  <tr align="center" bgcolor="#FFFFFF">
        <td height="25" colspan="3">
          <input type="submit" name="change_password" value="Change Password">
	    </td>
      </tr>
    </td>
  </table>
</form>
<form name="forgotpwdform" action="/menghu_activity/mail.php" method="post">
  <table width="405" border="1" cellpadding="1" cellspacing="1" bordercolor="#FFFFFF" bgcolor="#FFFFFF"
    <td align="center" valign="middle">
	  <tr align="center" bgcolor="#FFFFFF">
        <td height="25" colspan="3">
          <input type="submit" name="forgot_password" value="Forgot Password">
	    </td>
      </tr>
    </td>
  </table>
</form>
<table width="760" height="100" border="0"  align="center" cellpadding="0" cellspacing="0"
</table>
<table width="760" border="0"  align="center" cellpadding="0" cellspacing="0"
  <tr>
    <td align="center"><table width="700" border="0">
	  <tr>
	    <td width="100" align="center"><span class="STYLE1">Player</span></td>
		<td width="100" align="center"><span class="STYLE1">Tuesday football</span></td>
		<td width="100" align="center"><span class="STYLE1">Tuesday basketball</span></td>
		<td width="100" align="center"><span class="STYLE1">Wednesday football</span></td>
		<td width="100" align="center"><span class="STYLE1">Wednesday basketball</span></td>
		<td width="100" align="center"><span class="STYLE1">Thursday football</span></td>
		<td width="100" align="center"><span class="STYLE1">Thursday basketball</span></td>
		<td width="100" align="center"><span class="STYLE1">Friday football</span></td>
		<td width="100" align="center"><span class="STYLE1">Friday basketball</span></td>
		<td width="100" align="center"><span class="STYLE1">Saturday football</span></td>
		<td width="100" align="center"><span class="STYLE1">Saturday basketball</span></td>
	  </tr>
      <?php
      include_once("conn/conn.php");
      $result=mysqli_query($conn,"select * from available_activity");
	  $tuesdayfootballtotal=0;
	  $tuesdaybasketballtotal=0;
	  $wednesdayfootballtotal=0;
	  $wednesdaybasketballtotal=0;
	  $thursdayfootballtotal=0;
	  $thursdaybasketballtotal=0;
	  $fridayfootballtotal=0;
	  $fridaybasketballtotal=0;
	  $saturdayfootballtotal=0;
	  $saturdaybasketballtotal=0;
      while($myrow=mysqli_fetch_array($result)){
      ?>
      <tr>
        <td align="center"><span class="STYLE2"><?php echo $myrow[0]; ?></span></td>
	    <td align="center"><span class="STYLE2"><?php echo $myrow[1]; $tuesdayfootballtotal=$tuesdayfootballtotal+$myrow[1]; ?></span></td>
	    <td align="center"><span class="STYLE2"><?php echo $myrow[2]; $tuesdaybasketballtotal=$tuesdaybasketballtotal+$myrow[2]; ?></span></td>
	    <td align="center"><span class="STYLE2"><?php echo $myrow[3]; $wednesdayfootballtotal=$wednesdayfootballtotal+$myrow[3]; ?></span></td>
	    <td align="center"><span class="STYLE2"><?php echo $myrow[4]; $wednesdaybasketballtotal=$wednesdaybasketballtotal+$myrow[4]?></span></td>
	    <td align="center"><span class="STYLE2"><?php echo $myrow[5]; $thursdayfootballtotal=$thursdayfootballtotal+$myrow[5]; ?></span></td>
	    <td align="center"><span class="STYLE2"><?php echo $myrow[6]; $thursdaybasketballtotal=$thursdaybasketballtotal+$myrow[6]; ?></span></td>
		<td align="center"><span class="STYLE2"><?php echo $myrow[7]; $fridayfootballtotal=$fridayfootballtotal+$myrow[7]; ?></span></td>
	    <td align="center"><span class="STYLE2"><?php echo $myrow[8]; $fridaybasketballtotal=$fridaybasketballtotal+$myrow[8]; ?></span></td>
		<td align="center"><span class="STYLE2"><?php echo $myrow[9]; $saturdayfootballtotal=$saturdayfootballtotal+$myrow[9]; ?></span></td>
	    <td align="center"><span class="STYLE2"><?php echo $myrow[10]; $saturdaybasketballtotal=$saturdaybasketballtotal+$myrow[10]; ?></span></td>
      </tr>
      <?php
      }
      ?>
	  <tr>
	    <td width="100" align="center"><span class="STYLE1">Total</span></td>
		<td width="100" align="center"><span class="STYLE1"><?php echo $tuesdayfootballtotal; ?></span></td>
		<td width="100" align="center"><span class="STYLE1"><?php echo $tuesdaybasketballtotal; ?></span></td>
		<td width="100" align="center"><span class="STYLE1"><?php echo $wednesdayfootballtotal; ?></span></td>
		<td width="100" align="center"><span class="STYLE1"><?php echo $wednesdaybasketballtotal; ?></span></td>
		<td width="100" align="center"><span class="STYLE1"><?php echo $thursdayfootballtotal; ?></span></td>
		<td width="100" align="center"><span class="STYLE1"><?php echo $thursdaybasketballtotal; ?></span></td>
		<td width="100" align="center"><span class="STYLE1"><?php echo $fridayfootballtotal; ?></span></td>
		<td width="100" align="center"><span class="STYLE1"><?php echo $fridaybasketballtotal; ?></span></td>
		<td width="100" align="center"><span class="STYLE1"><?php echo $saturdayfootballtotal; ?></span></td>
		<td width="100" align="center"><span class="STYLE1"><?php echo $saturdaybasketballtotal; ?></span></td>
	  </tr>
	  <tr>
	    <td width="100" align="center"><span class="STYLE1"></span></td>
		<td width="100" align="center"><span class="STYLE1">Tuesday football</span></td>
		<td width="100" align="center"><span class="STYLE1">Tuesday basketball</span></td>
		<td width="100" align="center"><span class="STYLE1">Wednesday football</span></td>
		<td width="100" align="center"><span class="STYLE1">Wednesday basketball</span></td>
		<td width="100" align="center"><span class="STYLE1">Thursday football</span></td>
		<td width="100" align="center"><span class="STYLE1">Thursday basketball</span></td>
		<td width="100" align="center"><span class="STYLE1">Friday football</span></td>
		<td width="100" align="center"><span class="STYLE1">Friday basketball</span></td>
		<td width="100" align="center"><span class="STYLE1">Saturday football</span></td>
		<td width="100" align="center"><span class="STYLE1">Saturday basketball</span></td>
	  </tr>
	</table></td>
  </tr>
</table>
</body>
</html>
