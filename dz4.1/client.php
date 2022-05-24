<?php

header('Content-Type: text/plain');

try{
	ini_set('soap.wsdl_cache_enabled',0);
	ini_set('soap.wsdl_cache_ttl',0);

	$val = $_POST['value'];
    $con = $_POST['currency'];

	
	$sClient = new SoapClient('convert.wsdl');
	$response = $sClient->converter($con, $val);
	
	
	var_dump($response);

} catch(SoapFault $e){
  var_dump($e);
  echo $e;
}

?>