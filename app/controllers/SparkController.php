<?php

class SparkController extends BaseController {


	//get request, data open in plain text
	//client sends get request to the server
	//accessing view from views/main/index (specify by main.index)
	public function getMain()
	{
		return View::make('main.sparkhub');
	}

	public function mySparks()
	{
		return View::make('main.mysparks');
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

	public function onEdit($SparkID)
	{
		$decode_ID = urldecode($SparkID);
		//edit a single listing

		$spark_toedit = Idea::where('ideaID', '=', $decode_ID)->first();

		$all_keywords = Keyword::where('ideaID', '=', $spark_toedit->ideaID)->get();

		$keyword_string = $all_keywords[0]->keyword;

		for ($i=1; $i < count($all_keywords); $i++)
		{
			$keyword_string = $keyword_string . "; " . $all_keywords[$i]->keyword;	
		}

		return View::make('main.editspark', array('spark'=>$spark_toedit, 'keystring'=>$keyword_string));
	}

	public function onEditSubmit()
	{

		$rules = array(
		   	'description' => 'required',
		   	'industry' => 'required',
		   	'keyword' => 'required'
		);

		// create custom validation messages
		$messages = array(
			'required' => 'You must enter the :attribute of your Spark!'
		);

		$validator = Validator::make(Input::all(), $rules, $messages);
		
	    //Find the existing spark from the databas
	    $SparkID = Input::get('SparkID');
	    $foundspark = Idea::where('ideaID', '=', $SparkID);
		$spark = $foundspark->first();
				

		if ($validator->fails())
    	{
    		$messages = $validator->messages();
    		Log::info('Validator fail.');
        	return Redirect::route('IdeaEditor', array($SparkID))
        		->withErrors($validator, 'edit');
    	}

    	else
    	{
	    		Log::info('Validator pass.');
	    		
	    		$description = Input::get('description');
	    		$industry = Input::get('industry');
	    		$keyword = Input::get('keyword');

	    		$spark->description = $description;
	    		$spark->industry = $industry;
	  
	    		//Saving into the database here
	    		$spark->save();


	    		//First delete all keyword entries for this idea
	    		//so that we can re-enter them with the edited keywords
	    		Keyword::where('ideaID', '=', $SparkID)->delete();

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
	    			->with('global', 'Your Spark has been edited!');
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