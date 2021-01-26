<?php
/**
 *  You need to save some money in order to buy a brand new car.
 *  You talk with your bank and they offer 3 products for you to accomplish your goal.
 *
 *   A) A safe box.
 *   B) A saving account.
 *   C) An investment account.
 *
 *   Other types of of products exist in the bank, and all of them (including the ones that they offered you) cost
 *   $100 a year.
 *
 *   As you are already a client they offer the saving account for free, but it reduces 1% of initial deposit per year.
 *   If you choose the investment account, it will generate a +15% of interest in a year.
 *
 *   All the products have:4
 *      1) a identification number (unique)
 *      2) The name of client
 *      3) The money that was deposited.
 *      4) The capability to calculate how much money you will have after expenses.
 *
 *   You need to come up with a model of the different classes involved and the UML Class Diagram
 *   (Commit it in the diagrams folder)
 *
 * saving account
 */

class Bank
{
    private array $clients = [];
    private array $products = [];
    private string $name;

    public function __construct($name)
    {
        $this->name = $name;
    }
}

class Client
{
    private string $name;
    private static int $id = 0;

}

abstract class Product
{
    protected int $id;
    protected float $cost = 100;
    protected string $clientName;
    protected float $money;

    public function __construct(float $money, float $cost, string $clientName)
    {
        $this->clientName = $clientName;
        $this->money = $money;
        $this->cost = $cost;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function getCost(): float
    {
        return $this->cost;
    }

    public function setCost(float $cost)
    {
        $this->cost = $cost;
    }

    public function getClientName(): string
    {
        return $this->clientName;
    }

    public function setClientName(string $clientName)
    {
        $this->clientName = $clientName;
    }

    public function getMoney(): float
    {
        return $this->money;
    }

    public function setMoney()
    {
        $this->money;
    }

    public abstract function calculate();
}

class SafeBox extends Product
{

}

class SavingAccount extends product
{

    private float $negativeInterest = 0.01;
    public function calculate()
    {
        return $this->money - ($this->money * $this->negativeInterest);
    }
}

class InvestmentAccount extends Product
{

    public float $interest;

    public function __construct(float $money, float $cost, string $clientName, float $interest)
    {
        parent::__construct($money, $cost, $clientName);
        $this->interest = $interest;
    }

    public function getInterest(): float
    {
        return $this->interest;
    }

    public function setInterest(float $interest): void
    {
        $this->interest = $interest;
    }

    public function calculate()
    {
        return $this->money - $this->cost + ($this->money * $this->interest);

    }
}