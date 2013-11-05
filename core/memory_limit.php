<?php 
//This sets the maximum amount of memory in bytes that a script is allowed to allocate. This helps prevent poorly written scripts for eating up all available memory on a server. Note that to have no memory limit, set this directive to -1.

echo ini_get('memory_limit'); //128M

echo ini_set('memory_limit','16M'); //128M

echo ini_get('memory_limit'); //16M

//ini_set():Returns the old value on success, FALSE on failure.


echo ini_set('memory_limit','1024M'); //16M

echo ini_get('memory_limit'); //1024M