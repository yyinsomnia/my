<?php
$pdo = new PDO('mysql:host=localhost;dbname=iautos;charset=utf8','root','');
echo $pdo::FETCH_ASSOC;