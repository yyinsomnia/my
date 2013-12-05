<?php

$conn = mysql_connect('localhost','root','');
$db = mysql_select_db('ask_iautos_cn');
$sql = 'select * from ask_question where cid=15654685';

for ($i = 0 ; $i < 10; $i++)
{
	mysql_query($sql);
}