@extends('layouts/main')

<?php $global = Session::get('global'); ?>

<div class="withMsg">{{ $global }}</div>

@if ($global === 'You have already listed this space!')
	Please check your <a href="/my_listings" >current listings</a> to make edits to it.
@endif

<p><a href="/my_listings">Go back to my listings</a></p>
 	<div class="jumbotron">
 	<h1>Create a New Listing</h1>
	<section>
		<form method="post" novalidate>
			<div>
				<input type="text" size="30" maxlength="50" name="space_name" /> Name of Space* <?php echo $errors->create->first('space_name'); ?> <br />
				<input type="text" size="30" maxlength="50" name="city" /> City* <?php echo $errors->create->first('city'); ?> <br />
				<input type="text" size="30" maxlength="50" name="province"/> Province* <?php echo $errors->create->first('province'); ?><br />
				<input type="text" size="30" maxlength="50" name="address"/> Address* <?php echo $errors->create->first('address'); ?><br />
				<input type="text" size="30" maxlength="50" name="suite"/> Suite <?php echo $errors->create->first('suite'); ?> <br />
				<input type="text" size="30" maxlength="50" name="postal_code"/> Postal Code* <?php echo $errors->create->first('postal_code'); ?><br/>
				<input type="text" size="30" maxlength="50" name="description"/> Description* <?php echo $errors->create->first('description'); ?><br/>
				<input type="text" size="30" maxlength="50" name="looking_for"/> Looking For <?php echo $errors->create->first('looking_for'); ?><br/>
				<input type="text" size="30" maxlength="50" name="price"/> Price* <?php echo $errors->create->first('price'); ?><br/>
				<!-- Change price type to a drop down -->
				<input type="text" size="30" maxlength="50" name="price_type"/> Price Type* <?php echo $errors->create->first('price_type'); ?><br/>
				<input type="text" size="30" maxlength="50" name="additional_info"/> Additional Info <?php echo $errors->create->first('additional_info'); ?><br/>
				<input type="submit" value="Create"/>
			</div>
		</form>
	</section>
    </div>
