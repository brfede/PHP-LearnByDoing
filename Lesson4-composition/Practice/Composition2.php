<?php

/**
 *  From our previous exercise, we now want to add trucks and motorcycles to our model.
 *  We understand that those are vehicles.
 *  We know that there are Diesel engines and Gas engines.
 *  We know that motorcycles have no doors.
 *  We know that motorcycles have 2 wheels.
 *  Motorcycles may have a GPS but no radio.
 *
 *  Combine Composition with abstract classes in order to solve this problem.
 *  Code your solution and also create the UML class diagram
 */

interface LoggerInterface {
    public function logAction(string $action);
}

class CliLogger implements LoggerInterface {

    public function logAction(string $action)
    {
        echo $action . "\n";
    }
}


abstract class Vehicle {

    protected Engine $engine;
    protected array $wheels;
    protected array $doors;
    protected int $speed;
    protected ConsoleCommand $consoleCommand;
    protected bool $isRiding;
    protected LoggerInterface $logger;


    public abstract function start();
    public abstract function ride();
    public abstract function endRide();

}

class Car extends Vehicle {

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
            $this->logger->logAction("Car starts riding");
            $this->setSpeed(0);
            $this->isRiding = true;
            $this->accelerate();
        } else {
            $this->logger->logAction("You need to start the engine first");
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
            $this->logger->logAction("Engine is already on");
        }
    }

    public function stop() {
        if($this->engine->getIsOn()) {
            $this->engine->stop();
            $this->setSpeed(0);
        } else {
            $this->logger->logAction("Engine is already off");
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
            $this->logger->logAction("Speed: " . $this->getSpeed() . "km/h");
        } else {
            $this->logger->logAction("Car is not riding");
        }

    }

    public function brake() {
        if($this->speed > 0) {
            $this->speed -= 10;
            $this->logger->logAction($this->getSpeed() . "km/h");
        } else {
            $this->logger->logAction("Car is at minimum speed");
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

abstract class Engine {
    protected CliLogger $logger;
    protected bool $isOn;
    protected int $hp;
    protected string $manufacturer;
    protected string $serialNumber;

    function __construct(int $hp, string $manufacturer, string $serialNumber) {
        $this->logger = new CliLogger();
        $this->hp = $hp;
        $this->manufacturer = $manufacturer;
        $this->serialNumber = $serialNumber;
        $this->isOn = false;
    }

    public function start() {
        $this->isOn = true;
        $this->logger->logAction("Car is at minimum speed");
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



class DieselEngine extends Engine {

}

class ElectronicEngine extends Engine {

}


$car = new Car(new DieselEngine(180, 'General Motors', 'A0000'), 4,4 );
$car->start();
$car->ride();
$car->accelerate();
$car->accelerate();
$car->brake();
$car->brake();
$car->stop();
$car->endRide();
$car->openDoors();