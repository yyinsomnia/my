<?php

$a = null;
try{
	$a = 5/0;
	echo $a,PHP_EOL;
}catch(exception $e){
	echo 'liuhongxin';
	$e->getMessage();
	$a = -1;
}
echo $a;