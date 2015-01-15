<?php

$a = null;
var_dump($a == 0);

$a = '0';
if ($a)
	echo "'0' is true";

var_dump(empty($a));