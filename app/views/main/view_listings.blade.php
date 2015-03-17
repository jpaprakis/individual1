@extends('layouts/main')

<?php 
//get the authenticated userID
$id = $passedID;
//allow 10 spaces per page (can be adjusted once we format this)
$pag_spaces = Space::where('userID', '=', $id)->paginate(10); 
?>

<div class="container">
    <?php foreach ($pag_spaces as $space): ?>
        <p><?php echo $space->space_name; ?></p>
    <?php endforeach; ?>
</div>

<?php echo $pag_spaces->links(); ?>

