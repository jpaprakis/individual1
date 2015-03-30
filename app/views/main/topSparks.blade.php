@extends('layouts/main')

<!doctype html>
<?php $global = Session::get('global'); ?>


<link href="css/stylish-portfolio.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />

<title>Top Spark Results | SparkUp</title>

<div class="container">
<p><a href="/top">Go back to Search Top Sparks</a></p>
<div class="withMsg">{{ $global }}</div><br />
<div class="page-header">
        <span class="fa-stack fa-4x">
            <i class="fa fa-arrow-up fa-stack-1x text-primary"></i>
        </span>
    <h1>Top Spark Results</h1>
</div>
</div>

<?php 
//get the authenticated userID
$id = Auth::id();
$pag_ideas = $orderedResults->paginate(10); 
?>

<div class="container">
    <?php foreach ($pag_ideas as $idea): ?>
        <?php $ideaID=$idea->id; ?>
        <div class="col-lg-7 form-control">
        <?php $idea_rating = Rating::where('ideaID', '=', $ideaID)->sum('rating') ?>
        <p><span id="number_rating">{{$idea_rating   }}</span> <?php echo $idea->title; ?>
            <a href ="/view_idea/<?php echo $ideaID ?>">View</a>
            <!--Can view and edit your own sparks, even on the hub page-->
            @if ($idea->userID === $id)
                <a href ="/edit_idea/<?php echo $ideaID ?>">Edit</a>
                <a href ="/delete_idea/<?php echo $ideaID ?>">Delete</a>
            @endif
        </div></br>
    <?php endforeach; ?>
<?php echo $pag_ideas->links(); ?>
</div>


<div class="resultDiv">Results in JSON Format: {{ $jsonResults }}</div>


</html>

{{ HTML::script('js/rating.js'); }}