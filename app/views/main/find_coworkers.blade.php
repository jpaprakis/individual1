@extends('layouts/main')

<?php $global = Session::get('global'); ?>

 <div class="jumbotron">
	<h1>Find Co-Workers</h1>
	<section>
	<p>
		<form method="post">
			<div>
				Profession <input type="text" size="40" name="profession" /> <br />
				in City of <input type="text" size="40" name="city" /> <br />
				or Postal Code <input type="text" size="6" name="email_subject"/> <br />
				<input type="submit" value="Search for Co-Workers" />
				<div class="withMsg">{{ $global }}</div>
			</div>
		</form>
	</p>
	</section>
 </div>