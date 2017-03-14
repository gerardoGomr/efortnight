<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Domain\Users\User;
use App\Domain\Fortnight\Fortnight;
use App\Domain\Fortnight\Spending;
use App\Domain\Fortnight\Entry;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CanObtainBalanceWhenThereAreNoFortnightsTest extends TestCase
{
	private $user;

    public function setUp()
    {
    	$this->user = new User('Gerardo Gomez', -10000, '127.0.0.1');
    }

    public function testCanObtainUserBalance()
    {
    	$expectedBalance = -10000;
    	$this->assertEquals($expectedBalance, $this->user->getBalance());
    }
}
