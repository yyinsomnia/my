<?php 

$a = array(1,2,3,4);

foreach($a as &$item)
{

}

foreach($a as $item)
{

}


print_r($a);//array(1,2,3,3)