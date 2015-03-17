<?php


//eloquent is a database library built into laravel that helps us connect the databases
class Cat
{
	public static function getCat(){
		$test = DB::select('select * from user', array());
		return json_encode($test);
	}
}