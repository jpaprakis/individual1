@extends('layouts/main')

<!doctype html>
<?php $global = Session::get('global'); ?>

<link href="css/stylish-portfolio.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />

<title>Spark Hub | SparkUp</title>

<div class="container">
<p><a href="/sparkhub">Go back to Spark Hub</a></p>
<div class="withMsg">{{ $global }}</div><br />
<div class="page-header">
        <span class="fa-stack fa-4x">
            <i class="fa fa-arrow-up fa-stack-1x text-primary"></i>
        </span>
    <h1>Find Top Sparks</h1>
</div>
</div>

<!-- The Search Form -->
<div class="search-form"><h4><span class="glyphicon glyphicon-search"></span> Search for Top Sparks</h4>
    <form method="post" novalidate>
        <div class="row">
        	<div class="col-lg-1">
        		From:
        	</div>
            <div class="col-lg-1">
              <select class="form-control" name="FromDay" required>
              		<option selected value="">day</option>
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					<option value="6">5</option>
					<option value="7">7</option>
					<option value="8">8</option>
					<option value="9">9</option>
					<option value="10">10</option>
					<option value="11">11</option>
					<option value="12">12</option>
					<option value="13">13</option>
					<option value="14">14</option>
					<option value="15">15</option>
					<option value="16">16</option>
					<option value="17">17</option>
					<option value="18">18</option>
					<option value="19">19</option>
					<option value="20">20</option>
					<option value="21">21</option>
					<option value="22">22</option>
					<option value="23">23</option>
					<option value="24">24</option>
					<option value="25">25</option>
					<option value="26">26</option>
					<option value="27">27</option>
					<option value="28">28</option>
					<option value="29">29</option>
					<option value="30">30</option>
					<option value="31">31</option>
              </select>
            </div>
            <div class="col-lg-3">
           		<select class="form-control" name="FromMonth" required>
                	<option selected value="">month</option>
					<option value="1">January</option>
					<option value="2">February</option>
					<option value="3">March</option>
					<option value="4">April</option>
					<option value="5">May</option>
					<option value="6">June</option>
					<option value="7">July</option>
					<option value="8">August</option>
					<option value="9">September</option>
					<option value="10">October</option>
					<option value="11">November</option>
					<option value="12">December</option>
				</select>
            </div>
            <div class="col-lg-1">
           		<select class="form-control" name="FromYear" required>
					<option selected value="">year</option>
					<option value="2015">2015</option>
				</select>
            </div>
        </div>

 <div class="row">
        	<div class="col-lg-1">
        		To:
        	</div>
            <div class="col-lg-1">
              <select class="form-control" name="ToDay" required>
              		<option selected value="">day</option>
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					<option value="6">5</option>
					<option value="7">7</option>
					<option value="8">8</option>
					<option value="9">9</option>
					<option value="10">10</option>
					<option value="11">11</option>
					<option value="12">12</option>
					<option value="13">13</option>
					<option value="14">14</option>
					<option value="15">15</option>
					<option value="16">16</option>
					<option value="17">17</option>
					<option value="18">18</option>
					<option value="19">19</option>
					<option value="20">20</option>
					<option value="21">21</option>
					<option value="22">22</option>
					<option value="23">23</option>
					<option value="24">24</option>
					<option value="25">25</option>
					<option value="26">26</option>
					<option value="27">27</option>
					<option value="28">28</option>
					<option value="29">29</option>
					<option value="30">30</option>
					<option value="31">31</option>
              </select>
            </div>
            <div class="col-lg-3">
           		<select class="form-control" name="ToMonth" required>
                	<option selected value="">month</option>
					<option value="1">January</option>
					<option value="2">February</option>
					<option value="3">March</option>
					<option value="4">April</option>
					<option value="5">May</option>
					<option value="6">June</option>
					<option value="7">July</option>
					<option value="8">August</option>
					<option value="9">September</option>
					<option value="10">October</option>
					<option value="11">November</option>
					<option value="12">December</option>
				</select>
            </div>
            <div class="col-lg-1">
           		<select class="form-control" name="ToYear" required>
					<option selected value="">year</option>
					<option value="2015">2015</option>
				</select>
            </div>
        </div>
        <div class="row">
        	<div class="col-lg-1">
        		Top
        	</div>
        	<div class="col-lg-1">
        		<input class="form-control" type="number" size="6" maxlength="6" min="1" name="topk"/>
        	</div>
        	<div class="col-lg-1">
        		Ideas
        	</div>
        </div>


          <input class="btn btn-primary" type="submit" value="Search"/>
    </form>
  </div>

</html>
