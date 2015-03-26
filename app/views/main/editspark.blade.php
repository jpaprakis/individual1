@extends('layouts/main')

<!DOCTYPE html>
<html>

<?php $global = Session::get('global'); ?>

<head>
    <meta charset="utf-8" />
    <title>Edit Spark | SparkUp</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link href="../css/bootstrap.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="../font-awesome/css/font-awesome.min.css" />

    <link href="../css/navme.css" rel="stylesheet">
    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
</head>
<body>



<div class="container">
<p><a href="/mysparks">Go back to my Sparks</a></p>
<div class="withMsg">{{ $global }}</div>
<div class="page-header">
	<div class="service-item">
	    <span class="fa-stack fa-4x">
		    <i class="fa fa-pencil fa-stack-1x text-primary"></i>
		</span>
	</div>

    <h1>Editing Idea: <small>{{ $spark->title }}</small> </h1>
</div>

<div class="container">
    <div class="row">
        <form role="form" method="post" novalidate>
            <div class="col-lg-6">
                <div class="well well-sm"><strong><span class="glyphicon glyphicon-asterisk"></span>Required Field</strong></div>
				<div class="form-group">
                    <label for="InputDesc">Description</label>
                    <div class="input-group">
                        <textarea name="description" id="InputDesc" class="form-control" rows="5" required>{{ $spark->description }}</textarea>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div><p class="errmessage"><?php echo $errors->edit->first('description'); ?></p>
                </div>
                <div class="form-group">
                    <label for="industry">Industry</label>
                    <div class="input-group">
                        <select name="industry" required class="form-control" >
							<option selected value="">Select Industry Type</option>
							<option <?php if($spark->industry == 'Health'){echo("selected");}?> value="Health">Health</option>
							<option <?php if($spark->industry == 'Technology'){echo("selected");}?> value="Technology">Technology</option>
							<option <?php if($spark->industry == 'Education'){echo("selected");}?> value="Education">Education</option>
							<option <?php if($spark->industry == 'Finance'){echo("selected");}?> value="Finance">Finance</option>
							<option <?php if($spark->industry == 'Travel'){echo("selected");}?> value="Travel">Travel</option>
						</select>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div><p class="errmessage"><?php echo $errors->edit->first('industry'); ?></p>
                </div>
                <div class="form-group">
                    <label for="keyword">Keywords (Separate each with a semi-colon)</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="Inputkeyword" name="keyword" value="{{ $keystring }}" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div><p class="errmessage"><?php echo $errors->edit->first('keyword'); ?></p>
                </div>
        
                <input type="submit" id="submit" value="Submit Changes" class="btn btn-info pull-right submitter"/>
                <input type="hidden" name="SparkID" value="{{ $spark->id }}"/>

            </div>
        </form>

        @if(sizeof($errors->edit) > 0)
        <div class="col-lg-5 col-md-push-1">
            <div class="col-md-12">
                <div class="alert alert-danger">
                    <span class="glyphicon glyphicon-remove"></span><strong> Error! Please check all page inputs.</strong>
                </div>
            </div>
        </div>
        @endif

    </div>
</div>

</div>

</body>
</html>