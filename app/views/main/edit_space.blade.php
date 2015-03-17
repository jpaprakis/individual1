@extends('layouts/main')

<?php $global = Session::get('global'); ?>

<div class="withMsg">{{ $global }}</div>


<p><a href="/my_listings">Go back to my listings</a></p>

<div>
	Editing Space at:<br />
	<name="space_address">{{ $space->address }} 
	<name="space_suite">{{ $space->suite }}  <br/>
	<name="space_city">{{ $space->city }},
	<name="space_province">{{ $space->province }}
	<name="space_pcode">{{ $space->postal_code }} 
</div>

<form method="post" novalidate>
	<div>
		
		<div>
			<name="name_title">Name of Space*:
			<input type="text" size="30" maxlength="60" name="space_name" value="{{ $space->space_name }}" /> <?php echo $errors->edit->first('space_name'); ?> <br />
		</div>
		<div>
			<name="desc_title">Description*:
			<input type="text" size="30" maxlength="60" name="description" value="{{ $space->description }}" /> <?php echo $errors->edit->first('description'); ?> <br />
		</div>
		<div>
			<name="looking_title">Looking for:
			<input type="text" size="30" maxlength="60" name="looking_for" value="{{ $space->looking_for }}" /> <?php echo $errors->edit->first('looking_for'); ?> <br />
		</div>
		<div>
			<name="price_title">Price*:
			<input type="text" size="30" maxlength="60" name="price" value="{{ $space->price }}" /> <?php echo $errors->edit->first('price'); ?> <br />
		</div>
		<div>
			<name="price_t_title">Price Type*:
			<input type="text" size="30" maxlength="60" name="price_type" value="{{ $space->price_type }}" /> <?php echo $errors->edit->first('price_type'); ?> <br />
		</div>
		<div>
			<name="additional_title">Additional Info:
			<input type="text" size="30" maxlength="60" name="additional_info" value="{{ $space->additional_info }}" /> <?php echo $errors->edit->first('additional_info'); ?> <br />
		</div>
		<input type="hidden" name="concat_ID" value="{{ $space->concat_ID }}">
		<input type="submit" value="Submit Changes"/>

	</div>
</form>


