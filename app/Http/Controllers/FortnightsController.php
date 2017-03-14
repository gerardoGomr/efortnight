<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * Class FortnightsController
 *
 * @author Gerardo Gómez <gerardo.gomr@gmail.com>
 */
class FortnightsController extends Controller
{
	/**
	 * create view for adding a new fortnight
	 *
	 * @return Illuminate\Support\Facades\View
	 */
    public function add()
    {
    	return view('fortnights.add');
    }
}
