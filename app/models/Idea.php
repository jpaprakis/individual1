<?php

class Idea extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'ideas';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */

	//also need to display spaces where user is a landlord or tenant, but will do this by cross-referencing 
	//those specific tables
	protected $hidden = array('ideaID','userID','title','description','industry');
	protected $primaryKey = 'ideaID';

	public static function getIdea($ID)
	{
		$ideas = DB::table('ideas')->where('ideaID', $ID)->get();
		return $ideas;
	}

}