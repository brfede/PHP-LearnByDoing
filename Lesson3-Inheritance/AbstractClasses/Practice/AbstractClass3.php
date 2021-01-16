<?php
/**
 *  Design a model that will allow to know the area and perimeter of a circle, a triangle and a square.
 *  Complete the classes below and add the necessary code for the example to work.
 */

abstract class Figure {

    public abstract function getArea();
    public abstract function getPerimeter();
}

class Triangle extends Figure {
    private array $sides;

    public function __construct(int $height, int $base, int $hypotenuse) {
        $this->sides = [$height, $base, $hypotenuse];
    }

    public function getArea() : int {
        return ($this->sides[0] * $this->sides[1]) / 2;
    }

    public function getPerimeter() : int {
        return $this->side1 + $this->side2 + $this->side3;
    }
}

class Square extends Figure {
    private int $side;

    public function __construct(int $side) {
        $this->side = $side;
    }

    public function getArea(): int {
        return pow($this->side, 2);
    }

    public function getPerimeter(): int {
        return $this->side * 4;
    }
}

class Circle extends Figure {
    private int $radius;

    public function __construct(int $radius) {
        $this->radius = $radius;
    }

    public function getArea(): float {
        return M_PI * pow($this->radius, 2);
    }

    public function getPerimeter(): float {
        return 2 * M_PI * $this->radius;
    }
}

$triangle = new Triangle(2, 3, 5);
$square = new Square(2);
$circle = new Circle(4);

echo $triangle->getArea() . "\n";
echo $triangle->getPerimeter() . "\n";

echo $square->getArea() . "\n";
echo $square->getPerimeter() . "\n";

echo $circle->getArea() . "\n";
echo $circle->getPerimeter() . "\n";

