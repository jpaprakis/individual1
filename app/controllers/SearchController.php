<?php

class SearchController extends BaseController {

	public function findSpaces()
	{
		//display the find spaces page
		return View::make('main.find_spaces');
	}

	public function findCoworkers()
	{
		//display the find coworkers page
		return View::make('main.find_coworkers');
	}

	public function onFindCoworkers_Submit()
	{	
		return Redirect::to('/find_coworkers')
		->with('global', 'The search function has not yet been implemented.');
	}

	public function onFindSpaces_Submit()
	{	
		return Redirect::to('/find_spaces')
		->with('global', 'The search function has not yet been implemented.');
	}

}
