<?php

$a = 1;
$b = '';
$c = 0;
$e = 'hongxing';
$f = 'wo';

$z = $a ? $b : $c ? $e : $f; 
$x = ($a ? $b : $c) ? $e : $f; 
$y = $a ? $b : ($c ? $e : $f);

var_dump($x);
var_dump($y);
