<?php

if(!extension_loaded("soap")){
  dl("php_soap.dll");
}
ini_set("soap.wsdl_cache_enabled","0");
$server = new SoapServer("http://localhost/4.3/dataFetcher.wsdl");



function doFetchData($id){
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "learningsql";
	
	$con = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());

	$query = "SELECT * FROM employee WHERE `EMP_ID`=" . $id;
	$result = mysqli_query($con, $query);
	
	// $employees = array();
	while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
		$employees = $row;
	}
	
	
	return $employees;
}


$server->AddFunction("doFetchData");


$server->handle();
?>