<?php

class ContactController extends BaseController {

	public function getMain() {
		return View::make('main.contact_us');
	}

	public function onContact_Submit()
	{	
		return Redirect::to('/contact_us')
		->with('global', 'The contact function has not yet been implemented.');
	}

}
