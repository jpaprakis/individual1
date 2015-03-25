@extends('layouts/main')


<!doctype html>


<div id="chartdiv" style="height:400px;width:600px; "></div> 


</html>
<input type="hidden" id="x" value="2">
<input type="hidden" id="y" value="12">
<input type="hidden" id="z" value="50">
<input type="hidden" id="m" value="50">
<link rel="stylesheet" type="text/css" href="css/jquery.jqplot.css" />
<script language="javascript" type="text/javascript" src="js/jquery.min.js"></script>
<script language="javascript" type="text/javascript" src="js/jquery.jqplot.min.js"></script>
<script language="javascript" type="text/javascript" src="js/plugins/jqplot.pieRenderer.min.js"></script>

{{ HTML::script('js/graph.js'); }}