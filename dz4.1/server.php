<?php

header('Content-Type: text/plain');

if (!extension_loaded("soap")) {
    dl("php_soap.dll");
    }

    ini_set("soap.wsdl_cache_enabled", "0");
     
    $server =  new SoapServer ("convert.wsdl");
   
         function converter ($currency, $value){
              if($currency == "BamEur"){
                    return $value * 0.51 . "EUR";
              }

               if($currency == "EurBam"){
                    return $value * 1.95 . "BAM";
              }

               if($currency == "HrkBam"){
                    return $value * 0.26 . "BAM";
              }

               if($currency == "BamHrk"){
                    return $value * 3.82. "HRK";
              }
      }

         
             
$server->AddFunction("converter");
$server->handle();



?>







