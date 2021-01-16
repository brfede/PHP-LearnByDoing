<?php

class Greeter {

    private string $name;
    private string $context;
    private static array $validContexts = ['work', 'friends', 'newPerson'];

    public function __construct(string $name, $context) {
        $this->name = $name;
        $this->setContext($context);
    }

    public function setContext(string $context) {
        if(in_array($context, static::$validContexts)) {
            $this->context = $context;
        } else {
            echo $context . ' is not a valid context, let\'s say you\'re friends'."\n\n";
            $this->context = static::$validContexts[2];
        }
    }

    private function giveInformalGreetings() : string {
        return "Hi!, my name is " . $this->name;
    }

    private function giveFormalGreetings() : string {
        return "Hello, my name is " . $this->name;
    }

    private function givePresentationGreetings() : string {
        return "Nice to meet you, my name is " . $this->name . ", what's your name?";
    }

    public function sayHello() : string {
        switch ($this->context) {
            case 'work':
                return $this->giveFormalGreetings();
            case 'friends':
                return $this->giveInformalGreetings();
            case 'newPerson':
                return $this->givePresentationGreetings();
        }
    }
}

$greeter = new Greeter("Mariano", "work");
echo $greeter->sayHello();
echo "\n";
$greeter->setContext("friends");
echo $greeter->sayHello();
echo "\n \n";;
$greeter->setContext("newPerson");
echo $greeter->sayHello();
echo "\n \n";
$greeter->setContext("newPerson");
echo $greeter->sayHello();
echo "\n \n";
$greeter->setContext("sarasa");
echo $greeter->sayHello();
echo "\n \n";

/*
 *
 * When changing the context from work to friends, what happened ?
 *
 * Your answer: The private attribute is set to friends, when the sayHello method is called this attribute is analyzed
 * and depending its value it will call the corresponding method which would be giveInformalGreetings
 *
 * When changing the context from work to friends, Did we change the behaviour of the class ?
 *
 * Your answer:
 * No, it's the same behaviour but it's adapted to have a different response according to the context provided.
 *
 * By following this design, add a new context. Commit the changes in the fork of your project
 *
 */