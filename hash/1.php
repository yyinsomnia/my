<?php

function h($key,$m)
{
	return $key%$m;
}

echo h(125,5);
