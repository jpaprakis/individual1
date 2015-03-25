@extends('layouts/main')

<!doctype html>
<?php $global = Session::get('global'); ?>

<div class="withMsg">{{ $global }}</div><br />

<?php 
//get the authenticated userID
$id = Auth::id();
$pag_ideas = $orderedResults->paginate(10); 
?>

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


<div class="resultDiv">Results in JSON Format: {{ $jsonResults }}</div>


</html>

{{ HTML::script('js/rating.js'); }}