<?php

class Keyword extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'keywords';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */

	//also need to display spaces where user is a landlord or tenant, but will do this by cross-referencing 
	//those specific tables
	protected $hidden = array('keywordID','ideaID','keyword');
	protected $primaryKey = 'keywordID';

	public static function getIdeasByKeyword($keyword)
	{
		$ideas = DB::table('keywords')->where('keyword', $keyword)->get();
		return $ideas;
	}

}