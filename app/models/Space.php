<?php

class Space extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'space';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */

	//also need to display spaces where user is a landlord or tenant, but will do this by cross-referencing 
	//those specific tables
	protected $hidden = array('concat_ID','userID','space_name','city','province','address','suite','postal_code','description','looking_for','price','price_type','additional_info');
	protected $primaryKey = 'concat_ID';

	public static function getSpaces($ID)
	{
		$spaces = DB::table('space')->where('userID', $ID)->get();
		return $spaces;
	}

}