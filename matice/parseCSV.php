<?php 
function parseCSV($path)
{
	$fileContent = file_get_contents($path);
	$rows = explode(PHP_EOL, $fileContent);
	foreach ($rows as $key => $value) {
		$data[] = explode(";",$value);
	}
	return $data;
}
?>