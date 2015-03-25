@extends('layouts/main')
{{HTML::style('css/index.css')}}

<!-- This line says to display any text that's being passed in by controllers using a "with" redirect, named "global"-->
<?php $global = Session::get('global'); ?>
<div class="withMsg">{{ $global }}</div>

@if ($global === 'You must verify your account to access this page:')
	Please click <a href="/resend">here</a> to have the verification e-mail sent to you again.
@endif

<!-- this is how you embed variables into a laravel call, emedded inside HTML, embedded inside a layout 
this is how we get values/variables from a model (which will be calling our database eventually), to a view-->
<!-- <div class="kittyDiv">{{ $cat }}</div> -->



	<body>
	<div name="mainPage">
					
		<section id ="photoSolo" class = "bodycontainer jumbotron">

			<h1>INDIVIDUAL SITEEEEE </h1>	

		@if (!Auth::guest())
			<div name="UserID"><a href="/view_profile"> {{ $ID }}</div>
		@else
			<form method="post">
				<div class="bodycontainer">
					<input type="email" size="30" maxlength="50" name="email"/> E-mail Address <br />
					<input type="password" size="30" maxlength="50" name="password"/> Password <br/>
					<input type="submit" value="Log In"/>
					<p><a href="/create_user">Or click here to register</a></p>
				</div>
			</form>
		@endif

		<li><a href="/sparkhub">Spark Hub</a></li>
		<li><a href="/createspark">Create your own spark</a></li>
		<li><a href="/top">Top sparks</a></li>
<!-- This link should appear below the login form -->

		
		</section>

		<footer id ="copyright">&copy; 2015 WebCats</footer>
			
	</div>
	
	</body>


