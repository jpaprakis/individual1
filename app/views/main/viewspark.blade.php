@extends('layouts/main')

<?php $global = Session::get('global'); ?>

<head>
    <meta charset="utf-8" />
    <title>View Spark | SparkUp</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link href="../css/bootstrap.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="../font-awesome/css/font-awesome.min.css" />

    <link href="../css/navme.css" rel="stylesheet">
    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
<p><a href="/sparkhub">Go back to the Spark Hub</a></p>
<div class="withMsg">{{ $global }}</div>
<div class="page-header">
	<div class="service-item">
	    <span class="fa-stack fa-4x">
		    <i class="fa fa-eye fa-stack-1x text-primary"></i>
		</span>
	</div>

    <h1>Viewing Spark: <small>{{ $spark->title }}</small> </h1>
</div>

	<h3>Description:</h3>
<div class="col-lg-7 form-control">
	<name="spark_desc">{{ $spark->description }} 
</div></br>

	<h3>Industry:</h3>
<div class="col-lg-7 form-control">
	<name="spark_industry">{{ $spark->industry }} 
</div></br>


	<h3>Keywords:</h3>
	<div class="col-lg-7 form-control">
	<name="spark_keywords">{{ $keystring }} 
</div>