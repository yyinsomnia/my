<?php 
$id = '1,2';
$arrId = explode(',', $id);

foreach($arrId as $id)
{
	echo '';
}
var_dump($id);//最后id为2 foreach里面的 as 后面的变量作用域不仅仅是在foreach循环里面啊！


$id = '1,2';
$arrId = explode(',', $id);
foreach($arrId as &$id)
{
	$id = 3;
}
$id = '1,2';
var_dump($arrId); //array(2) { [0]=> int(3) [1]=> &string(3) "1,2" } 
//所以一般如果foreach里面使用& 则在循环以后unset掉该变量
?>