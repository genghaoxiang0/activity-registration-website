<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Weekly Activity</title>
</head>
<script language="javascript">
function checkall(activitychoose,status){
	var elements = activitychoose.getElementsByTagName('input');
	for(var i=0; i<elements.length; i++){
		if(elements[i].type == 'checkbox'){
			if(elements[i].checked==false){
				elements[i].checked=true;
			}
		}
	}
}
function checkallfootball(activitychoose,status){
	var elements = activitychoose.getElementsByTagName('input');
	for(var i=0; i<elements.length; i++){
		if(elements[i].type == 'checkbox'){
			if(i%2 == 0){
				elements[i].checked=true;
			}
		}
	}
}
function checkallbasketball(activitychoose,status){
	var elements = activitychoose.getElementsByTagName('input');
	for(var i=0; i<elements.length; i++){
		if(elements[i].type == 'checkbox'){
			if(i%2 == 1){
				elements[i].checked=true;
			}
		}
	}
}
function uncheckall(activitychoose,status){
	var elements = activitychoose.getElementsByTagName('input');
	for(var i=0; i<elements.length; i++){
		if(elements[i].type == 'checkbox'){
			if(elements[i].checked==true){
				elements[i].checked=false;
			}
		}
	}
}
</script>
<body>
<center>
<?php
include_once("conn/conn.php");
session_start();
$_SESSION['user'] = $_POST['user'];
$pwd = $_POST['pwd'];
if (!($_SESSION['user'] and $pwd)){
	echo "<script>alert('Input empty');history.go(-1);</script>";
}else{
	$result = mysqli_query($conn,"select username,password from user_info where username = '".$_SESSION['user']."'");
	$row = mysqli_fetch_object($result);
	if (mysqli_num_rows($result) == 0){
	    echo "<script>alert('Username error');history.go(-1);</script>";
	}else{
	    if ($pwd != $row->password){
			date_default_timezone_set('Asia/Shanghai');
            $time = date("Y-m-d H:i:s");
            $operatestr = "insert into operation (user, operate, ip, time) values('".$_SESSION['user']."', 'Login failed', '".$_SERVER["REMOTE_ADDR"]."', '$time')";
            mysqli_query($conn,$operatestr);
	        echo "<script>alert('Password error');history.go(-1);</script>";
	    }else{
			date_default_timezone_set('Asia/Shanghai');
            $time = date("Y-m-d H:i:s");
            $operatestr = "insert into operation (user, operate, ip, time) values('".$_SESSION['user']."', 'Login', '".$_SERVER["REMOTE_ADDR"]."', '$time')";
            mysqli_query($conn,$operatestr);
		}
	}
}
mysqli_close($conn);
?>
<form name="activitychoose" action="/menghu_activity/index_ok.php" method="post">
  <table width="455" border="1" cellpadding="1" cellspacing="1" bordercolor="#FFFFFF" bgcolor="#FFFFFF"
    <td align="center" valign="middle">
	<tr bgcolor="#FFFFFF">
      <td height="25" align="left">
        <input type="checkbox" name="choice[]" value="Tuefootball"> Tuesday Football<br>
	  </td>
    </tr>
	<tr bgcolor="#FFFFFF">
      <td height="25" align="left">
        <input type="checkbox" name="choice[]" value="Tuebasketball"> Tuesday Basketball<br>
	  </td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td height="25" align="left">
        <input type="checkbox" name="choice[]" value="Wedfootball"> Wednesday Football<br>
	  </td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td height="25" align="left">
        <input type="checkbox" name="choice[]" value="Wedbasketball"> Wednesday Basketball<br>
	  </td>
    </tr>
	<tr bgcolor="#FFFFFF">
      <td height="25" align="left">
        <input type="checkbox" name="choice[]" value="Thufootball"> Thursday Football<br>
	  </td>
    </tr>
	<tr bgcolor="#FFFFFF">
      <td height="25" align="left">
        <input type="checkbox" name="choice[]" value="Thubasketball"> Thursday Basketball<br>
	  </td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td height="25" align="left">
        <input type="checkbox" name="choice[]" value="Frifootball"> Friday Football<br>
	  </td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td height="25" align="left">
        <input type="checkbox" name="choice[]" value="Fribasketball"> Friday Basketball<br>
	  </td>
    </tr>
	<tr bgcolor="#FFFFFF">
      <td height="25" align="left">
        <input type="checkbox" name="choice[]" value="Satfootball"> Saturday Football<br>
	  </td>
    </tr>
	<tr bgcolor="#FFFFFF">
      <td height="25" align="left">
        <input type="checkbox" name="choice[]" value="Satbasketball"> Saturday Basketball<br>
	  </td>
    </tr>
	<tr>
	  <td colspan="5" align="center" bgcolor="#FFFFFF">
	    <img src="images/checkall.PNG" onclick="checkall(activitychoose,status)" width="90" height="35" />
		<img src="images/checkallfootball.PNG" onclick="checkallfootball(activitychoose,status)" width="110" height="35" />
		<img src="images/checkallbasketball.PNG" onclick="checkallbasketball(activitychoose,status)" width="110" height="35" />
		<img src="images/uncheckall.PNG" onclick="uncheckall(activitychoose,status)" width="100" height="35" />
	  </td>
	</tr>
    <tr align="center" bgcolor="#FFFFFF">
      <td height="25">
        <input type="submit" value="Submit">
	  </td>
    </tr>
	</td>
  </table>
</form>
</center>
</body>
</html>