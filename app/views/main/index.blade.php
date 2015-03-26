<!DOCTYPE html>
<html lang="en">

<?php $global = Session::get('global'); ?>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SparkUp</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/stylish-portfolio.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>



    <!-- Header -->
    <header id="top" class="header">
        <div class="text-vertical-center">
        	<div id="well" class="well well-lg"><h1>SparkUp</h1>
            <h3>Spark cool ideas for your Start Up!</h3></div>
            <br>
            <a href="#index" class="btn btn-light btn-lg">Get Started</a>
        </div>
    </header>

    <!-- Index -->
    <section id="index" class="index">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="withMsg">{{ $global }}</div>
                     @if ($global === 'You must verify your account to access this page:')
                        Please click <a href="/resend">here</a> to have the verification e-mail sent to you again.
                    @endif
                	@if (!Auth::guest())
						<h2>Welcome, {{ $ID }}</h2>
					@else
                    	<h2>Log in now to Spark some ideas!</h2>
                    @endif
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>

    <!-- Services -->
    <!-- The circle icons use Font Awesome's stacked icon classes. For more information, visit http://fontawesome.io/examples/ -->
    <section id="services" class="services bg-primary">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-10 col-lg-offset-1">
                	@if(!Auth::guest())
	                    <h2>Start Sparking!</h2>
	                    <hr class="small">
	                    <div class="row">
	                        <div class="col-md-3 col-sm-6">
	                            <div class="service-item">
	                                <span class="fa-stack fa-4x">
	                                <i class="fa fa-circle fa-stack-2x"></i>
	                                <i class="fa fa-star fa-stack-1x text-primary"></i>
	                            </span>
	                                <h4>
	                                    <strong>Spark Hub</strong>
	                                </h4>
	                                <a href="/sparkhub" class="btn btn-light">Go!</a>
	                            </div>
	                        </div>
                             <div class="col-md-3 col-sm-6">
                                <div class="service-item">
                                    <span class="fa-stack fa-4x">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-lightbulb-o fa-stack-1x text-primary"></i>
                                </span>
                                    <h4>
                                        <strong>My Sparks</strong>
                                    </h4>
                                    <a href="/mysparks" class="btn btn-light">Go!</a>
                                </div>
                            </div>
	                        <div class="col-md-3 col-sm-6">
	                            <div class="service-item">
	                                <span class="fa-stack fa-4x">
	                                <i class="fa fa-circle fa-stack-2x"></i>
	                                <i class="fa fa-plus fa-stack-1x text-primary"></i>
	                            </span>
	                                <h4>
	                                    <strong>Create a New Spark</strong>
	                                </h4>
	                                <a href="/createspark" class="btn btn-light">Go!</a>
	                            </div>
	                        </div>
	                        <div class="col-md-3 col-sm-6">
	                            <div class="service-item">
	                                <span class="fa-stack fa-4x">
	                                <i class="fa fa-circle fa-stack-2x"></i>
	                                <i class="fa fa-arrow-up fa-stack-1x text-primary"></i>
	                            </span>
	                                <h4>
	                                    <strong>Find Top Sparks</strong>
	                                </h4>
	                                <a href="/top" class="btn btn-light">Go!</a>
	                            </div>
	                        </div>
	                        <div class="col-md-3 col-sm-6">
	                            <div class="service-item">
	                                <span class="fa-stack fa-4x">
	                                <i class="fa fa-circle fa-stack-2x"></i>
	                                <i class="fa fa-bar-chart fa-stack-1x text-primary"></i>
	                            </span>
	                                <h4>
	                                    <strong>Some Cool Data</strong>
	                                </h4>
	                                <a href="/graph" class="btn btn-light">Go!</a>
	                            </div>
	                        </div>
	                       	<div class="col-md-3 col-sm-6">
	                            <div class="service-item">
	                                <span class="fa-stack fa-4x">
	                                <i class="fa fa-circle fa-stack-2x"></i>
	                                <i class="fa fa-comment fa-stack-1x text-primary"></i>
	                            </span>
	                                <h4>
	                                    <strong>Contact Us</strong>
	                                </h4>
	                                <a href="/contact_us" class="btn btn-light">Go!</a>
	                            </div>
	                        </div>
						 	<div class="col-md-3 col-sm-6">
	                            <div class="service-item">
	                                <span class="fa-stack fa-4x">
	                                <i class="fa fa-circle fa-stack-2x"></i>
	                                <i class="fa fa-info fa-stack-1x text-primary"></i>
	                            </span>
	                                <h4>
	                                    <strong>About Us</strong>
	                                </h4>
	                                <a href="/about" class="btn btn-light">Go!</a>
	                            </div>
	                        </div>
	        				<div class="col-md-3 col-sm-6">
	                            <div class="service-item">
	                                <span class="fa-stack fa-4x">
	                                <i class="fa fa-circle fa-stack-2x"></i>
	                                <i class="fa fa-power-off fa-stack-1x text-primary"></i>
	                            </span>
	                                <h4>
	                                    <strong>Log Out</strong>
	                                </h4>
	                                <a href="/logout" class="btn btn-light">Go!</a>
	                            </div>
	                        </div>
	                    </div>
                    @else
	                     <h2>Log In Now!</h2>

	                    <hr class="small">
	                    <div class="row">
	                       <form method="post">
								<div class="bodycontainer row">
                                    <div class="col-lg-6">
                                    <div class="textboxlabel"> E-mail Address: </div>
									<input class="textbox" type="email" size="30" maxlength="50" name="email"/><br />
                                    <div class="textboxlabel"> Password: </div>
									<input class="textbox" type="password" size="30" maxlength="50" name="password"/><br/>
									<input class="btn btn-light" type="submit" value="Log In"/>
                                </div>
							</form>
                            <div class="register_button col-lg-6 row">
    	                        <div class="col-md-12 col-sm-6">
    	                            <div class="service-item">
    	                                <span class="fa-stack fa-4x">
    	                                <i class="fa fa-circle fa-stack-2x"></i>
    	                                <i class="fa fa-pencil-square-o fa-stack-1x text-primary"></i>
    	                            </span>
    	                                <h4>
    	                                    <strong>Register an Account</strong>
    	                                </h4>
    	                                <a href="/create_user" class="btn btn-light">Go!</a>
    	                            </div>
    	                        </div>
	                       </div>
	                    </div>
                    </div>
                    @endif
                    <!-- /.row (nested) -->
                </div>
                <!-- /.col-lg-10 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1 text-center">
                    <h4><strong>SparkUp</strong>
                    </h4>
                    <p>Toronto, ON</p>
                    <ul class="list-unstyled">
                        <li><i class="fa fa-envelope-o fa-fw"></i>  <a href="mailto:jpaprakis@gmail.com">jpaprakis@gmail.com</a>
                        </li>
                    </ul>
                    <p class="text-muted">Copyright &copy; SparkUp 2015</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="js/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script>
    // Closes the sidebar menu
    $("#menu-close").click(function(e) {
        e.preventDefault();
        $("#sidebar-wrapper").toggleClass("active");
    });

    // Opens the sidebar menu
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#sidebar-wrapper").toggleClass("active");
    });

    // Scrolls to the selected menu item on the page
    $(function() {
        $('a[href*=#]:not([href=#])').click(function() {
            if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') || location.hostname == this.hostname) {

                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
                    $('html,body').animate({
                        scrollTop: target.offset().top
                    }, 1000);
                    return false;
                }
            }
        });
    });
    </script>

</body>

</html>
