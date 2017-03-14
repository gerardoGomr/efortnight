<?php
namespace App\Domain\Fortnight;

/**
 * Interface FortnightMovement
 * 
 * @author Gerardo Gómez <gerardo.gomr@gmail.com>
 */
interface FortnightMovement
{
	/**
	 * returns the amount of the movement
	 * 
	 * @return double
	 */
	public function getAmount();

	/**
	 * returns the name of the movement
	 * 
	 * @return string
	 */
	public function getName();
}