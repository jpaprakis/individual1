<?php

class GraphController extends BaseController {

	public function getMain()
	{
		/*
		$tech_count = DB::table('ideas')->select(DB::raw('count(id) as `t_count`'))
						->where('ideas.industry', '=', 'Technology');
*/
		$tech_count = DB::table('ideas')		
						->where('ideas.industry', '=', 'Technology')
						->count();
		$health_count = DB::table('ideas')		
						->where('ideas.industry', '=', 'Health')
						->count();
		$education_count = DB::table('ideas')		
						->where('ideas.industry', '=', 'Education')
						->count();
		$finance_count = DB::table('ideas')		
						->where('ideas.industry', '=', 'Finance')
						->count();
		$travel_count = DB::table('ideas')		
						->where('ideas.industry', '=', 'Travel')
						->count();
		return View::make('main.graph', array('tech_count'=>$tech_count, 'health_count'=>$health_count, 
			'education_count'=>$education_count, 'finance_count'=>$finance_count, 'travel_count'=>$travel_count));
	}
}