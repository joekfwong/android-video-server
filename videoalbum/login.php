<?php
$db_server = "sophia.cs.hku.hk";
$db_user = "kfwong";
$db_pwd = "joemysql";
$link = mysql_connect($db_server, $db_user, $db_pwd) or die(mysql_error());
$db_selected = mysql_select_db($db_user, $link);

$action = (isset($_GET['action']) ? $_GET['action'] : "");

$username = strtolower((isset($_GET['username']) ? $_GET['username'] : ""));
$userkey = (isset($_GET['userkey']) ? $_GET['userkey'] : "");

if ($action == 'login') {
	$sql = "SELECT id FROM video_album_user where username ='$username' and password = '$userkey';";
	$res = mysql_query($sql) or die(mysql_error());
	$userid = "";
	while ($row = mysql_fetch_array($res)) {
		$userid = $row['id'];
		break;
	}
	if ($userid == "") {
		// return error
		echo '{"result":"FAIL"}';
	} else {
		// return success
		echo '{"result":"SUCCESS"}';
	}
}
if ($action == 'signup') {
	$sql = "SELECT id FROM video_album_user where username ='$username';";
	$res = mysql_query($sql) or die(mysql_error());
	$userid = "";
	while ($row = mysql_fetch_array($res)) {
		$userid = $row['id'];
		break;
	}
	if ($userid == "") {
		// create account
		$sql = "INSERT INTO video_album_user (username, password) VALUES ('$username','$userkey');";
		if (mysql_query($sql)) {
			echo '{"result":"SUCCESS"}';
		} else {
			echo '{"result":"FAIL"}';
		}
	} else {
		// return failure
		echo '{"result":"ALREADYREGISTERED"}';
	}
}
mysqli_close($link);
?>