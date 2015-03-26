<?php

class MiscController extends BaseController {

	public function getAbout() {
		return View::make('main.about');
	}

	public function getContact() {
		return View::make('main.contact_us');
	}

	public function onContact_Submit()
	{	
		return Redirect::to('/contact_us')
		->with('global', 'The contact function has not yet been implemented.');
	}


}
