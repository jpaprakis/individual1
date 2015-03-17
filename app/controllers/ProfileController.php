<?php

class ProfileController extends BaseController {


	//get request, data open in plain text
	//client sends get request to the server
	//accessing view from views/main/index (specify by main.index)
	public function getMain()
	{

		//get the authenticated userID
		$id = Auth::id();

		//pass the userID to the getProfile function
		return View::make('main.user_profile', array('profile'=>Profile::getProfile($id)));
	}

	//Edit your profile
	public function onEdit()
	{
		//get the authenticated userID
		$id = Auth::id();
		return View::make('main.edit_profile', array('profile'=>Profile::getProfile($id)));
	}

	//When a user submits their profile edits, saves changes to profile table
	public function onEditSubmit()
	{
		$id = Auth::id();
		
		$foundprofile = Profile::where('userID', '=', $id);
		$profile = $foundprofile->first();

		$city = Input::get('city');
		$province = Input::get('province');
		$company = Input::get('company');
    	$summary = Input::get('summary');
    	$experience = Input::get('experience');
		$cur_project = Input::get('cur_project');


    	$profile->city = $city;
    	$profile->province = $province;
    	$profile->company = $company;
    	$profile->summary = $summary;
    	$profile->experience = $experience;
    	$profile->cur_project = $cur_project;

    	$profile->save();

    	return Redirect::to('/view_profile')
    		->with('global', 'Your changes have been saved!');
	}

}