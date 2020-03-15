<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>添加数据</title>
<link rel="stylesheet" type="text/css" href="mystyle.css">
</head>
<body>
<center>
<?php
include_once("conn/conn.php");
session_start();
$result2 = mysqli_query($conn,"select * from available_activity where user = '".$_SESSION['user']."'");
if ($_POST['choice'] == null){
    if (mysqli_num_rows($result2) == 0){
		$emptystr = "insert into available_activity (user, Tue_football, Tue_basketball, Wed_football, Wed_basketball, Thu_football, Thu_basketball, Fri_football, Fri_basketball, Sat_football, Sat_basketball) values('".$_SESSION['user']."', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
		mysqli_query($conn,$emptystr);
		date_default_timezone_set('Asia/Shanghai');
        $time = date("Y-m-d H:i:s");
        $operatestr = "insert into operation (user, operate, ip, time) values('".$_SESSION['user']."', 'Submit new result', '".$_SERVER["REMOTE_ADDR"]."', '$time')";
        mysqli_query($conn,$operatestr);
		echo "<script>alert('Submit successfully');window.location.href = 'login.php';</script>";
	}else{
	    $emptystr = "update available_activity set Tue_football=0, Tue_basketball=0, Wed_football=0, Wed_basketball=0, Thu_football=0, Thu_basketball=0, Fri_football=0, Fri_basketball=0, Sat_football=0, Sat_basketball=0 where user='".$_SESSION['user']."'";
		mysqli_query($conn,$emptystr);
		date_default_timezone_set('Asia/Shanghai');
		$time = date("Y-m-d H:i:s");
        $operatestr = "insert into operation (user, operate, ip, time) values('".$_SESSION['user']."', 'Update result', '".$_SERVER["REMOTE_ADDR"]."', '$time')";
        mysqli_query($conn,$operatestr);
		echo "<script>alert('Update successfully');window.location.href = 'login.php';</script>";
		}
}else{
	if (in_array('Tuefootball', $_POST['choice'])){
		$addtuefootball = 1;
	}else $addtuefootball = 0;
	if (in_array('Tuebasketball', $_POST['choice'])){
		$addtuebasketball = 1;
	}else $addtuebasketball = 0;
	if (in_array('Wedfootball', $_POST['choice'])){
		$addwedfootball = 1;
	}else $addwedfootball = 0;
	if (in_array('Wedbasketball', $_POST['choice'])){
		$addwedbasketball = 1;
	}else $addwedbasketball = 0;
	if (in_array('Thufootball', $_POST['choice'])){
		$addthufootball = 1;
	}else $addthufootball = 0;
	if (in_array('Thubasketball', $_POST['choice'])){
		$addthubasketball = 1;
	}else $addthubasketball = 0;
	if (in_array('Frifootball', $_POST['choice'])){
		$addfrifootball = 1;
	}else $addfrifootball = 0;
	if (in_array('Fribasketball', $_POST['choice'])){
		$addfribasketball = 1;
	}else $addfribasketball = 0;
	if (in_array('Satfootball', $_POST['choice'])){
		$addsatfootball = 1;
	}else $addsatfootball = 0;
	if (in_array('Satbasketball', $_POST['choice'])){
		$addsatbasketball = 1;
	}else $addsatbasketball = 0;
	if (mysqli_num_rows($result2) == 0){
		$sqlstr = "insert into available_activity (user, Tue_football, Tue_basketball, Wed_football, Wed_basketball, Thu_football, Thu_basketball, Fri_football, Fri_basketball, Sat_football, Sat_basketball) values('".$_SESSION['user']."', $addtuefootball, $addtuebasketball, $addwedfootball, $addwedbasketball, $addthufootball, $addthubasketball, $addfrifootball, $addfribasketball, $addsatfootball, $addsatbasketball)";
		mysqli_query($conn,$sqlstr);
		date_default_timezone_set('Asia/Shanghai');
		$time = date("Y-m-d H:i:s");
        $operatestr = "insert into operation (user, operate, ip, time) values('".$_SESSION['user']."', 'Submit new result', '".$_SERVER["REMOTE_ADDR"]."', '$time')";
        mysqli_query($conn,$operatestr);
		echo "<script>alert('Submit successfully');window.location.href = 'login.php';</script>";
	}else{
	    $delstr = "delete from available_activity where user = '".$_SESSION['user']."'";
		mysqli_query($conn,$delstr);
		$sqlstr = "insert into available_activity (user, Tue_football, Tue_basketball, Wed_football, Wed_basketball, Thu_football, Thu_basketball, Fri_football, Fri_basketball, Sat_football, Sat_basketball) values('".$_SESSION['user']."', $addtuefootball, $addtuebasketball, $addwedfootball, $addwedbasketball, $addthufootball, $addthubasketball, $addfrifootball, $addfribasketball, $addsatfootball, $addsatbasketball)";
		mysqli_query($conn,$sqlstr);
		date_default_timezone_set('Asia/Shanghai');
		$time = date("Y-m-d H:i:s");
        $operatestr = "insert into operation (user, operate, ip, time) values('".$_SESSION['user']."', 'Update result', '".$_SERVER["REMOTE_ADDR"]."', '$time')";
        mysqli_query($conn,$operatestr);
		echo "<script>alert('Update successfully');window.location.href = 'login.php';</script>";
	}
}
?>
</center>
</body>
</html>