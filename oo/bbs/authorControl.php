<?php

class authorControl
{
	public function message(leaveModel $l, gbookModel $g, message $data)
	{
		$l->write($g, $data);
	}