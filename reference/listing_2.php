<?php

/**
 * Unless the array is referenced, foreach operates on a copy of the specified array and not the array itself. 
 * foreach has some side effects on the array pointer. 
 * Don't rely on the array pointer during or after the foreach without resetting it.
 */

$a = array('a'=>'apple', 'b'=>'banana', 'c'=>'carrot');
$b = array('a'=>'apple', 'b'=>'banana', 'c'=>'carrot');

$m = $a;
$n = &$b;

foreach ($m as $k=>$v) {
	$m[strtoupper($k)] = $v;
	unset($m[$k]);
}

print_r($m); //Array ( [A] => apple [B] => banana [C] => carrot ) 
echo '<br />';

foreach ($n as $k=>$v) {
	$n[strtoupper($k)] = $v;
	unset($n[$k]);
}

print_r($n); //Array ( ) 

