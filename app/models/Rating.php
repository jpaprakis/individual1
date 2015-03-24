<?php

class Rating extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'ratings';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */

	//also need to display spaces where user is a landlord or tenant, but will do this by cross-referencing 
	//those specific tables
	protected $hidden = array('id','ideaID','raterID', 'rating');
	protected $primaryKey = 'id';

	public static function getIdeaRatings($ID)
	{
		$rating = DB::table('ratings')->where('ideaID', $ID)->sum('rating');
		return $rating;
	}

}