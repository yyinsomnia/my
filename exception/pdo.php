<?php

try{
	$dsh = new PDO('mysql:host=localhost;dbname=iautos','root','');
}catch(exception $e)
{
	echo $e->getMessage();
}