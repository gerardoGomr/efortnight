<?php

namespace App\Domain\Fortnight;

/**
 * Class Spending
 *
 * @author Gerardo Gómez <gerardo.gomr@gmail.com>
 */
class Spending implements FortnightMovement
{
	/**
	 * @var string
	 */
	private $name;

	/**
	 * spending amount
	 * 
	 * @var double
	 */
	private $amount;

	/**
	 * Spending Constructor
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
	 * returns spending amount
	 * 
	 * @return boolean
	 */
	public function getAmount()
	{
		return $this->amount;
	}
}
