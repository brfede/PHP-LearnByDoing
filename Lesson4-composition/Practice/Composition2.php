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

    public function logAction(string $action) {
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
    protected array $doorsPossibleLocations = ['lf', 'rf', 'rb', 'lb'];


    public abstract function start();
    public final function ride(){
        if(!$this->engine->getIsOn()) {
            $this->start();
        }
        foreach($this->wheels as $wheel) {
            $wheel->startSpinning();
        }
        $this->logger->logAction("Car starts riding");
        $this->setSpeed(0);
        $this->isRiding = true;
        $this->accelerate();
    }
    public abstract function endRide();
    public abstract function stop();
    public abstract function startRadio();
    public abstract function openAllDoors();
    public abstract function closeAllDoors();
    public abstract function accelerate();
    public abstract function brake();
    public abstract function lockCar();
    public abstract function unlockCar();
    protected abstract function setSpeed(int $speed);
    public abstract function getSpeed();

}

class Car extends Vehicle {

    public function __construct(Engine $engine, int $amountOfWheels, int $amountOfDoors) {
        $this->logger = new CliLogger();
        $this->engine = $engine;
        for($i = 0; $i < $amountOfWheels; $i++) {
            $this->wheels[] = new Wheel();
        }
        for($i = 0; $i < $amountOfDoors; $i++) {
            $door = new Door();
            $door->setDoorLocation($this->doorsPossibleLocations[$i]);
            $this->doors[] = $door;
        }
        $this->consoleCommand = new ConsoleCommand();
        $this->isRiding = false;
    }

    public function endRide() {
        if($this->isRiding) {
            foreach($this->wheels as $wheel) {
                $wheel->stopSpinning();
            }
        } else {
            $this->logger->logAction("Car is not riding");
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

    public function openAllDoors() {
        foreach ($this->doors as $door) {
            $door->open();
        }
    }

    public function closeAllDoors() {
        foreach ($this->doors as $door) {
            $door->close();
        }
    }

    public function openDoor($location, ...$otherLocations) {
        $amountOfLocationsProvided = 1 + count($otherLocations);
        if($amountOfLocationsProvided > count($this->doors)) {

            return;
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

    protected function setSpeed(int $speed) {
        $this->speed = $speed;
    }

    public function getSpeed() : int {
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

    public abstract function start();

    public abstract function stop();

    public function getIsOn() : bool {
        return $this->isOn;
    }
}

class DieselEngine extends Engine {

    public function start() {
        $this->isOn = true;
        $this->logger->logAction("Engine Started");
    }

    public function stop() {
        if($this->isOn) {
            $this->isOn = false;
        }
        $this->logger->logAction("Engine Stopped");
    }
}

class ElectronicEngine extends Engine {

    public function start() {
        $this->isOn = true;
        $this->logger->logAction("Engine Started");
    }

    public function stop() {
        if($this->isOn) {
            $this->isOn = false;
        }
        $this->logger->logAction("Engine Stopped");
    }

    public function getIsOn() : bool {
        return $this->isOn;
    }
}

class Door {
    private bool $isOpen = false;
    private bool $isLocked = true;
    private string $doorLocation;
    private CliLogger $logger;

    function __construct() {
        $this->logger = new CliLogger();
    }

    public function open() {
        if(!$this->isOpen) {
            $this->isOpen = true;
            $this->logger->logAction("Door is opened");
        } else {
            $this->logger->logAction("Door is already opened");
        }
    }

    public function close() {
        if($this->isOpen){
            $this->isOpen = false;
            $this->logger->logAction("Door is closed");
        } else {
            $this->logger->logAction("Door is already closed");
        }
    }

    public function lockDoor() {
        if($this->isOpen) {
            $this->logger->logAction("Need to close the doors to lock them");
        } else {
            if(!$this->isLocked) {

                $this->isLocked = true;
                $this->logger->logAction("Door is locked");
            } else {
                $this->logger->logAction("Door is already locked");
            }
        }
    }

    public function setDoorLocation(string $location){
        $this->doorLocation = $location;
    }

    public function unlockDoor() {
        if($this->isOpen) {
            $this->logger->logAction("Door is unlocked");
        } else {

            if($this->isLocked) {
                $this->isLocked = false;
                $this->logger->logAction("Door is unlocked");
            } else {
                $this->logger->logAction("Door is already unlocked");
            }
        }

    }
}

class Wheel {
    private bool $isSpinning;
    private CliLogger $logger;

    function __construct() {
        $this->logger = new CliLogger();
    }

    public function startSpinning() {
        echo "Wheel starts spinning\n";
    }

    public function stopSpinning() {
        echo "Wheel stops spinning\n";
    }
}

// TODO: make a wheelCollection
//TODO: make a doorCollection

class ConsoleCommand {

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