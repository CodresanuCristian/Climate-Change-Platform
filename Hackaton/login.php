<?php
$servername = "localhost";
$username = "root";
$password = "";


$nume = $_POST['nume'];

function Q(&$con,$q,$PhpFile='File not implemented yet')
{
	try
	{
		$res = mysqli_query($con,$q);
	}
	catch(Exception $e)
	{
		$SQL_ERR=$e->getMessage();
		echo "QUERIUL $q a DAT: $SQL_ERR<br>\n";
	}
	return $res;
}

function GetSingleLine(&$con,$String,$PhpFile='File not implemented yet') 
{
	$res = Q($con,$String);
	while($data = mysqli_fetch_assoc($res))
		return $data;
	return "?";
}


$conn = new mysqli($servername, $username, $password);
if ($conn->connect_error) {
	  die("Connection failed: " . $conn->connect_error);
}
$nume = stripslashes($nume);
$nume = mysqli_real_escape_string($conn,$nume);
$sql = "SELECT * FROM pyramid.user where Nume='$nume'";
$GLOBALS["User"]=GetSingleLine($conn,$sql);
//var_dump($GLOBALS["User"]);
$conn->close();


?>