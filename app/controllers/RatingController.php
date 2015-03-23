<?php

class RatingController extends BaseController {

	public function onRate($SparkID, $upOrDown)
	{
		//rate a spark

		//If this is the first time the user is rating
		//this spark, add them to the DB. Otherwise, just
		//change their rating in the DB.
		$raterID = Auth::id();
		$concat = $SparkID . $raterID;

		$found_rating = Rating::where('ratingID', '=', $concat)->first();

		//If the rating already exists, just change to -1 or 1
		if(count($found_rating) > 0)
		{
			$found_rating->rating = $upOrDown;
			$found_rating->save(); 
		}
		else
		{
			$rating = new Rating; 
			$rating->ratingID = $concat;
			$rating->ideaID = $SparkID;
			$rating->raterID = $raterID;
			$rating->rating = $upOrDown;
			$rating->save();
		}
		return Redirect::to('/sparkhub');
	}
}