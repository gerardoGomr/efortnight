<?php

namespace App\Domain\Fortnight;

class Machine
{
    //
    public function getIpAddress()
    {
    	return request()->ip();
    }
}
