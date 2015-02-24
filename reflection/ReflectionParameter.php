<?php


class Alibaba 
{
	public function is_equal($a, $b)
	{
		return $a === $b;
	}

	public function __call($name, $parameters)
	{
		if (strpos('is_not_', $name)) {
			$name = str_replace('is_not_', 'is_', $name);
			return !call_user_func_array(array($this, $name), $parameters);
		}
	}
}

$method =  new ReflectionMethod('Alibaba', 'is_equal');
var_dump($method->getNumberOfParameters());