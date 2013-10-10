<?php

$dbh1 = new PDO('sqlsrv:server=211.151.78.198;Database=db_firstauto;','iautosuser','59qLvCjOgvFM');
$dbh2 = new PDO('mysql:host=localhost;dbname=jlr_iautos_cn','root','');
$dbh2->exec('SET NAMES UTF8');

print_r($dbh1->query('select fld_nearby from tab_cityaround')->fetchAll());
print_r($dbh2->query('select * from items')->fetchAll());