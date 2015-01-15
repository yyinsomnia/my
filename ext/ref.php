<?php
//关于PHP语言中引用形式返回值的详述，请参考PHP手册。
$a = 'china';

 
$b = byref_calltime($a);
$b = "php";
echo $a;