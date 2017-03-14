<?php

namespace Tests\Unit;

use App\Domain\Users\User;
use App\Domain\Fortnight\Fortnight;
use App\Domain\Fortnight\Spending;
use App\Domain\Fortnight\Entry;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CanManipulateUserTest extends TestCase
{
	private $user;

	public function setUp()
	{
		$this->user = new User('Gerardo Gomez', -10000, '127.0.0.1');

		$fortnight = new Fortnight('1st March Fortnight', 6700);
		$fortnight->addSpending(new Spending('A concept', 100));
    	$fortnight->addSpending(new Spending('A concept', 200));
    	$fortnight->addEntry(new Entry('A concept', 100));
    	$fortnight->addEntry(new Entry('A concept', 200));
    	$this->user->addFortnight($fortnight);

    	$fortnight = new Fortnight('2nd March Fortnight', 6700);
		$fortnight->addSpending(new Spending('A concept', 100));
    	$fortnight->addEntry(new Entry('A concept', 100));
    	$fortnight->addEntry(new Entry('A concept', 200));
    	$this->user->addFortnight($fortnight);
	}

    public function testCanAddAFortnightToUser()
    {
    	$this->assertCount(2, $this->user->getFortnights());
    }

    public function testCanObtainUserBalance()
    {
    	$expectedBalance = 3600;
    	$this->assertEquals($expectedBalance, $this->user->getBalance());
    }

    public function testCanGetUserReview()
    {
        $expectedResult = "Total Balance: 3600\nTotal Spendings: 400\nTotal Entries: 600";

        $this->assertEquals($expectedResult, $this->user->review());
    }

    public function testCanCheckIfUserHasFortnights()
    {
        $this->assertTrue($this->user->hasFortnights());
    }
}