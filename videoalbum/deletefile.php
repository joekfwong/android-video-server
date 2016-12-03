<?php

ini_set('display_errors','On');
error_reporting(E_ALL);

$file_to_delete = "";

if (!empty($_GET["user_name"]) && !empty($_GET["file_name"])) {
	$file_to_delete = "videos/".$_GET["user_name"]."/".$_GET["file_name"];
}

echo "File path - " . $file_to_delete;

if (!is_file($file_to_delete))
{
//	echo "File Error : " . $_FILES["file_name"]["error"] . "<br />";
	echo "File Error" . "<br />";	
} else if (unlink($file_to_delete)) {
	echo "file deleted";
} else {
	echo "Problem in deleting file";
}

?>