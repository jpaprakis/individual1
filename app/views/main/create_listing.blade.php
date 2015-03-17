@extends('layouts/main')

<?php $global = Session::get('global'); ?>

<div class="withMsg">{{ $global }}</div>

@if ($global === 'You have already listed this spark!')
	Please check your <a href="/mysparks" >current sparks</a> to make edits to it.
@endif

<p><a href="/my_listings">Go back to my sparks</a></p>
 	<div class="jumbotron">
 	<h1>Create a New Spark!</h1>
	<section>
		<form method="post" novalidate>
			<div>
				<input type="text" size="30" maxlength="50" name="spark_name" /> Spark Title <?php echo $errors->create->first('spark_name'); ?> <br />
				<input type="text" size="30" maxlength="50" name="city" /> Description <?php echo $errors->create->first('city'); ?> <br />
				<!-- Change industry to a drop down -->
				<input type="text" size="30" maxlength="50" name="province"/> Industry <?php echo $errors->create->first('province'); ?><br />
				<input type="text" size="30" maxlength="50" name="address"/> Keywords <?php echo $errors->create->first('address'); ?><br />
				<input type="submit" value="Spark Some Ideas!"/>
			</div>
		</form>
	</section>
    </div>
