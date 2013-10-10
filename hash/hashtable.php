<?php

class HashTable
{
	private $buckets;
	private $size = 10;
	
	public function __construct()
	{
		$this->buckets = new SplFixedArray($this->size);
	}

	private function hashfunc($key)
	{
		$strlen = strlen($key);
		$val = 0;
		for($i=0; $i<$strlen; $i++)
		{
			$val += ord($key{$i});
		}
		return $val % $this->size;
	}

	public function insert($key,$val)
	{
		$index = $this->hashfunc($key);
		if(isset($this->buckets[$index]))
			$hashnode = new HashNode($key,$val,$this->buckets[$index]);
		else
			$hashnode = new HashNode($key,$val,null);
		$this->buckets[$index] = $hashnode;
	}

	public function find($key)
	{
		$index = $this->hashfunc($key);
		$current = $this->buckets[$index];
		while($current)
		{
			if($current->key === $key)
				return $current->val;
			$current = $current->nextnode;
		}
		return null;
	}
}

class HashNode
{
	public $key;
	public $val;
	public $nextnode;
	public function __construct($key,$val,$nextnode)
	{
		$this->key = $key;
		$this->val = $val;
		$this->nextnode = $nextnode;
	}
}
$ht = new HashTable();
$ht->insert('key1','value1');
$ht->insert('key12','value2');
var_dump($ht->find('key1'));
var_dump($ht->find('key12'));