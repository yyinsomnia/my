<?php

$a = [0=>'apple', 1=>'banana'];
unset($a[0]);
unset($a[1]);
foreach ($a as $key => $value) {
	echo $value;
}
//var_dump();