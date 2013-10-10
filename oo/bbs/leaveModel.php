<?php

class leaveModel
{
	public function write(gbookModel $gb, $data)
	{
		$book = $gb->getBookPath();
		$gb->write($data);
	}

	public function view(gbookModel $g)
	{
		return $g->read();
	}

	public function delete(gbookModel $g)
	{
		$g->delete();
		echo self::view($g);
	}
}