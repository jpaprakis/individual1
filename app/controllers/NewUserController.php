<?php

class NewUserController extends BaseController {

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

	//get request, data open in plain text
	//client sends get request to the server
	//accessing view from views/main/index (specify by main.index)
	public function getMain()
	{

		//cat is the key/index, User::getCat is the value
		return View::make('main.create_user');
	}

	public function onSubmit()
	{

		$rules = array(
		    'user_ID' => 'required|unique:user,userID',
 		    'first_name' => 'required|alpha_dash',
		    'last_name' => 'required|alpha_dash',
		    'email' => 'required|email|unique:user,email',
		    'password' => 'required|min:8',
		    'confirmed_password' => 'required|same:password',
		    'terms_and_conditions' => 'accepted'
		);

		// create custom validation messages
		$messages = array(
			'required' => 'You must enter your :attribute',
			'same' 	=> 'The :others must match.',
			'unique' => 'That :attribute has already been registered',
			'alpha_dash' => 'Please enter only alphabetical characters for your :attribute',
			'min' => 'Your :attribute must be a minimum of 8 characters long',
			'accepted' => 'You must accept the :attribute before you can continue'
		);


		$validator = Validator::make(Input::all(), $rules, $messages);
		
		if ($validator->fails())
    	{
    		$messages = $validator->messages();
    		Log::info('Validator fail.');
        	return Redirect::to('create_user')
        		->withErrors($validator, 'login');
    	}
    	else
    	{
    		Log::info('Validator pass.');
    		$user = new User;
    		$userID = Input::get('user_ID');
    		$user->userID = $userID;
    		$user->fName = Input::get('first_name');
    		$user->lName = Input::get('last_name');
    		$user->email = Input::get('email');

  			//encrypting the password for storage
    		$not_enc_password = Input::get('password');
    		$password = Hash::make($not_enc_password);
    		$user->password = $password;
    		//Saving into the database here
    		$code = str_random();
    		$user->code = $code;
    		$user->active = 0;
    		$user->save();

    		Mail::send('emails.auth.activate', array('link' => URL::route('account-activate', $code), 'userID' => $userID), function($message) use ($user) {
    			$message->to($user->email, $user->userID)->subject('Activate your SparkUp account');	
    		});

    		return Redirect::to('/')
    			->with('global', 'Congratulations, your account has been created! Please check your e-mail for the activation link.');
    	}

	}

	//Post request sends your info through the server

	public function getActivate($code)
	{
		$founduser = User::where('code', '=', $code)->where('active', '=', 0);

		if($founduser->count()) {
			
			$user = $founduser->first();

			Log::info($user->userID);

			$user->active = 1;
			$user->code = '';

			if ($user->save()) {
				return Redirect::to('/sparkhub')
					->with('global', 'Your account has been activated! You may now sign in.');
			}

		}

		return Redirect::to('/')
			->with('global', 'Sorry, we could not activate your account.');
	}

	public function reverify()
	{
		//get the userID
		$id = Auth::id();
	
		if (!$id) 
		{
			return Redirect::to('/')
				->with('global', 'Please sign in before you can recieve the activation e-mail');
		}

		$founduser = User::where('userID', '=', $id);
		$user = $founduser->first();

		$code = $user->code;

    	Mail::send('emails.auth.activate', array('link' => URL::route('account-activate', $code), 'userID' => $id), function($message) use ($user) {
    		$message->to($user->email, $user->userID)->subject('Activate your SparkUp account');	
    	});

    	return Redirect::to('/')
    		->with('global', 'Your activation link has been re-sent, please check your e-mail.');
	}

}



