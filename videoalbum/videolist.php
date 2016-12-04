<?php
$username = strtolower((isset($_GET['username']) ? $_GET['username'] : ""));
if ($username != "") {
	$log_directory = 'videos/'.$username;
	
	$results_array = array();
	
	if (is_dir($log_directory))
	{
		if ($handle = opendir($log_directory))
		{
			//Notice the parentheses I added:
			while(($file = readdir($handle)) !== FALSE)
			{
				$results_array[] = $file;
			}
			closedir($handle);
		}
	}
	
	echo '{"videos":[';
	$add_delimiter = false;
	for ($i=0; $i<count($results_array); $i++) {
		if ($results_array[$i] == ".") continue;
		
		if ($results_array[$i] == "..") continue;
		
		echo ($add_delimiter ? ', ' : '') . '"' .$log_directory.'/'. $results_array[$i] . '"';
		$add_delimiter = true;
	}
	echo ']';
	echo '}';
}
?>