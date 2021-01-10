<?php

class Greeter {

    private static $prefix = 'Hello, my name is ';
    private $name;

    public function __construct(string $name) {
        $this->name = $name;
    }

    public function sayHello() {
        return self::$prefix . $this->name;
    }
}
$mariano = new Greeter('Mariano');
echo $mariano->sayHello() . "\n \n";
$matu = new Greeter('Matu');
echo $matu->sayHello() . "\n \n";

/*
 * Homework
 *
 * What is the output of this class ?
 *
 * Your answer:
 * * Hello, my name is Mariano
 * * Hello, my name is Matu
 *
 * Did it suffer any changes from it latest versions?
 *
 * Your answer: Yes, the class has a constructor which receives a string for the field name. Also it has a class attribute
 * with the text to say hello and together with the name it is used in the method sayHello
 *
 *
 * Did the behaviour remain the same ?
 *
 * Your answer: Yes, it's the same
 *
 */