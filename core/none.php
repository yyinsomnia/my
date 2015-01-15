<?php

$a = 'apple';

$arr = ['a' => $a, 'b'=>'banana'];
var_dump(http_build_query($arr));