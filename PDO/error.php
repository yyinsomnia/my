<?php

$dbh = new PDO("mysql:host=localhost;dbname=iautos;charset=utf8","root","");
$dbh->exec("INSERT INTO bones(skull) VALUES ('lucy')");
throw new Exception("delete error: ".$dbh->errorCode().':', 1);

//echo "\nPDO::errorCode(): ";
//print $dbh->errorCode();
//print_r($dbh->errorInfo());
