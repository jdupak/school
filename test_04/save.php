<?php 
	$data['name'] = $_POST['name'];
	$data['email'] = $_POST['email'];
	$data['header_type'] = $_POST['header'];

	file_put_contents("data.json", json_encode($data));

	header("Location: http://localhost/dupak/test_04/");
?>