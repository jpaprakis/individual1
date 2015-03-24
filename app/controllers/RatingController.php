<?php

class RatingController extends BaseController {

	public function onRate($SparkID, $upOrDown)
	{
		//rate a spark

		//If this is the first time the user is rating
		//this spark, add them to the DB. Otherwise, just
		//change their rating in the DB.
		$raterID = Auth::id();

		$found_rating = Rating::where('ideaID', '=', $SparkID)->
		where('raterID', '=', $raterID)->first();

		//If the rating already exists, just change to -1 or 1
		if(count($found_rating) > 0)
		{
			$found_rating->rating = $upOrDown;
			$found_rating->save(); 
		}
		else
		{
			$rating = new Rating; 
			$rating->ideaID = $SparkID;
			$rating->raterID = $raterID;
			$rating->rating = $upOrDown;
			$rating->save();
		}
		return Redirect::to('/sparkhub');
	}
}