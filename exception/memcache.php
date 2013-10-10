<?php

try{
	$memcache = new Memcache;
	$memcache->connect('localhost', 11211);
}catch(exception $e)
{
	echo $e->getMessage();
}

//echo '123';