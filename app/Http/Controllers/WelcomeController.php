<?php
namespace App\Http\Controllers;

use App\Domain\Fortnight\Machine;
use App\Domain\Users\User;
use App\Infrastructure\Users\DBUsersRepository;
use Illuminate\Http\Request;
use App\Http\Requests\SignUpRequest;

/**
 * Class WelcomeController
 *
 * @author Gerardo Adrián Gómez Ruiz <gerardo.gomr@gmail.com>
 */
class WelcomeController extends Controller
{
	/**
	 * verify that:
	 * 1.- User exists by his/her IP Address
	 * 2.- If doesn't, redirect to sign up page
	 * 3.- If does, redirect to main page
	 * 
	 * @return Illuminate\Support\Facades\View
	 */
    public function index()
    {
    	$user = (new DBUsersRepository())->findByIpAddress((new Machine())->getIpAddress());

    	if (!is_null($user)) {
    		return view('welcome', compact('user'));
    	}

    	return view('signup');
    }

    /**
     * register a new user to the app
     * 
     * @param  SignUpRequest $request
     * @return 
     */
    public function signUp(Request $request)
    {
    	$user = new User($request->get('name'), (float)$request->get('initialAmount'), (new Machine())->getIpAddress());
    	$userRepository = new DBUsersRepository();

    	if (!$userRepository->persist($user)) {
    		return back()->withInput();
    	}

    	return redirect('/');
    }
}
