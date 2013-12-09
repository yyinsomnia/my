<?

class Car
{
	private $_lunzi;

	public function getLun()
	{
		return $this->_lunzi;
	}

	public function setLun($v)
	{
		$this->_lunzi = $v;
	}
}

class Bus extends Car
{
	public $_lunzi;

	public function getLun()
	{
		return parent::getLun();
		//return $this->_lunzi;
	}
}

class Taxi extends Car
{
	public $_lunzi;
}

$b = new Bus;
$t = new Taxi;
$b->setLun('laodie lunzi');
$t->setLun('fuqin lunzi');
$b->_lunzi = 'Bus lunzi';
$t->_lunzi = 'Taxi lunzi';
echo $b->getLun();
var_dump($b);
var_dump($t);
/*
laodie lunziobject(Bus)#1 (2) { ["_lunzi"]=> string(9) "Bus lunzi" ["_lunzi":"Car":private]=> string(12) "laodie lunzi" } object(Taxi)#2 (2) { ["_lunzi"]=> string(10) "Taxi lunzi" ["_lunzi":"Car":private]=> string(11) "fuqin lunzi" } 
*/
