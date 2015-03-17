<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
	{
		return View::make('hello');
	}


	//get request, data open in plain text
	//client sends get request to the server
	//accessing view from views/main/index (specify by main.index)
	public function getMain()
	{
		//cat is the key/index, User::getCat is the value
		return View::make('main.index', array('cat'=>Cat::getCat(), 'ID' => Auth::id()));
	}

	//When attempt made to log in, check their credentials
	public function onSubmit()
	{
		$email = Input::get('email');

		$password = Input::get('password');

		if (Auth::attempt(array('email' => $email, 'password' => $password)))
		{
    		return Redirect::to('/')
    			->with('global', 'Congratulations you have successfully logged in!');
		}	
		else 
		{
			return Redirect::to('/')
				->with('global', 'Sorry that e-mail/password combination is incorrect!');
		}

	}

	public function onLogout()
	{
		Auth::logout();
		return Redirect::to('/')
			->with('global', 'You have been successfully logged out!');
	}

}



