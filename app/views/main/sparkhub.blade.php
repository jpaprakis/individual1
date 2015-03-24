@extends('layouts/main')

<!doctype html>
<?php $global = Session::get('global'); ?>

<div class="withMsg">{{ $global }}</div><br />

<?php 
//dd($orderedResults); 

//get the authenticated userID
$id = Auth::id();

//allow 10 sparks per page (can be adjusted once we format this)
$pag_ideas = $orderedResults->paginate(10); 
?>

<form method="post" novalidate>
    <div>
        <div>Filter By:<name="filters">
                <select name="filter_type">
                    <option value="default_filter">Pick a filter..</option>
                    <option value="industry_filter">Industry</option>
                    <option value="keyword_filter">Keyword</option>
                </select>
                <input type="text" size="30" maxlength="60" name="filter_value"/><br />
        </div>
        <div>Sort By:<name="orders">
                <select name="order_type">
                    <option value="default_sort">Pick a way to sort..</option>
                    <option value="title">Name</option>
                    <option value="created_at">Date of Submission</option>
                </select>
                <select name="order_AorD">
                    <option value="default_AorD">Pick the order to be displayed..</option>
                    <option value="DESC">Descending</option>
                    <option value="ASC">Ascending</option>
                </select>
        </div>
        <input type="submit" value="Submit Filters/Ordering"/>
    </div>
</form>
<form action="/clear_filters" method="get">
    <input type="submit" value="Clear Filters/Ordering"/>
</form>

<div class="container">
    <?php foreach ($pag_ideas as $idea): ?>
        <p><?php echo $idea->title; ?>
        	<?php $ideaID=$idea->id; ?>
        	<a href ="/view_idea/<?php echo $ideaID ?>">View</a>
        	<!--Can view and edit your own sparks, even on the hub page-->
        	@if ($idea->userID === $id)
				<a href ="/edit_idea/<?php echo $ideaID ?>">Edit</a>
        		<a href ="/delete_idea/<?php echo $ideaID ?>">Delete</a>
			
			<!--If the sparks belong to someone else, can rate them-->
			@else
                <!--ADD LOGIC HERE TO SHOW A DIFF COLOUR IF ALRDY RATED-->
                <p id="upvote" onclick="vote_up('{{ $ideaID }}')">Light</p>   
                <p id="downvote" onclick="vote_down('{{ $ideaID }}')">Extinguish</p>

			@endif </p>

    
    <?php endforeach; ?>
</div>

<?php echo $pag_ideas->links(); ?>

@if (!$orderedResults->count())
    @if(!$filtered)
	   <div name="Nothing">It seems there are no Sparks! Spark up some of your own to inspire others!</div>
    @else
        <div name="FiltNothing">It seems that there are no Sparks that match your filter! Please try a different filter!</div>
    @endif
@endif

</html>

{{ HTML::script('js/rating.js'); }}