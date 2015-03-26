@extends('layouts/main')

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Register | SparkUp</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />

    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
</head>
<body>


<div class="container">

<div class="page-header">
	<div class="service-item">
	    <span class="fa-stack fa-4x">
		    <i class="fa fa-pencil-square-o fa-stack-1x text-primary"></i>
		</span>
	</div>

    <h1>Register for an Account... <small>and get Sparking!</small></h1>
</div>

<!-- Registration form - START -->
<div class="container">
    <div class="row">
        <form role="form" method="post" novalidate>
            <div class="col-lg-6">
                <div class="well well-sm"><strong><span class="glyphicon glyphicon-asterisk"></span>Required Field</strong></div>
                <div class="form-group">
                    <label for="UserID">User ID</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="user_ID" id="InputName" placeholder="Enter User ID" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div><p class="errmessage"><?php echo $errors->login->first('user_ID'); ?></p>
                </div>
                <div class="form-group">
                    <label for="Fname">First Name</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="InputNameFirst" name="first_name" placeholder="Enter First Name" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div><p class="errmessage"><?php echo $errors->login->first('first_name'); ?></p>
                </div>
                <div class="form-group">
                    <label for="LName">Last Name</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="InputNameLast" name="last_name" placeholder="Enter Last Name" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div><p class="errmessage"><?php echo $errors->login->first('last_name'); ?></p>
                </div>
                <div class="form-group">
                    <label for="InputEmail">Email</label>
                    <div class="input-group">
                        <input type="email" class="form-control" id="InputEmail" name="email" placeholder="Enter Email" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div><p class="errmessage"><?php echo $errors->login->first('email'); ?></p>
                </div>
                <div class="form-group">
                    <label for="Pass">Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="InputPassword" name="password" placeholder="Enter Password" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div><p class="errmessage"><?php echo $errors->login->first('password'); ?></p>
                </div>
                <div class="form-group">
                    <label for="ConfPass">Confirm Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="InputConfPassword" name="confirmed_password" placeholder="Confirm Password" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div><p class="errmessage"><?php echo $errors->login->first('confirmed_password'); ?></p>
                </div>

                <div class="input-group">
                	<input type="checkbox" name="terms_and_conditions"/> I agree to the site's Terms and Conditions <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span> <br/>
                </div> <p class="errmessage"><?php echo $errors->login->first('terms_and_conditions'); ?></p></br>
                <input type="submit" name="Register" id="submit" value="Register" class="btn btn-info pull-right submitter">
            </div>
        </form>

        @if(sizeof($errors->login) > 0)
        <div class="col-lg-5 col-md-push-1">
            <div class="col-md-12">
                <div class="alert alert-danger">
                    <span class="glyphicon glyphicon-remove"></span><strong> Error! Please check all page inputs.</strong>
                </div>
            </div>
        </div>
        @endif

    </div>
</div>
<!-- Registration form - END -->

</div>

</body>
</html>