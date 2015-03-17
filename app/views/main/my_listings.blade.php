@extends('layouts/main')


<?php $global = Session::get('global'); ?>

<div class="withMsg">{{ $global }}</div><br />

<?php 
//get the authenticated userID
$id = Auth::id();
//allow 10 spaces per page (can be adjusted once we format this)
$pag_spaces = Space::where('userID', '=', $id)->paginate(10); 
?>

<!-- ADD OPTION TO DELETE AS WELL -->

<div class="container">
    <?php foreach ($pag_spaces as $space): ?>
        <p><?php echo $space->space_name; ?>
        	<?php $spaceID=$space->concat_ID; ?>
        	<a href ="/edit_listing/<?php echo $spaceID ?>">Edit</a>
        	<a href ="/delete_listing/<?php echo $spaceID ?>">Delete</a></p>
    <?php endforeach; ?>
</div>

<?php echo $pag_spaces->links(); ?>

<p><a href="/create_listing">Create a New Listing</a></p>

