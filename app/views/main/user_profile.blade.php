@extends('layouts/main')

<?php $global = Session::get('global'); ?>

<div class="withMsg">{{ $global }}</div><br />

<div name="ID_title">UserID:</div>
<div name="profile_name">{{ $profile[0]->userID }}</div>

<div name="city_title">City:</div>
<div name="profile_city">{{ $profile[0]->city }}</div>

<input type="number" class="rating" id="test" name="test" data-min="1" data-max="5" value="0">

<div name="province_title">Province:</div>
<div name="profile_province">{{ $profile[0]->province }}</div>

<div name="company_title">Company:</div>
<div name="profile_company">{{ $profile[0]->company }}</div>

<div name="summary_title">Summary:</div>
<div name="profile_summary">{{ $profile[0]->summary }}</div>

<div name="experience_title">Experience:</div>
<div name="profile_experience">{{ $profile[0]->experience }}</div>

<div name="cur_proj_title">Current Projects:</div>
<div name="profile_projects">{{ $profile[0]->cur_project }}</div>


