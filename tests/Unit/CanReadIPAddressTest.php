<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Domain\Fortnight\Machine;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CanReadIPAddressTest extends TestCase
{
    /**
     * test a machine can give its ip address
     *
     * @return void
     */
    public function testCanReadIPAddress()
    {
        $machine = new Machine();
        $IPAddress = '127.0.0.1';

        $this->assertEquals($IPAddress, $machine->getIpAddress());
    }
}