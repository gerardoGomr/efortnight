<?php
namespace App\Domain\Users;

use App\Domain\Fortnight\Fortnight;

class User
{
    /**
     * @var int
     */
    private $id;

	/**
	 * @var string
	 */
	private $name;

	/**
	 * @var double
	 */
	private $money;

    /**
     * @var string
     */
    private $ipAddress;

	/**
	 * @var array
	 */
	private $fortnights = [];

	/**
	 * User Constructor
	 * 
	 * @param string $name
	 * @param double $initialAmount
     * @param string $ipAddress 
	 */
    public function __construct($name, $initialAmount, $ipAddress)
    {
        $this->name      = $name;
        $this->money     = $initialAmount;
        $this->ipAddress = $ipAddress;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return double
     */
    public function getMoney()
    {
        return $this->money;
    }

    /**
     * return fortnights
     * 
     * @return array
     */
    public function getFortnights()
    {
    	return $this->fortnights;
    }

    /**
     * @return string
     */
    public function getIpAddress()
    {
        return $this->ipAddress;
    }

    /**
     * add new fortnight
     * 
     * @param Fortnight $fortnight
     */
    public function addFortnight(Fortnight $fortnight)
    {
    	$this->fortnights[] = $fortnight;
    }

    /**
     * return user balance
     * 
     * @return double
     */
    public function getBalance()
    {
    	$fortnightsBalance = 0;
    	foreach ($this->fortnights as $fortnight) {
    		$fortnightsBalance += $fortnight->getBalance();
    	}

    	$this->money = $this->money + ($fortnightsBalance);

    	return $this->money;
    }

    /**
     * total amount of all spendings
     * 
     * @return double
     */
    public function totalAmountOfSpendings()
    {
    	$spendingsAmount = 0;
    	foreach ($this->fortnights as $fortnight) {
    		$spendingsAmount += $fortnight->getTotalAmountOfSpendings();
    	}

    	return $spendingsAmount;
    }

    /**
     * total amount of entries
     * 
     * @return double
     */
    public function totalAmountOfEntries()
    {
    	$entriesAmount = 0;
    	foreach ($this->fortnights as $fortnight) {
    		$entriesAmount += $fortnight->getTotalAmountOfEntries();
    	}

    	return $entriesAmount;
    }

    /**
     * review of user's money
     * 
     * @return string
     */
    public function review()
    {
    	return "Total Balance: " . $this->getBalance() . "\nTotal Spendings: " . $this->totalAmountOfSpendings() . "\nTotal Entries: " . $this->totalAmountOfEntries();
    }

    /**
     * verify that user has at least one fortnight
     * @return boolean
     */
    public function hasFortnights()
    {
        return count($this->fortnights) > 0;
    }
}