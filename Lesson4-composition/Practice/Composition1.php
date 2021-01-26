<?php
/**
 *  Finish the the Car example shown in this lesson.
 *
 *  The car has:
 *   1 Engine.
 *   4 wheels.
 *   4 doors.
 *   1 Console command that has a radio and a GPS
 *
 *   When the car rides, a the engine starts working and returns a speed.
 *   Speed is needed for the wheels to spin.
 *   If the speed is 0, the wheels will stop spinning.
 */
/*
class Car {

    private Engine $engine;
    private array $wheels;
    private array $doors;
    private int $speed;
    private ConsoleCommand $consoleCommand;
    private bool $isRiding;

    public function __construct(Engine $engine, int $amountOfWheels, int $amountOfDoors) {
        $this->engine = $engine;
        for($i = 0; $i < $amountOfWheels; $i++) {
            $this->wheels[] = new Wheel();
        }
        for($i = 0; $i < $amountOfDoors; $i++) {
            $this->doors[] = new Door();
        }
        $this->consoleCommand = new ConsoleCommand();
        $this->isRiding = false;
    }

    public function ride() {
        if($this->engine->getIsOn()) {
            foreach($this->wheels as $wheel) {
                $wheel->startSpinning();
            }
            echo "Car starts riding";
            $this->setSpeed(0);
            $this->isRiding = true;
            $this->accelerate();
        } else {
            echo "You need to start the engine first\n";
        }
    }

    public function endRide() {
        if($this->isRiding) {
            foreach($this->wheels as $wheel) {
                $wheel->stopSpinning();
            }
        } else {
            echo "Car is not riding\n";
        }
    }

    public function start() {
        if(!$this->engine->getIsOn()) {
            $this->engine->start();
        } else {
            echo "Engine is already on\n";
        }
    }

    public function stop() {
        if($this->engine->getIsOn()) {
            $this->engine->stop();
            $this->setSpeed(0);
        } else {
            echo "Engine is already off\n";
        }
    }

    public function startRadio() {

    }

    public function openDoors() {
        foreach ($this->doors as $door) {
            $door->open();
        }
    }

    public function closeDoors() {
        foreach ($this->doors as $door) {
            $door->close();
        }
    }

    public function accelerate() {
        if($this->isRiding) {
            $this->setSpeed($this->getSpeed() + 10);
            echo "Speed: " . $this->getSpeed() . "km/h\n";
        } else {
            echo "Car is not riding\n";
        }

    }

    public function brake() {
        if($this->speed > 0) {
            $this->speed -= 10;
            echo $this->speed. "km/h\n";
        } else {
            echo "Car is at minimum speed";
        }
    }

    public function lockCar() {
        foreach($this->doors as $door) {
            $door->lock();
        }
    }


    public function unlockCar() {
        foreach($this->doors as $door) {
            $door->unlock();
        }
    }

    private function setSpeed(int $speed) {
        $this->speed = $speed;
    }

    private function getSpeed() : int {
        return $this->speed;
    }
}

class Engine {

    private bool $isOn;
    private int $hp;
    private $manufacturer;
    private $serialNumber;
    private $fuelType;

    function __construct(int $hp, string $manufacturer, string $serialNumber, string $fuelType) {
        $this->hp = $hp;
        $this->manufacturer = $manufacturer;
        $this->serialNumber = $serialNumber;
        $this->fuelType = $fuelType;
        $this->isOn = false;
    }

    public function start() {
        $this->isOn = true;
        echo "Engine Started\n";
    }

    public function stop() {
        if($this->isOn) {
            $this->isOn = false;
        }
        echo "Engine Stopped\n";
    }

    public function getIsOn() : bool {
        return $this->isOn;
    }

}

class ConsoleCommend {

}

class Door {
    private bool $isOpen = false;
    private bool $isLocked = true;


    public function open() {
        if(!$this->isOpen) {
            $this->isOpen = true;
            echo "Door is opened\n";
        } else {
            echo "Door is already opened\n";
        }
    }

    public function close() {
        if($this->isOpen){
            $this->isOpen = false;
            echo "Door is closed\n";
        } else {
            echo "Door is already closed\n";
        }
    }

    public function lockDoor() {
        if($this->isOpen) {
            echo "Need to close the doors to lock them";
        } else {
            if(!$this->isLocked) {

                $this->isLocked = true;
                echo "Door is locked\n";
            } else {
                echo "Door is already locked\n";
            }
        }
    }

    public function unlockDoor() {
        if($this->is)
        if($this->isLocked) {
            $this->isLocked = false;
            echo "Door is unlocked\n";
        } else {
            echo "Door is already unlocked\n";
        }
    }
}

class Wheel {
    private bool $isSpinning;

    public function startSpinning() {
        echo "Wheel starts spinning\n";
    }

    public function stopSpinning() {
        echo "Wheel stops spinning\n";
    }
}

class ConsoleCommand {

}

$car = new Car(new Engine(180, 'General Motors', 'A0000', 'Diesel'), 4,4 );
$car->start();
$car->ride();
$car->accelerate();
$car->accelerate();
$car->brake();
$car->brake();
$car->stop();
$car->endRide();
$car->openDoors();
$car-
$car->closeDoors();

*/