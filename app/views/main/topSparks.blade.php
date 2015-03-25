@extends('layouts/main')

<!doctype html>
<?php $global = Session::get('global'); ?>

<div class="withMsg">{{ $global }}</div><br />

<?php 
//get the authenticated userID
$id = Auth::id();
?>

<div class="resultDiv">{{ $orderedResults }}</div>


</html>

{{ HTML::script('js/rating.js'); }}