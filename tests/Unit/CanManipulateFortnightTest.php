<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Domain\Fortnight\Fortnight;
use App\Domain\Fortnight\Spending;
use App\Domain\Fortnight\Entry;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CanManipulateFortnight extends TestCase
{
	private $fortnight;

	public function setUp()
	{
		$this->fortnight = new Fortnight('1st March Fortnight', 6700);
	}

	public function testCanRetrieveSpendings()
	{
		$spendings = $this->fortnight->getSpendings();
		$this->assertNotNull($spendings);
	}

	public function testCanRetrieveEntries()
	{
		$entries = $this->fortnight->getEntries();
		$this->assertNotNull($entries);
	}

    public function testCanAddSpending()
    {
    	$spending = new Spending('A concept', 1000);
    	$this->fortnight->addSpending($spending);

    	$this->assertCount(1, $this->fortnight->getSpendings());
    }

    public function testCanAddEntry()
    {
    	$entry = new Entry('A concept', 1000);
    	$this->fortnight->addEntry($entry);

    	$this->assertCount(1, $this->fortnight->getEntries());
    }

    public function testCanRemoveSpending()
    {
    	$this->fortnight->addSpending(new Spending('A concept', 100));
    	$this->fortnight->addSpending(new Spending('A concept', 200));

    	$this->fortnight->removeSpending(1);

    	$this->assertCount(1, $this->fortnight->getSpendings());
    }

    public function testCanRemoveEntries()
    {
    	$this->fortnight->addEntry(new Entry('A concept', 100));
    	$this->fortnight->addEntry(new Entry('A concept', 200));

    	$this->fortnight->removeEntry(1);

    	$this->assertCount(1, $this->fortnight->getEntries());
    }

    public function testCanObtainTotalAmountOfSpendings()
    {
    	$this->fortnight->addSpending(new Spending('A concept', 200));
    	$this->fortnight->addSpending(new Spending('A concept', 200));

    	$expectedTotal = 400;

    	$this->assertEquals($expectedTotal, $this->fortnight->getTotalAmountOfSpendings());
    }

    public function testCanObtainTotalAmountOfEntries()
    {
    	$this->fortnight->addEntry(new Entry('A concept', 100));
    	$this->fortnight->addEntry(new Entry('A concept', 200));

    	$expectedTotal = 300;

    	$this->assertEquals($expectedTotal, $this->fortnight->getTotalAmountOfEntries());
    }

    public function testCanObtainBalance()
    {
    	$this->fortnight->addSpending(new Spending('A concept', 200));
    	$this->fortnight->addSpending(new Spending('A concept', 200));

    	$this->fortnight->addEntry(new Entry('A concept', 100));
    	$this->fortnight->addEntry(new Entry('A concept', 200));

    	$expectedBalance = 6600;

    	$this->assertEquals($expectedBalance, $this->fortnight->getBalance());
    }

    public function testCanOpenFortnight()
    {
    	$date = new \DateTime();
    	$this->fortnight->open($date);

    	$this->assertTrue($this->fortnight->hasBeenOpened());
    }

    public function testCanCloseFortnight()
    {
    	$date = new \DateTime();
    	$this->fortnight->close($date);

    	$this->assertTrue($this->fortnight->hasBeenClosed());
    }
}
