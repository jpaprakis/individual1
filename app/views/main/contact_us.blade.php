@extends('layouts/main')

<?php $global = Session::get('global'); ?>

<!DOCTYPE html>
<html>

<body>

<!-- 	Everything above this line is part of the basic layout. Please keep it same throughout each file.
 -->
 	<div class="jumbotron">
	<section>
		<h1>Contact Us</h1>
		<p>Call us toll free at 1-888-555-5555.</p>
		<p>Or send us an email:</p>
		<p>
			<form method="post">
				<div>
					Your Email Address <input type="email" size="70" name="sender_email" /> <br />
					Subject <input type="text" size="80" name="email_subject"/> <br />
					<textarea name="message" rows="10" cols="80" placeholder="Type your message here."></textarea> <br />
					<input type="submit" value="Send" />
					<div class="withMsg">{{ $global }}</div>
				</div>
			</form>
		</p>
	</section>
    </div>

</body>

</html>