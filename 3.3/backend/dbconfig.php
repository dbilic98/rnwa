<?php
$DBhost = "localhost";
$DBuser = "root";
$DBpassword ="";
$DBname = "bank";
$DBport = "3307";

$conn = mysqli_connect($DBhost,$DBuser, $DBpassword, $DBname, $DBport);

if(!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>