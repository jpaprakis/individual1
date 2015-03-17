<?php

class Profile extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'profile';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */

	//also need to display spaces where user is a landlord or tenant, but will do this by cross-referencing 
	//those specific tables
	protected $hidden = array('userID','city','province','company','summary','experience','cur_project');
	protected $primaryKey = 'userID';

	public static function getProfile($ID)
	{
		$profile = DB::table('profile')->where('userID', $ID)->get();
		return $profile;
	}

}