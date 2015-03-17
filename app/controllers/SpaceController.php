<?php

class SpaceController extends BaseController {

	public function getMain()
	{
		return View::make('main.my_listings');
	}

	public function onCreate()
	{
		//here we display the user's own listings
		return View::make('main.create_listing');
	}

	//Create a space
	public function onCreate_Submit()
	{

		$rules = array(
 		    'space_name' => 'required',
		    'city' => 'required',
		    'province' => 'required',
		    'address' => 'required',
		    'postal_code' => 'required',
		   	'description' => 'required',
		   	'price' => 'required|integer',
		   	'price_type' => 'required'
		);

		// create custom validation messages
		$messages = array(
			'required' => 'You must enter the :attribute of the space',
			'integer' => 'Please only enter a number in the :attribute field'
		);

		$validator = Validator::make(Input::all(), $rules, $messages);
		
		if ($validator->fails())
    	{
    		$messages = $validator->messages();
    		Log::info('Validator fail.');
        	return Redirect::to('/create_listing')
        		->withErrors($validator, 'create');
    	}
    	else
    	{
    		$userID = Auth::id();
    		$space_name = Input::get('space_name');
    		$address = Input::get('address');
    		$suite = Input::get('suite');

    		$check_duplicate = Space::where('userID', '=', $userID)
    			->where('space_name', '=', $space_name)
    			->where('address', '=', $address)
    			->where('suite', '=', $suite)
    			->first();

    		if (count($check_duplicate) > 0)
    		{
    			return Redirect::to('/create_listing')
    				->with('global', 'You have already listed this space!');
    		}

    		else
    		{
	    		Log::info('Validator pass.');
	    		$space = new Space;
				//get the authenticated userID
				
				$space->space_name = $space_name;
	    		$space->userID = $userID;
	    		$space->city = Input::get('city');
	    		$space->province = Input::get('province');
	    	
	    		$space->address = $address;
	    		
				$space->suite = $suite;
	    		$space->postal_code = Input::get('postal_code');
	    		$space->description = Input::get('description');
	    		$space->looking_for = Input::get('looking_for');
	    		$space->price = Input::get('price');
	    		$space->price_type = Input::get('price_type');
	    		$space->additional_info = Input::get('additional_info');
	    		//this is the primary key for the table, since the combination of these things needs to be unique
	    		$concat =  $userID . $space_name . $address . $suite;
	    		$space->concat_ID = $concat;
	    		//Saving into the database here
	    		$space->save();

				return Redirect::to('/my_listings')
	    			->with('global', 'Your space has been added!');
	    	}
		}
	}

	public function onView($ID)
	{
		//this is the function to display another users' listings, pass in $ID of user
		return View::make('main.view_listings', array('passedID'=>$ID));
	}

	public function onEdit($Space_ID)
	{
		$decode_ID = urldecode($Space_ID);
		//edit a single listing
		return View::make('main.edit_space', array('space'=>Space::where('concat_ID', '=', $decode_ID)->first()));
	}

	public function onEditSubmit()
	{

		$rules = array(
 		    'space_name' => 'required',
		   	'description' => 'required',
		   	'price' => 'required|integer',
		   	'price_type' => 'required'
		);

		// create custom validation messages
		$messages = array(
			'required' => 'You must enter the :attribute of the space',
			'integer' => 'Please only enter a number in the :attribute field'
		);

		$validator = Validator::make(Input::all(), $rules, $messages);
		
		$concat_ID = Input::get('concat_ID');

		if ($validator->fails())
    	{
    		$messages = $validator->messages();
    		Log::info('Validator fail.');
        	return Redirect::route('ListingEditor', array($concat_ID))
        		->withErrors($validator, 'edit');
    	}

    	else
    	{
			$foundspace = Space::where('concat_ID', '=', $concat_ID);
			$space = $foundspace->first();

			$space_name = Input::get('space_name');
			$description = Input::get('description');
			$looking_for = Input::get('looking_for');
	    	$price = Input::get('price');
	    	$price_type = Input::get('price_type');
			$additional_info = Input::get('additional_info');
			$new_concat_ID = $space->userID . $space_name . $space->address . $space->suite;

			$check_duplicate = Space::where('concat_ID', '=', $new_concat_ID)
				->where('created_at', '!=', $space->created_at)
				->first();

			if (count($check_duplicate) > 0)
			{
				return Redirect::route('ListingEditor', array($concat_ID))
					->with('global', 'You have already listed a space at this address with the same name');
			}


	    	$space->space_name = $space_name;
	    	$space->description = $description;
	    	$space->looking_for = $looking_for;
	    	$space->price = $price;
	    	$space->price_type = $price_type;
	    	$space->additional_info = $additional_info;
	    	$space->concat_ID = $new_concat_ID;

	    	$space->save();

	    	return Redirect::to('/my_listings')
	    		->with('global', 'Your changes have been saved!');
		}
	}

	public function onDelete($Space_ID)
	{
		//A user can delete one of their space listings
		$decode_ID = urldecode($Space_ID);
		$toDelete = Space::where('concat_ID', '=', $decode_ID)
			->first()->delete();

		return Redirect::to('/my_listings')
	    	->with('global', 'Your space has been successfully deleted');
	}

	public function onSingleView()
	{
		//view a single listing (likely through search functionality)
	}

}