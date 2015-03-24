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
	protected $hidden = array('id','ideaID','keyword');
	protected $primaryKey = 'id';
    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
	public $incrementing = true;

	public static function getIdeasByKeyword($keyword)
	{
		$ideas = DB::table('keywords')->where('keyword', $keyword)->get();
		return $ideas;
	}

}