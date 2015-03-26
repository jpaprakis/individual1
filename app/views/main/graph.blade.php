@extends('layouts/main')


<!doctype html>

<head>
    <meta charset="utf-8" />
    <title>Cool Data | SparkUp</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />

    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
</head>
<body>


<div class="container">
<p><a href="/sparkhub">Go back to the Spark Hub</a></p>
<div class="page-header">
	<div class="service-item">
	    <span class="fa-stack fa-4x">
		    <i class="fa fa-bar-chart fa-stack-1x text-primary"></i>
		</span>
	</div>

    <h1>Distribution of Sparks by Industry</h1>
</div>


<div id="chartdiv" style="height:400px;width:600px; "></div> 
</html>
<input type="hidden" id="tech" value="{{ $tech_count }}">
<input type="hidden" id="health" value="{{ $health_count }}">
<input type="hidden" id="education" value="{{ $education_count }}">
<input type="hidden" id="finance" value="{{ $finance_count }}">
<input type="hidden" id="travel" value="{{ $travel_count }}">
<link rel="stylesheet" type="text/css" href="css/jquery.jqplot.css" />
<script language="javascript" type="text/javascript" src="js/jquery.min.js"></script>
<script language="javascript" type="text/javascript" src="js/jquery.jqplot.min.js"></script>
<script language="javascript" type="text/javascript" src="js/plugins/jqplot.pieRenderer.min.js"></script>

{{ HTML::script('js/graph.js'); }}