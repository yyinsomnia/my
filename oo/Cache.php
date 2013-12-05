<?php

abstract class Cache
{
	public abstract function set($key, $value, $expire = 60);

	public abstract function get($key);

	public abstract function del($key);

	public abstract function delAll();

	public abstract function has($key);

}