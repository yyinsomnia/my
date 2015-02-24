<?php

var_dump(error_reporting());
set_error_handler(function($errno, $errstr, $errfile, $errline){
	var_dump(error_reporting());
});

//restore_error_handler();
for ($i = 0; $i < 5; $i++)
	@file_get_contents('http://www.iautos.cn/123');
echo $i;
var_dump(error_reporting());