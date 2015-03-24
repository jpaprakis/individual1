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
	  
	    		//Saving into the database here
	    		$spark->save();

	    		//Removing any duplicate keyword values from the array

	    		//Now saving the keywords, first split by semicolon
	    		$keyword_array = explode(";", $keyword);
				
	    		for ($i=0; $i < count($keyword_array); $i++)
	    		{
	    			//checking for keyword duplicates
		    		$check_key_duplicate = Keyword::where('keyword', '=', $keyword_array[$i])
		    			->where('ideaID', '=', $spark->id)
		    			->first();
		    		if (count($check_key_duplicate) < 1)
		    		{
		    			$new_keyword = new Keyword;
		    			$new_keyword->ideaID = $spark->id;
		    			$new_keyword->keyword = trim($keyword_array[$i]);
		    			$new_keyword->save();
		    		}
	    		}

				return Redirect::to('/mysparks')
	    			->with('global', 'Your Spark has been posted!');
	    	}
		}
	}

	public function onView($SparkID)
	{
		//this is the function to display a spark, pass in the SparkID

		$spark_toview = Idea::where('id', '=', $SparkID)->first();

		$all_keywords = Keyword::where('ideaID', '=', $SparkID)->get();

		if (sizeof($all_keywords) > 0)
		{
			$keyword_string = $all_keywords[0]->keyword;
			for ($i=1; $i < count($all_keywords); $i++)
			{
				$keyword_string = $keyword_string . "; " . $all_keywords[$i]->keyword;	
			}
		}
		else 
		{
			$keyword_string = "";
		}

		return View::make('main.viewspark', array('spark'=>$spark_toview, 'keystring'=>$keyword_string));
	}

	public function onEdit($SparkID)
	{
		//edit a single listing
		$spark_toedit = Idea::where('id', '=', $SparkID)->first();

		$all_keywords = Keyword::where('ideaID', '=', $SparkID)->get();

		if (sizeof($all_keywords) > 0)
		{
			$keyword_string = $all_keywords[0]->keyword;
			for ($i=1; $i < count($all_keywords); $i++)
			{
				$keyword_string = $keyword_string . "; " . $all_keywords[$i]->keyword;	
			}
		}
		else 
		{
			$keyword_string = "";
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
		
	    //Find the existing spark from the database
	    $SparkID = Input::get('SparkID');
	    $foundspark = Idea::where('id', '=', $SparkID);
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
	   		    		$check_key_duplicate = Keyword::where('keyword', '=', $keyword_array[$i])
		    			->where('ideaID', '=', $SparkID)
		    			->first();
		    		if (count($check_key_duplicate) < 1)
		    		{
		    			$new_keyword = new Keyword;
		    			$new_keyword->ideaID = $SparkID;
		    			$new_keyword->keyword = trim($keyword_array[$i]);
		    			$new_keyword->save();
		    		}
	    		}
	    		return Redirect::to('/mysparks')
	    			->with('global', 'Your Spark has been edited!');
		}
	}

	public function onDelete($SparkID)
	{
		//A user can delete one of their Sparks
		$decode_ID = urldecode($SparkID);
		$ideaToDelete = Idea::where('id', '=', $SparkID)
			->first()->delete();

		$keywordsToDelete = Keyword::where('ideaID', '=', $SparkID)
			->delete();

		$ratingsToDelete = Rating::where('ideaID', '=', $SparkID)
			->delete();

		return Redirect::to('/mysparks')
	    	->with('global', 'Your Spark has been successfully deleted');
	}

	public function onFilter()
	{
		$filter_type = Input::get('filter_type');
    	$filter_item = Input::get('filter_value');
		
		$order_type = Input::get('order_type');
    	$order_AorD = Input::get('order_AorD');

    	//they picked a filter and a value for it
    	if(($filter_type != "default_filter") && ($filter_item != NULL)) 
		{
			//Filtering by industry
			if($filter_type == "industry_filter")
			{
				$filtered_results = Idea::where('industry', '=', $filter_item)->get();	
			}
			//Filtering by keyword
			else
			{
				//Find all the ideaID's of keywords that match from keyword table
				$filtered_results = DB::table('ideas')
					->join('keywords', 'ideas.id', '=', 'keywords.ideaID')
					->where('keywords.keyword', '=', $filter_item)->get(['ideas.*']);
			}
		}
		//They didn''t pick a filter, get everything
		else
		{
			$filtered_results = Idea::get();
		}

		


		$results = NULL;
		return Redirect::to('/sparkhub')
			->with('orderedResults', $results);
	}


	public function clearFilter()
	{
		$results = NULL;
		return Redirect::to('/sparkhub')
			->with('orderedResults', $results);
	}


}