<?php
class Db_Exception extends Exception
{

}

interface Db_Adapter
{

	public function connect($config);
	
	public function query($query, $handle);
}

class Db_Adapter_Mysql implements Db_Adapter
{
	private $_dbLink;

	public function connect($config)
	{
		if ($this->_dbLink = @mysql_connect($config->host .
			(empty($config->port) ? '' : ':'.$config->port),
			$config->user, $config->password, true))
		{
			if (@mysql_select_db($config->database, $this->_dbLink))
			{
				if (isset($config->charset)) 
				{
					mysql_query("SET NAMES '{$config->charset}'", $this->_dbLink);
				}
				return $this->_dbLink;
			}
		}
		throw new Db_Exception(@mysql_error($this->_dbLink));
	}

	public function query($query, $handle = '')
	{
		if (empty($handle)) $handle = $this->_dbLink;
		if ($resource = @mysql_query($query, $handle))
		{
			return $resource;
		}
	}
}

class Db_Adapter_sqlite implements Db_Adapter
{
	private $_dbLink;

	public function connect($config)
	{
		if ($this->_dbLink = sqlite_open($config->file, 0666, $error))
		{
			return $this->_dbLink;
		}

		throw new Db_Exception($error);
	}

	public function query($query, $handle)
	{
		if ($resource = sqlite_query($query, $handle))
		{
			return $resource;
		}
	}

}


class sqlFactory
{
	public static function factory($type)
	{
		$classname = 'Db_Adapter_'.$type;
		if (class_exists($classname))
		{
			return new $classname;
		} else {
			throw new Db_Exception('Driver not found');
		}
	}
}

class Config
{
	public $host; 
	public $user;
	public $password; 
	public $database;

	public function __construct($host, $user, $password, $database, $charset='UTF8')
	{
		$this->host = $host;
		$this->user = $user;
		$this->password = $password;
		$this->database = $database;
		$this->charset = $charset;

	}
}

try
{
	$db = sqlFactory::factory('Mysql');
	$db->connect(new Config('localhost', 'root', '', 'jlr_iautos_cn'));
	$query = $db->query('select * from iautos_dealer');
	while( $r = mysql_fetch_array($query))
	{
		print_r($r);
	}
}catch (Exception $e){
	echo $e;
}