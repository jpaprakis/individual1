@extends('layouts/main')

<?php $global = Session::get('global'); ?>

<div class="withMsg">{{ $global }}</div>


<p><a href="/sparkhub">Go back to the Spark Hub</a></p>

<div>
	Viewing Spark:<br />
	<name="spark_title">{{ $spark->title }} 
</div>

<div>
	Spark Description:<br />
	<name="spark_desc">{{ $spark->description }} 
</div>

<div>
	Spark Industry:<br />
	<name="spark_industry">{{ $spark->industry }} 
</div>

<div>
	Spark Keywords:<br />
	<name="spark_keywords">{{ $keystring }} 
</div>