<!-- MAIN LAYOUT -->

<!doctype html>

<html lang="en">

  {{HTML::style('css/contactus.css')}}
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Synergy Spaces</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
			<li><a href="/">Home</a></li>
			<li><a href="/about">About</a></li>
			<li><a href="/find_coworkers">Find Co-Workers</a></li>
			<li><a href="/find_spaces">Find Spaces</a></li>
			<li><a href="/contact_us">Contact Us</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">My Account <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
				<li><a href="/view_profile">View Profile</a></li>
				<li><a href="/edit_profile">Edit Profile</a></li>
				<li><a href="/create_listing">List a New Space for Rent</a></li>
				<li><a href="/my_listings">View my Rental Listings</a></li>
				<li><a href="/logout">Log Out</a></li>
              </ul>
            </li>
      		<!--<div class="dropdown">
			  <button id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			    Dropdown trigger
			    <span class="caret"></span>
			  </button>
			  <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
			    ...
			  </ul>
			</div>-->
      		<li><button type="button" class="btn btn-default navbar-btn navbar-right">Sign in</button></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>	
<!--This menu should appear above the login form. I could not put the login form on this main layout
page for some reason. The validation code that goes with it just wouldn't work when I did. So I guess
the form code will have to be repeated on every html page. -->
	<nav class="account_menu">
		<ul>

		</ul>
	</nav>

</html>

<!-- KEEP THIS STUFF ON EVERY PAGE -telling our website to load jQuery -->
{{ HTML::script('js/jquery.min.js')}}
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

{{ HTML::style('css/main.css'); }} 
{{ HTML::script('js/main.js'); }}
{{ HTML::script('js/bootstrap.min.js'); }}
{{ HTML::script('https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js'); }}
