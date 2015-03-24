@extends('layouts/main')


<?php $global = Session::get('global'); ?>

<div class="withMsg">{{ $global }}</div><br />

<?php 
//get the authenticated userID
$id = Auth::id();
//allow 10 sparks per page (can be adjusted once we format this)
$pag_ideas = Idea::where('userID', '=', $id)->orderBy('created_at', 'DESC')->paginate(10); 
?>

<div class="container">
    <?php foreach ($pag_ideas as $idea): ?>
        <p><?php echo $idea->title; ?>
        	<?php $ideaID=$idea->id; ?>
        	<a href ="/edit_idea/<?php echo $ideaID ?>">Edit</a>
        	<a href ="/delete_idea/<?php echo $ideaID ?>">Delete</a></p>
    <?php endforeach; ?>
</div>

<?php echo $pag_ideas->links(); ?>

<p><a href="/createspark">Create a New Spark</a></p>

