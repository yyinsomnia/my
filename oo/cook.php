<?php

class cook
{
	public function meal()
	{
		echo '番茄炒鸡蛋',PHP_EOL;
	}

	public function drink()
	{
		echo '紫菜蛋花汤',PHP_EOL;
	}

	public function ok()
	{
		echo '完毕',PHP_EOL;
	}

}

interface Command
{
	public function execute();
}

class MealCommand implements Command
{
	private $cook;

	public function __construct(cook $cook)
	{
		$this->cook = $cook;
	}

	public function execute()
	{
		$this->cook->meal();
	}

}

class DrinkCommand implements Command
{
	private $cook;

	public function __construct(cook $cook)
	{
		$this->cook = $cook;
	}

	public function execute()
	{
		$this->cook->drink();
	}

}


class cookControl
{
	private $mealcommand;
	private $drinkcommand;

	public function addCommand(Command $mealcommand, Command $drinkcommand)
	{
		$this->mealcommand = $mealcommand;
		$this->drinkcommand = $drinkcommand;
	}

	public function callmeal()
	{
		$this->mealcommand->execute();
	}

	public function calldrink()
	{
		$this->drinkcommand->execute();
	}
}

$control = new cookControl;
$cook = new cook;
$mealcommand = new MealCommand($cook);
$drinkcommand = new DrinkCommand($cook);
$control->addCommand($mealcommand, $drinkcommand);
$control->callmeal();
$control->calldrink();

//TODO: 如何处理cook::ok()?