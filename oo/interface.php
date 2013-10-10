<?php

interface mobile 
{
	public function run();
}

class plain implements mobile
{
	public function run()
	{
		echo "我是灰机";
	}

	public function fly()
	{
		echo "飞行";
	}
}

class car implements mobile
{
	public function run()
	{
		echo "我是汽车";
	}

}

class machine
{
	public function demo(mobile $a)
	{
		$a->fly();
	}
}

$obj = new machine();
$obj->demo(new plain());
$obj->demo(new car());