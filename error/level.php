<?php

set_error_handler(function($errno, $errstr, $errfile, $errline){
	echo $errno;
});
$a = null;
var_dump($a->id);
var_dump($a->getId());