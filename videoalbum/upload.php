<?php

if ($_FILES["file"]["error"] > 0)
{
	echo "File Error : " . $_FILES["file"]["error"] . "<br />";
	
} else {

	$user = $_POST["username"];
	if (!is_dir("videos/")) {
		mkdir("videos/");
		chmod("videos/", 0755);
	}
	$upload_path = "videos/".$user."/";
	if (!is_dir($upload_path)) {
		mkdir($upload_path);
		chmod($upload_path, 0755);
	}
	
	
	echo "Upload File Name: " . $_FILES["file"]["name"] . "<br />";
		
	move_uploaded_file($_FILES["file"]["tmp_name"],$upload_path. $_FILES["file"]["name"]);
	
	chmod($upload_path. $_FILES["file"]["name"], 0644);
	
	chmod($upload_path, 0755);
	
	chmod("videos", 0755);
}
?>