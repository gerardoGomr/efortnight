<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Domain\Fortnight\Entry;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EntryCanGiveAmountTest extends TestCase
{
    /**
	 * test if a entry can be created
	 *
	 * @return void
	 */
	public function testCanCreateEntry()
	{
		$entry = new Entry('A concept', 500);
	}

    /**
     * test if a entry can give its amount
     *
     * @return void
     */
    public function testEntryCanGiveAmount()
    {
    	$entry = new Entry('A concept', 500);
    	$amount = 500;
        $this->assertEquals($amount, $entry->getAmount());
    }
}
