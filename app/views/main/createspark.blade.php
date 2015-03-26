@extends('layouts/main')

<!DOCTYPE html>
<html>

<?php $global = Session::get('global'); ?>


<head>
    <meta charset="utf-8" />
    <title>Create Spark | SparkUp</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />

    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
</head>
<body>


<div class="container">
@if ($global === 'You have already listed this spark!')
    Please check your <a href="/mysparks" >current sparks</a> to make edits to it.
@endif
<div class="withMsg">{{ $global }}</div>
<div class="page-header">
	<div class="service-item">
	    <span class="fa-stack fa-4x">
		    <i class="fa fa-plus fa-stack-1x text-primary"></i>
		</span>
	</div>

    <h1>Create a New Spark!</h1>
</div>

<!-- Registration form - START -->
<div class="container">
    <div class="row">
        <form role="form" method="post" novalidate>
            <div class="col-lg-6">
                <div class="well well-sm"><strong><span class="glyphicon glyphicon-asterisk"></span>Required Field</strong></div>
                <div class="form-group">
                    <label for="title">Spark Title</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="name" id="TitleName" placeholder="Enter Spark Title" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div><p class="errmessage"><?php echo $errors->create->first('name'); ?></p>
                </div>
				<div class="form-group">
                    <label for="InputDesc">Description</label>
                    <div class="input-group">
                        <textarea name="description" id="InputDesc" placeholder="Enter Description" class="form-control" rows="5" required></textarea>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div><p class="errmessage"><?php echo $errors->create->first('description'); ?></p>
                </div>
                <div class="form-group">
                    <label for="industry">Industry</label>
                    <div class="input-group">
                        <select name="industry" required class="form-control" >
							<option selected value="">Select Industry Type</option>
							<option value="Health">Health</option>
							<option value="Technology">Technology</option>
							<option value="Education">Education</option>
							<option value="Finance">Finance</option>
							<option value="Travel">Travel</option>
						</select>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div><p class="errmessage"><?php echo $errors->create->first('industry'); ?></p>
                </div>
                <div class="form-group">
                    <label for="keyword">Keywords (Separate each with a semi-colon)</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="Inputkeyword" name="keyword" placeholder="Enter Keyword(s)" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div><p class="errmessage"><?php echo $errors->create->first('keyword'); ?></p>
                </div>
        
                <input type="submit" id="submit" value="Spark Some Ideas!" class="btn btn-info pull-right submitter">
            </div>
        </form>

        @if(sizeof($errors->create) > 0)
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
<!-- Registration form - END -->

</div>

</body>
</html>