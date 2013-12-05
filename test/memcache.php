<?php

$memcache = new Memcache;
$memcache->addServer('192.168.1.167', 11211);
//$memcache->addServer('192.100.10.209', 11211);

//$memcache->connect('192.100.10.209', 11211);
//var_dump($memcache->get(md5('http://www.iautos.cn/beijing/')));
$memcache->set('zhangxuesong','aoaoao');
echo $memcache->get('zhangxuesong');