@extends('layouts/main')


<!doctype html>


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