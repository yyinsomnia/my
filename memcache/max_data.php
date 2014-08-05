<?php


$letters = range( 'a', 'z' );
$a = '';
while (strlen($a) < 1024*4)
	$a .= 'a';
var_dump(strlen($a));

$memcache_obj = memcache_connect('localhost', 11211);


memcache_set($memcache_obj, 'key', $a, false, 30);

$b = memcache_get($memcache_obj, 'key');
var_dump(strlen($b));





$a = file_get_contents('houzi.txt');
var_dump(strlen($a));
$memcache_obj = memcache_connect('localhost', 11211);


memcache_set($memcache_obj, 'key', $a, 0, 30);

$b = memcache_get($memcache_obj, 'key');
var_dump(strlen($b));
