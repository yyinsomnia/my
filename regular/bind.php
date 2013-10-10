<?php
header ("Content-type: text/html;charset=utf-8");
$sql = "SELECT * FROM TABLE WHERE conId=:id AND title LIKE :kw AND created<=:time ORDER BY conId DESC  LIMIT 1";
$args = array('id'=>1,'kw'=>'测试','time'=>12312321312);


$sql = "SELECT * FROM TABLE WHERE test=:idte AND conId=:id AND title LIKE :kw AND created<=:time ORDER BY conId DESC  LIMIT 1";
$args = array('id'=>1,'idte'=>'tester','kw'=>'测试','time'=>12312321312);


function bind($sql ,$args){
    $key = array_keys($args);
    $value = array_values($args);
    $key = array_map('add_quote' ,$key);
    $value = array_map('format_data', $value);
    $sql = preg_replace($key, $value,$sql,1);
    return $sql;
}
/*
function add_quote($v){
    $v = preg_quote(':'.$v);
    return '/'.$v.' /';
}
function format_data($v){
    switch (true) {
        case is_int($v):
            $data = $v.' ';
            break;
        default:
            $data = "'{$v}' ";
            break;
    }
    return $data;
}
*/
function add_quote($v){
    $v = preg_quote(':'.$v);
    return '/'.$v.'/';
}
function format_data($v){
    switch (true) {
        case is_int($v):
            $data = $v;
            break;
        default:
            $data = "'{$v}'";
            break;
    }
    return $data;
}
echo bind($sql ,$args);