@extends('layouts/main')


<?php $global = Session::get('global'); ?>

<div class="withMsg">{{ $global }}</div><br />

<?php 
//get the authenticated userID
$id = Auth::id();
//allow 10 sparks per page (can be adjusted once we format this)

$results = Idea::orderBy('created_at', 'DESC');
$pag_ideas = $results->paginate(10); 
?>

<div class="container">
    <?php foreach ($pag_ideas as $idea): ?>
        <p><?php echo $idea->title; ?>
        	<?php $ideaID=$idea->ideaID; ?>
        	<a href ="/view_idea/<?php echo $ideaID ?>">View</a>
        	
        	<!--Can view and edit your own sparks, even on the hub page-->
        	@if ($idea->userID === $id)
				<a href ="/edit_idea/<?php echo $ideaID ?>">Edit</a>
        		<a href ="/delete_idea/<?php echo $ideaID ?>">Delete</a>
			
			<!--If the sparks belong to someone else, can rate them-->
			@else
                <!--ADD LOGIC HERE TO ONLY ALLOW RATINGS IF NOT ALREADY RATED, & SHOW A DIFF COLOUR IF ALRDY RATED-->
				<a href ="/rate/<?php echo $ideaID ?>/1">Light</a>
				<a href ="/rate/<?php echo $ideaID ?>/-1">Extinguish</a>
			@endif </p>

    
    <?php endforeach; ?>
</div>

<?php echo $pag_ideas->links(); ?>

@if (!$results->count())
	<div name="Nothing">It seems there are no Sparks! Spark up some of your own to inspire others!</div>
@endif