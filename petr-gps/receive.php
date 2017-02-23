<?php
	$user = $_POST['user'];
	$lat = $_POST['lat'];
	$long = $_POST['long'];
	//$data = $lat.";".$long.";".date('U').";";
	//file_put_contents("./data/".$user, $data);

$servername = "sql307.rf.gd";
$username = "rfgd_19708632";
$password = "117hovno";
$dbname = "rfgd_19708632_gpsData";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO dataset_test (user, lat, long, date)
VALUES ($user, $lat, $long, date('U'))";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>