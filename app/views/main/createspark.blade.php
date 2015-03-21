@extends('layouts/main')

<?php $global = Session::get('global'); ?>

<div class="withMsg">{{ $global }}</div>

@if ($global === 'You have already listed this spark!')
	Please check your <a href="/mysparks" >current sparks</a> to make edits to it.
@endif

<p><a href="/mysparks">Go back to my sparks</a></p>
 	<div class="jumbotron">
 	<h1>Create a New Spark!</h1>
	<section>
		<form method="post" novalidate>
			<div>
				<input type="text" size="30" maxlength="50" name="name" /> Spark Title <?php echo $errors->create->first('name'); ?> <br />
				<input type="text" size="30" maxlength="50" name="description" /> Description <?php echo $errors->create->first('description'); ?> <br />
				<!-- Change industry to a drop down -->
				<select name="industry" required >
					<option selected value="">Select Industry Type</option>
					<option value="Health">Health</option>
					<option value="Technology">Technology</option>
					<option value="Education">Education</option>
					<option value="Finance">Finance</option>
					<option value="Trvel">Travel</option>
				</select> Industry <?php echo $errors->create->first('industry'); ?><br />
				<input type="text" size="30" maxlength="50" name="keyword"/> Keywords <?php echo $errors->create->first('keyword'); ?> *Separate keywords by a semi-colon to make your spark searchable!  <br />
				<input type="submit" value="Spark Some Ideas!"/>
			</div>
		</form>
	</section>
    </div>
