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

<?php $global = Session::get('global'); ?>


<div class="container">
<div class="withMsg">{{ $global }}</div>

<div class="page-header">
	<div class="service-item">
	    <span class="fa-stack fa-4x">
		    <i class="fa fa-comment fa-stack-1x text-primary"></i>
		</span>
	</div>

    <h1>Contact Us</h1>
</div>

<!-- Registration form - START -->
<div class="container">
    <div class="row">
        <form role="form" method="post" novalidate>
            <div class="col-lg-6">
                <div class="well well-sm"><strong><span class="glyphicon glyphicon-asterisk"></span>Required Field</strong></div>
                <div class="form-group">
                    <label for="UserID">Email Address</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="email" id="email" placeholder="Enter Your Email" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div><p class="errmessage"><?php echo $errors->login->first('user_ID'); ?></p>
                </div>
                <div class="form-group">
                    <label for="Fname">Subject</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="subject" name="subject" placeholder="Enter Subject" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div><p class="errmessage"><?php echo $errors->login->first('first_name'); ?></p>
                </div>
				<div class="form-group">
                    <label for="InputDesc">Message</label>
                    <div class="input-group">
                        <textarea name="message" id="message" placeholder="Enter Your Message Here" class="form-control" rows="5" required></textarea>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div><p class="errmessage"><?php echo $errors->create->first('description'); ?></p>
                </div>
               <input type="submit" id="submit" value="Send Message" class="btn btn-info pull-right submitter">
            </div>
        </form>
	</div>
</div>

</body>

</html>