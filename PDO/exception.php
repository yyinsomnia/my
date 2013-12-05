<?php
$pdo = new PDO("mysql:host=localhost;dbname=iautos;charset=utf8","root","");

$a = insert('friend_link',array('page_url'=>'http://www.iautos.cn/','title'=>'第八车网'));

var_dump($a);

function insert($table, array $data)
{
	global $pdo;
	$fields_arr = array_keys($data);
	$fields_count = count($fields_arr);
	for($i=0; $i<$fields_count; $i++)
	{
		$temp_arr[$i] = '?';
	}
	$fields = implode(',', array_keys($data));
	$temp = implode(',', $temp_arr);
	$sql = "INSERT INTOs {$table} ({$fields}) VALUES ({$temp})";
	//echo $sql;
	try{

	$sth = $pdo->prepare($sql);
	$result = $sth->execute(array_values($data));
	}
	catch(PDOException $e)
	{
		exit($e->getMessage());
	}
	var_dump($sth->errorInfo());
	return $result;
}