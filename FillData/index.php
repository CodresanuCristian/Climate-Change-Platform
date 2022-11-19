<?php


$servername = "localhost";
$username = "root";
$password = "";


$content = exec(".\phantomjs.exe getData.js https://www.sistemulenergetic.ro/");
echo $content;


$conn = new mysqli($servername, $username, $password);
if ($conn->connect_error) {
	  die("Connection failed: " . $conn->connect_error);
}

$sql = "insert into pyramid.istoric_electricicate_romania(Val) values ($content)";
$conn->query($sql);
$conn->close();

	


?>