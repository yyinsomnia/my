<?php
class Foo
{
    public static $my_static = 'foo';

    public function staticValue() {
        return self::$my_static;
    }
}

class Bar extends Foo
{
	public static $my_static = 'aaa';
    public function fooStatic() {
        return parent::$my_static;
    }
	
	public function fooMy() {
		return self::$my_static;
	}
}


print Foo::$my_static . "\n";	//foo

$foo = new Foo();
print $foo->staticValue() . "\n";	//foo
print $foo->my_static . "\n";      // Undefined "Property" my_static 

print $foo::$my_static . "232\n";
$classname = 'Foo';
print $classname::$my_static . "\n"; // As of PHP 5.3.0

print Bar::$my_static . "\n";
$bar = new Bar();
print $bar->fooStatic() . "\n";
print $bar->fooMy() . "\n";
?>
