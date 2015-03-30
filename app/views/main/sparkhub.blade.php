@extends('layouts/main')

<!doctype html>
<?php $global = Session::get('global'); ?>

<link href="css/stylish-portfolio.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />

<title>Spark Hub | SparkUp</title>

<div class="container">
<div class="withMsg">{{ $global }}</div><br />
<div class="page-header">
        <span class="fa-stack fa-4x">
            <i class="fa fa-star fa-stack-1x text-primary"></i>
        </span>
    <h1>Spark Hub</h1>
</div>
</div>



<!-- The Search Form -->
  <div class="search-form"><h4><span class="glyphicon glyphicon-search"></span> Search for Sparks</h4>
    <form method="post" novalidate>
        <div class="row">
            <div class="col-lg-5">
              <select class="form-control" name="filter_type">
                    <option value="default_filter">Pick a filter..</option>
                    <option value="industry_filter">Industry</option>
                    <option value="keyword_filter">Keyword</option>
              </select>
            </div>
            <div class="col-lg-7">
                <input class="form-control" type="text" size="30" maxlength="60" name="filter_value" placeholder="Enter Filter Keyword"/>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-5">
              <select class="form-control" name="order_type">
                    <option value="default_sort">Pick a way to sort..</option>
                    <option value="title">Name</option>
                    <option value="created_at">Date of Submission</option>
              </select>
            </div>
            <div class="col-lg-7">
              <select class="form-control" name="order_AorD">
                    <option value="default_AorD">Pick the order to be displayed..</option>
                    <option value="DESC">Descending</option>
                    <option value="ASC">Ascending</option>
              </select>
            </div>
        </div>
          <input class="btn btn-primary" type="submit" value="Submit Filters/Ordering"/>
    </form>
    <form action="/clear_filters" method="get">
        <input class="btn btn-primary" type="submit" value="Clear Filters/Ordering"/>
    </form>
  </div>

<?php 

//get the authenticated userID
$id = Auth::id();

//allow 10 sparks per page
$pag_ideas = $orderedResults->paginate(10); 
?>


<div class="container">
    <?php foreach ($pag_ideas as $idea): ?>
        <?php $ideaID=$idea->id; ?>
    <div class="col-lg-7 form-control">
        <label id="each_spark">
            @if (!($idea->userID === $id))
                <span id="votes" onclick="clearColour(this)">
                    <?php $upRating = Rating::where('raterID', '=', $id)
                                           ->where('ideaID', '=', $idea->id)
                                        ->where('rating', '=', 1)->first();
                        $downRating = Rating::where('raterID', '=', $id)
                        ->where('ideaID', '=', $idea->id)
                        ->where('rating', '=', 0)->first();
                    
                    $upcol = "";
                    $downcol = ""; ?>
                    @if(isset($upRating))
                        <i class="fa fa-fire vote" style="color:red;" id="upvote{{$ideaID}}" onclick="vote_up('{{ $ideaID }}', this)"></i>
                    @else
                        <i class="fa fa-fire vote" id="upvote{{$ideaID}}" onclick="vote_up('{{ $ideaID }}', this)"></i>
                    @endif
                     @if(isset($downRating))
                         <i class="fa fa-fire-extinguisher vote" style="color:red;" id="downvote{{$ideaID}}" onclick="vote_down('{{ $ideaID }}', this)"></i>
                    @else
                        <i class="fa fa-fire-extinguisher vote" id="downvote{{$ideaID}}" onclick="vote_down('{{ $ideaID }}', this)"></i>
                    @endif
                </span>
            @endif
            <?php 
                $idea_rating = Rating::where('ideaID', '=', $idea->id)->sum('rating')?>
            <p id="spark_title" placeholder="want_some_icons"/><span id="number_rating{{$ideaID}}">{{$idea_rating   }}</span> {{   $idea->title}}</p>
        </label>
            <a href ="/view_idea/<?php echo $ideaID ?>">View</a>
            <!--Can view and edit your own sparks, even on the hub page-->
            @if ($idea->userID === $id)
                <a href ="/edit_idea/<?php echo $ideaID ?>">Edit</a>
                <a href ="/delete_idea/<?php echo $ideaID ?>">Delete</a>
            @endif
            </p>
    </div></br>

    
    <?php endforeach; ?>

<span><?php echo $pag_ideas->links(); ?></span>

</div>


@if (!$orderedResults->count())
    @if(!$filtered)
       <div name="Nothing">It seems there are no Sparks! Spark up some of your own to inspire others!</div>
    @else
        <div name="FiltNothing">It seems that there are no Sparks that match your filter! Please try a different filter!</div>
    @endif
@endif

</html>

{{ HTML::script('js/rating.js'); }}