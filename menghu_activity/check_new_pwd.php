<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>无标题文档</title>
</head>

<body>
<?php
include_once("conn/conn.php");
$user = $_POST['user'];
$oldpwd = $_POST['oldpwd'];
$newpwd = $_POST['newpwd'];
$confirmpwd = $_POST['confirmpwd'];
if (!($user and $oldpwd and $newpwd and $confirmpwd)){
	echo "<script>alert('Input empty');history.go(-1);</script>";
}else{
	$result = mysqli_query($conn,"select username,password from user_info where username = '$user'");
	$row = mysqli_fetch_object($result);
	if (mysqli_num_rows($result) == 0){
	    echo "<script>alert('Username error');history.go(-1);</script>";
	}else if ($oldpwd != $row->password){
	    echo "<script>alert('Old Password error');history.go(-1);</script>";
	}else if ($newpwd != $confirmpwd){
	    echo "<script>alert('Two new passwords are different');history.go(-1);</script>";
	}else{
	    $delstr = "delete from user_info where username = '$user'";
		mysqli_query($conn,$delstr);
		$sqlstr = "insert into user_info (username, password) values('$user', '$newpwd')";
		mysqli_query($conn,$sqlstr);
		date_default_timezone_set('Asia/Shanghai');
        $time = date("Y-m-d H:i:s");
        $operatestr = "insert into operation (user, operate, ip, time) values('$user', 'Change password', '".$_SERVER["REMOTE_ADDR"]."', '$time')";
        mysqli_query($conn,$operatestr);
		echo "<script>alert('Change password successfully');history.go(-2);</script>";
	}
}
?>
</body>
</html>
