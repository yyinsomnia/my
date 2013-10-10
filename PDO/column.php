<?php

$pdo = new PDO("mysql:host=localhost;dbname=iautos;charset=utf8","root","");
$result = $pdo->query('show full fields from area')->fetchAll(PDO::FETCH_ASSOC);
var_dump($result);