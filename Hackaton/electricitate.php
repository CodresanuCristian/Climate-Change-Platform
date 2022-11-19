<?php
$servername = "localhost";
$username = "root";
$password = "";




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
function GetSingleValue(&$con,$String,$PhpFile='File not implemented yet') 
{
	$res = Q($con,$String);
	while($data = mysqli_fetch_assoc($res))
		foreach($data as $key => $value)
			return $value;
	return "?";
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

// $sql = "insert into pyramid.istoric_electricicate_romania(Val) values ($content)";
$sql = "SELECT Val FROM pyramid.istoric_electricicate_romania order by date desc limit 1";
echo GetSingleValue($conn,$sql);
//$conn->query($sql);
$conn->close();



?>

