<?php
$servername = "localhost";
$username = "root";
$password = "";


$name = $_POST["name"];
$transport = $_POST["transport"];
$mancare = $_POST["mancare"];
$curent = $_POST["curent"];
$apa = $_POST["apa"];
$reciclat = $_POST["reciclat"];


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
$name = stripslashes($name);
$name = mysqli_real_escape_string($conn,$name);

$sql = "INSERT INTO pyramid.user(Nume, Lat, Lon, Oras, Tara, Transport, Mancare, Electricitate, ApaCaldaSiRece, Reciclat) VALUES ('$name',-1,-1,'','',$transport,$mancare,$curent,$apa,$reciclat)";
Q($conn,$sql);



// $sql = "SELECT * FROM pyramid.user where Nume='$name'";
// $GLOBALS["User"]=GetSingleLine($conn,$sql);

$conn->close();


?>