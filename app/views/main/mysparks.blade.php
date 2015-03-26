@extends('layouts/main')

<!doctype html>
<?php $global = Session::get('global'); ?>

<link href="css/stylish-portfolio.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />

<title>My Sparks | SparkUp</title>

<div class="container">
	<div class="withMsg">{{ $global }}</div><br />

<div class="page-header">
        <span class="fa-stack fa-4x">
            <i class="fa fa-lightbulb-o fa-stack-1x text-primary"></i>
        </span>
    <h1>My Sparks</h1>
</div>
</div>


<?php 
//get the authenticated userID
$id = Auth::id();
//allow 10 sparks per page (can be adjusted once we format this)
$my_ideas =Idea::where('userID', '=', $id)->orderBy('created_at', 'DESC');
$pag_ideas = $my_ideas->paginate(10); 
?>

<div class="container">
    <?php foreach ($pag_ideas as $idea): ?>
        <?php $ideaID=$idea->id; ?>
        <div class="col-lg-7 form-control">
	        <p><?php echo $idea->title; ?>
	        	<a href ="/edit_idea/<?php echo $ideaID ?>">Edit</a>
	        	<a href ="/delete_idea/<?php echo $ideaID ?>">Delete</a></p>
	    </div>
    <span><?php endforeach; ?></span>
</br>

<p><a href="/createspark">Create a New Spark</a></p>
<?php echo $pag_ideas->links(); ?>
</div>



