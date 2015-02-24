<?php

class foo
{
	public $a;

	public function bomb()
	{
		return $this;
	}
}

$a = (new foo())->bomb();
var_dump($a);