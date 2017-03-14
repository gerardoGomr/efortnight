<?php

namespace App\Domain\Fortnight;

/**
 * Class Entry
 *
 * @author Gerardo Gómez <gerardo.gomr@gmail.com>
 */
class Entry implements FortnightMovement
{
	/**
	 * @var string
	 */
	private $name;

	/**
	 * Entry amount
	 * 
	 * @var double
	 */
	private $amount;

	/**
	 * Entry Constructor
	 *
	 * @param string $name
	 * @param double $amount
	 */
	public function __construct($name, $amount)
	{
		$this->name   = $name;
		$this->amount = $amount;
	}

	/**
	 * returns the name of the movement
	 * 
	 * @return string
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * returns Entry amount
	 * 
	 * @return boolean
	 */
	public function getAmount()
	{
		return $this->amount;
	}
}
