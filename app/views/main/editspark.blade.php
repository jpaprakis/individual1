@extends('layouts/main')

<?php $global = Session::get('global'); ?>

<div class="withMsg">{{ $global }}</div>


<p><a href="/my_listings">Go back to my Sparks</a></p>

<div>
	Editing Idea:<br />
	<name="spark_title">{{ $spark->title }} 
</div>

<form method="post" novalidate>
	<div>
		
		<div>
			<name="description">Description:
			<input type="text" size="30" maxlength="60" name="description" value="{{ $spark->description }}" /> <?php echo $errors->edit->first('description'); ?> <br />
		</div>
		<select name="industry" required> Industry:
					<option <?php if($spark->industry == 'Health'){echo("selected");}?> value="Health">Health</option>
					<option <?php if($spark->industry == 'Technology'){echo("selected");}?> value="Technology">Technology</option>
					<option <?php if($spark->industry == 'Education'){echo("selected");}?> value="Education">Education</option>
					<option <?php if($spark->industry == 'Finance'){echo("selected");}?> value="Finance">Finance</option>
					<option <?php if($spark->industry == 'Travel'){echo("selected");}?> value="Trvel">Travel</option>
		</select> <?php echo $errors->create->first('industry'); ?><br />
		<div>
			<name="keywords">Keywords:
			<input type="text" size="30" maxlength="60" name="price" value="{{ $keystring }}" /> <?php echo $errors->edit->first('keywords'); ?> <br />
		</div>
<!--		<input type="hidden" name="concat_ID" value="{{ $spark->concat_ID }}"> -->
		<input type="submit" value="Submit Changes"/>
		<input type="hidden" name="SparkID" value={{$spark->ideaID}}/>

	</div>
</form>


