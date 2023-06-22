<?php
// $server= "localhost";
// $username= "root";
// $password= "";
// $dbname= "easykayak";
// $connect= mysqli_connect ($server, $username, $password, $dbname);
// session_start();
// session_unset();
// session_destroy();
// error_reporting(0);


$server = "localhost";
$username ="root";
$pass ="";
$database = "easykayak";

$connect = mysqli_connect($server, $username, $pass, $database);


if (!$connect)
{
die("connectionfailed: " . mysqli_connect_error());
}

if (!isset ($_SESSION)) {
    session_start();
}

?>
