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
    <?php endforeach; ?>
</div>

<?php echo $pag_ideas->links(); ?>

@if (!$results->count())
	<div name="Nothing">It seems there are no Sparks! Spark up some of your own to inspire others!</div>
@endif