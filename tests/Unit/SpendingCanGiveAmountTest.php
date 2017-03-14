<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Domain\Fortnight\Spending;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SpendingCanGiveAmountTest extends TestCase
{
	/**
	 * test if a spending can be created
	 *
	 * @return void
	 */
	public function testCanCreateSpending()
	{
		$spending = new Spending('A concept', 500);
	}

    /**
     * test if a spending can give its amount
     *
     * @return void
     */
    public function testSpendingCanGiveAmount()
    {
    	$spending = new Spending('A concept', 500);
    	$amount   = 500;
        $this->assertEquals($amount, $spending->getAmount());
    }
}
