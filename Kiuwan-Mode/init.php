<?php
/*
$host = "localhost";
$user = "id1332318_server";
$password = "progetto";
$db = "id1332318_server";

$con = mysqli_connect($host,$user,$password,$db);

if(!$con) 
{
	die ("Error with the connection from MySqL" . mysqli_connect_error() );
}
*/

$con = new PDO('mysql:dbname=id1332318_server;host=localhost;charset=utf8', 'id1332318_server', 'progetto');

$con->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>