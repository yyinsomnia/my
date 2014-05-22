<?php
/**
 * it is so intesting!
 * 这么看数组的赋值默认是引用传值
 * 请参照手册http://cn2.php.net/manual/en/language.references.whatdo.php
 * 奇怪的是中文版的手册居然没有这一块
 * 这么做的目的是神马呢？难道是节约内存空间？
 * 怎么写才会不是引用赋值咧？
 */

//以上理解错了，正确的理解在这里
//Doing a normal (not by reference) assignment with a reference 
//on the right side does not turn the left side into a reference, 
//but references inside arrays are preserved in these normal assignments
$a = 1;
$b = &$a;

$c = $a;

$c = 2;

echo '$a = '.$a. '<br />'; //1
echo '$b = '.$b. '<br />'; //1
echo '$c = '.$c. '<br />'; //2


$arr1 = [1];
$babala = &$arr1[0];
$arr2 = $arr1; //$arr2[0]是一个引用变量！
$arr2[0]++;

echo '$arr1[0] = '.$arr1[0]. '<br />'; //2
echo '$babala = '.$babala. '<br />'; //2
echo '$arr2[0] = '.$arr2[0]. '<br />'; //2

$arr5 = [1];
$carrot = $arr5[0];
$arr6 = $arr5;
$arr6[0]++;

echo '$arr5[0] = '.$arr5[0]. '<br />'; //1
echo '$carrot = '.$carrot. '<br />'; //1
echo '$arr6[0] = '.$arr6[0]. '<br />'; //2

$arr7 = [1];
$dog = $arr7[0];
$arr8 = $arr7;
$arr8[0] = 2;

echo '$arr7[0] = '.$arr7[0]. '<br />'; //2
echo '$dog = '.$dog. '<br />'; //1
echo '$arr8[0] = '.$arr8[0]. '<br />'; //2
