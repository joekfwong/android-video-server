<?php
$log_directory = 'videos/';
$results_array = array();

$di = new RecursiveDirectoryIterator($log_directory);
foreach (new RecursiveIteratorIterator($di) as $filename => $file) {
	if (is_dir($file)) {
		continue;
	}
	//echo $filename . ' - ' . $file->getSize() . ' bytes <br/>';
	$results_array[] = $filename;
}

echo '{"videos":[';
$add_delimiter = false;
for ($i=0; $i<count($results_array); $i++) {
	echo ($add_delimiter ? ', ' : '') . '"' . $results_array[$i] . '"';
	$add_delimiter = true;
}
echo ']';
/* Step 4.2 End */
echo '}';
?>