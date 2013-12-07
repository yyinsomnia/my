<?php

class Big
{
	private $foo;

	public function __consturct($foo)
	{
		$this->foo = $foo;
	}

	private function bar()
	{
		echo 'Accessed the private method';
	}

	public function baz(Big $other)
	{
		//We can change the private property;
		$other->foo = 'Hello';
		var_dump($other->foo);
		//We can also call the private method;
		$other->bar();
	}
}

$test = new Big('test');
$test->baz(new Big('other'));