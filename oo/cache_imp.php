<?php

interface cache
{
	const maxKey = 10000;
	public function getc($key);
	public function setc($key, $value);
	public function flush();
}


