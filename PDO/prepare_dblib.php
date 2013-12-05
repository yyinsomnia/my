<?php
//exit();
$pdo = new PDO('dblib:host=211.151.78.198;dbname=db_firstauto;charset=UTF-8','iautosuser','59qLvCjOgvFM');

$trimid = array(13350,132321,101467,101468,132319,132317,101469,101470,101471,101471,101472);

/*prepare*/

$starttime = microtime(TRUE);
$sql = "select a.fld_itemid, a.fld_name, a.fld_classid, a.fld_configid, isnull(c.fld_value,0) as fld_value from tab_sconfigitems as a inner join (select distinct b.fld_configid from tab_sconfig as a inner join tab_sconfigitems as b on a.fld_itemid=b.fld_itemid where a.fld_trimid= :trimid1) as b on a.fld_configid=b.fld_configid left join (select fld_itemid, 1 as fld_value from tab_sconfig where fld_trimid= :trimid2) as c on a.fld_itemid=c.fld_itemid where a.fld_ClassID=0 or c.fld_value=1 order by b.fld_configid, a.fld_index";
$sth = $pdo->prepare($sql);
for($i=0;$i<10;$i++)
{
	$sth->execute(array(':trimid1'=>$trimid[$i],':trimid2'=>$trimid[$i]));//You cannot use a named parameter marker of the same name twice in a prepared statement
	$r = $sth->fetchAll();
	//print_r($r);
}
$endtime = microtime(TRUE);

echo $endtime-$starttime;
echo '<br />';
/*no prepare*/
$starttime = microtime(TRUE);
for($i=0;$i<10;$i++)
{
	$sql = "select a.fld_itemid, a.fld_name, a.fld_classid, a.fld_configid, isnull(c.fld_value,0) as fld_value from tab_sconfigitems as a inner join (select distinct b.fld_configid from tab_sconfig as a inner join tab_sconfigitems as b on a.fld_itemid=b.fld_itemid where a.fld_trimid={$trimid[$i]}) as b on a.fld_configid=b.fld_configid left join (select fld_itemid, 1 as fld_value from tab_sconfig where fld_trimid={$trimid[$i]}) as c on a.fld_itemid=c.fld_itemid where a.fld_ClassID=0 or c.fld_value=1 order by b.fld_configid, a.fld_index";
	$r = $pdo->query($sql)->fetchAll();
	//print_r($r);
}
$endtime = microtime(TRUE);

echo $endtime-$starttime;
