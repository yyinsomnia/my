<?php

$param = ['url'=>'http://www.iautos.cn/shop/shop_c.asp?shopid=24461'];
var_dump(http_build_query($param));
echo file_get_contents('http://localhost/github/my/get/urlencode.php?'.http_build_query($param) );
echo file_get_contents('http://localhost/github/my/get/urlencode.php?url=http://www.iautos.cn/shop/shop_c.asp?shopid=24461' );