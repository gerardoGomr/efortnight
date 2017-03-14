<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Domain\Users\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CanCreateAnUser extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testCanCreateAnUser()
    {
        $user = new User('Gerardo Gomez', 100, '127.0.0.1');
    }
}
