<?php

  $serverName = "172.30.0.3";
  $dataBaseName = "COLABORADORES";
  $userId = "ghumana";
  $userPassword = "Ghumana2@22";
  
  $connectionInfo = array(
    "APP"           =>  "Gestion",
    "Database"      =>  $dataBaseName, 
    "UID"           =>  $userId, 
    "PWD"           =>  $userPassword, 
    "CharacterSet"  =>  "UTF-8",
    "LoginTimeout"  =>  30,
    "MultipleActiveResultSets"  =>  1
  );
    
  $conn = sqlsrv_connect($serverName, $connectionInfo);
  if ($conn === false) {
    die( print_r( sqlsrv_errors(), true));
  }
    
?>