<?php

namespace App\Domain\Fortnight;

use DateTime;

/**
 * Class Fortnight
 *
 * @author Gerardo Gómez <gerardo.gomr@gmail.com>
 */
class Fortnight
{
	/**
	 * @var string
	 */
	private $name;

	/**
	 * @var double
	 */
	private $initialAmount;

	/**
	 * @var DateTime
	 */
	private $openingDate;

	/**
	 * @var DateTime
	 */
	private $closingDate;

	/**
	 * @var array
	 */
	private $spendings = [];

	/**
	 * @var array
	 */
	private $entries = [];

	/**
	 * Fortnight Constructor
	 * 
	 * @param string $name
	 * @param double $initialAmount
	 */
	public function __construct($name, $initialAmount)
	{
		$this->name 	     = $name;
		$this->initialAmount = $initialAmount;
	}

	public function open(DateTime $openingDate)
	{
		$this->openingDate = $openingDate;
	}

	/**
	 * @return DateTime
	 */
	public function getOpeningDate()
	{
		return $this->openingDate;
	}

	/**
	 * checks if the current fortnight has been opened
	 * @return boolean
	 */
	public function hasBeenOpened()
	{
		return !is_null($this->openingDate);
	}

	/**
	 * closes the fortnight
	 * @param  DateTime $closingDate
	 */
	public function close(DateTime $closingDate)
	{
		$this->closingDate = $closingDate;
	}

	/**
	 * checks if the current fortnight has been closed
	 * @return boolean
	 */
	public function hasBeenClosed()
	{
		return !is_null($this->closingDate);
	}

	/**
	 * add a new Spending
	 * 
	 * @param FortnightMovement $spending
	 */
	public function addSpending(FortnightMovement $spending)
	{
		$this->spendings[] = $spending;
	}

	/**
	 * add a new Entry
	 * 
	 * @param FortnightMovement $entry
	 */
	public function addEntry(FortnightMovement $entry)
	{
		$this->entries[] = $entry;
	}

	/**
	 * obtain all spendings
	 * 
	 * @return array
	 */
	public function getSpendings()
	{
		return $this->spendings;
	}

	/**
	 * obtain all entries
	 * 
	 * @return array
	 */
	public function getEntries()
	{
		return $this->entries;
	}

	/**
	 * remove an spending via index
	 * 
	 * @param  int $id
	 * @return void
	 */
	public function removeSpending($id)
	{
		foreach ($this->spendings as $index => $spending) {
			if ($index === $id) {
				unset($this->spendings[$index]);
			}
		}
	}

	/**
	 * remove an entry via index
	 * 
	 * @param  int $id
	 * @return void
	 */
	public function removeEntry($id)
	{
		foreach ($this->entries as $index => $entry) {
			if ($index === $id) {
				unset($this->entries[$index]);
			}
		}
	}

	/**
	 * obtain total amount of spendings
	 * 
	 * @return double
	 */
	public function getTotalAmountOfSpendings()
	{
		$spendingsBalance = 0;

		foreach ($this->spendings as $spending) {
			$spendingsBalance += $spending->getAmount();
		}

		return $spendingsBalance;
	}

	/**
	 * obtain total amount of spendings
	 * 
	 * @return double
	 */
	public function getTotalAmountOfEntries()
	{
		$entriesBalance   = 0;

		foreach ($this->entries as $entry) {
			$entriesBalance += $entry->getAmount();
		}

		return $entriesBalance;
	}

	/**
	 * obtain the balance by substracting initial amount 
	 * and total of entries and then add total of spendings
	 * 
	 * @return double
	 */
	public function getBalance()
	{
		return ($this->initialAmount - $this->getTotalAmountOfSpendings()) + $this->getTotalAmountOfEntries();
	}
}
