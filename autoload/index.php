<?php

$a = new hi();
$b = new hi();

function __autoload($classname)
{
	$filename = "./".$classname.".class.php";
	include($filename);
}
