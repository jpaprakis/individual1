<?php

class TopController extends BaseController {

	public function getMain()
	{
		return View::make('main.topSearch');
	}
	
	public function getTop()
	{
		$dayfrom = Session::get('dayfrom');
		$monthfrom = Session::get('monthfrom');
		$yearfrom = Session::get('yearfrom');
		$dayto = Session::get('dayto'); 
		$monthto = Session::get('monthto');
		$yearto = Session::get('yearto');
		$topk = Session::get('topk');

		//+1 here because it checks for the day at time 0, but we want <= to_date
		$dayto = $dayto+1;

		$from_date = $yearfrom . '-' . $monthfrom . '-' . $dayfrom;
		$to_date = $yearto . '-' . $monthto . '-' . $dayto;

		$results = DB::table('ideas')
			->select('ideas.id', 'ideas.userID', 'ideas.title', 'ideas.description', 'ideas.industry', 'ideas.created_at', DB::raw('sum(rating) as `sum`'))
			->where('ideas.created_at', '>', $from_date)
			->where('ideas.created_at', '<', $to_date)
			->join('ratings', 'ideas.id', '=', 'ratings.ideaID')
			->groupBy('ideas.id')->orderBy('sum', 'DESC')->take($topk);

		$json_results = DB::table('ideas')
			->select('ideas.id', 'ideas.userID', 'ideas.title', 'ideas.description', 'ideas.industry', 'ideas.created_at', DB::raw('sum(rating) as `sum`'))
			->where('ideas.created_at', '>', $from_date)
			->where('ideas.created_at', '<', $to_date)
			->join('ratings', 'ideas.id', '=', 'ratings.ideaID')
			->groupBy('ideas.id')->orderBy('sum', 'DESC')->take($topk)->get();

		return View::make('main.topSparks', array('jsonResults'=>json_encode($json_results), 'orderedResults'=>$results));
	}

	public function showTop()
	{
		$rules = array(
			   	'FromDay' => 'required',
			   	'FromMonth' => 'required',
			   	'FromYear' => 'required',
			   	'ToDay' => 'required',
			   	'ToMonth' => 'required',
			   	'ToYear' => 'required',	
			   	'topk' => 'required'
			);

			// create custom validation messages
			$messages = array(
				'required' => 'You must fill this out to search for the top Sparks!'
			);

			$validator = Validator::make(Input::all(), $rules, $messages);

			if ($validator->fails())
	    	{
	    		$messages = $validator->messages();
	    		Log::info('Validator fail.');
	        	return Redirect::route('searchTop')
	        		->with('global', 'You must fill out the entire form to be able to search for the top Sparks!');
	    	}

	    	else
	    	{
			    $dayfrom = Input::get('FromDay');
		    	$monthfrom = Input::get('FromMonth');
				$yearfrom = Input::get('FromYear');
				$dayto = Input::get('ToDay');
		    	$monthto = Input::get('ToMonth');
				$yearto = Input::get('ToYear');
				$topk = Input::get('topk');

				return Redirect::route('getTop')
				->with('dayfrom', $dayfrom)
				->with('monthfrom', $monthfrom)
				->with('yearfrom', $yearfrom)
				->with('dayto', $dayto)
				->with('monthto', $monthto)
				->with('yearto', $yearto)
				->with('topk', $topk);
	    	}
	}



}