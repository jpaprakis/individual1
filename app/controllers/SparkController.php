<?php

class SparkController extends BaseController {


	//get request, data open in plain text
	//client sends get request to the server
	//accessing view from views/main/index (specify by main.index)
	public function getMain()
	{
		//pass the userID to the getProfile function
		return View::make('main.sparkhub');
	}


	public function onCreate()
	{
		//here we display the user's own listings
		return View::make('main.createspark');
	}

	//Create a space
	public function onCreate_Submit()
	{

		$rules = array(
 		    'name' => 'required',
		    'description' => 'required',
		    'industry' => 'required',
		    'keyword' => 'required'
		);

		// create custom validation messages
		$messages = array(
			'required' => 'You must enter a :attribute of your Spark!',
		);

		$validator = Validator::make(Input::all(), $rules, $messages);
		
		if ($validator->fails())
    	{
    		$messages = $validator->messages();
    		Log::info('Validator fail.');
        	return Redirect::to('/createspark')
        		->withErrors($validator, 'create');
    	}
    	else
    	{
    		$userID = Auth::id();
    		$title = Input::get('name');
    		$description = Input::get('description');
    		$industry = Input::get('industry');
    		$keyword = Input::get('keyword');

    		$check_duplicate = Idea::where('userID', '=', $userID)
    			->where('title', '=', $title)
    			->first();

    		if (count($check_duplicate) > 0)
    		{
    			return Redirect::to('/createspark')
    				->with('global', 'You have already posted that Spark!');
    		}

    		else
    		{
	    		Log::info('Validator pass.');
	    		$spark = new Idea;
				//get the authenticated userID
				
				$spark->title = $title;
	    		$spark->userID = $userID;
	    		$spark->description = $description;
	    		$spark->industry = $industry;
	    	
	       		//this is the primary key for the table, since the combination of these things needs to be unique
	    		$concat =  $userID . $title;
	    		$spark->ideaID = $concat;
	  
	    		//Saving into the database here
	    		$spark->save();

	    		//Removing any duplicate keyword values from the array

	    		//Now saving the keywords, first split by semicolon
	    		$keyword_array = explode(";", $keyword);
				
	    		for ($i=0; $i < count($keyword_array); $i++)
	    		{
	    			//checking for keyword duplicates
	    			$key_concat = $concat . trim($keyword_array[$i]);
		    		$check_key_duplicate = Keyword::where('keywordID', '=', $key_concat)
		    			->first();
		    		if (count($check_key_duplicate) < 1)
		    		{
		    			$new_keyword = new Keyword;
		    			$new_keyword->ideaID = $concat;
		    			$new_keyword->keyword = trim($keyword_array[$i]);
		    			$new_keyword->keywordID = $key_concat;
		    			$new_keyword->save();
		    		}
	    		}

				return Redirect::to('/mysparks')
	    			->with('global', 'Your Spark has been posted!');
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