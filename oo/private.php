<?php

class A
{
	private $id = 1;

	public function __construct()
	{

	}

	public function getId()
	{
		var_dump($this);die;
		return $this->id;
	}
}

class B extends A
{
	private $id = 2;
}

$b = new B;
var_dump($b->getId());