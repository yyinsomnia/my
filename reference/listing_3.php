<?php

$a = array('xiaopang', 'shouzi', 'piwa');
$b = &$a;
$c = $b;
$b[] = 'dadapaopaotang';
print_r($c); //Array ( [0] => xiaopang [1] => shouzi [2] => piwa ) 
