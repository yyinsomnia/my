<?php
/**
* it is so intesting!
* 这么看数组的赋值默认是引用传值
* 请参照手册http://cn2.php.net/manual/en/language.references.whatdo.php
* 奇怪的是中文版的手册居然没有这一块
* 这么做的目的是神马呢？难道是节约内存空间？
* 怎么写才会不是引用赋值咧？
*/

$a = 1;
$b = &$a;

$c = $a;

$c = 2;

echo '$a = '.$a. '<br />'; //1
echo '$b = '.$b. '<br />'; //1
echo '$c = '.$c. '<br />'; //2


$arr1 = [1];
$babala = &$arr1[0];
$arr2 = $arr1;

$arr2[0]++;

echo '$arr1[0] = '.$arr1[0]. '<br />'; //2
echo '$babala = '.$babala. '<br />'; //2
echo '$arr2[0] = '.$arr2[0]. '<br />'; //2

$arr5 = [1];
$carrot = $arr5[0];
$arr6 = $arr5;
$arr6[0]++;

echo '$arr5[0] = '.$arr1[0]. '<br />'; //2
echo '$carrot = '.$carrot. '<br />'; //2
echo '$arr6[0] = '.$arr6[0]. '<br />'; //2
