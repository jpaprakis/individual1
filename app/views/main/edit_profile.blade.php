@extends('layouts/main')


<form method="post">
	<div>
		<div>
			<name="ID_title">UserID:
			<name="profile_name">{{ $profile[0]->userID }}
		</div>
		<div>	
			<name="City_title">City:
			<input type="text" size="30" maxlength="60" name="city" value="{{ $profile[0]->city }}">
		</div>
		<div>
			<name="Province_title">Province:
			<input type="text" size="30" maxlength="60" name="province" value="{{ $profile[0]->province }}">
		</div>
		<div>
			<name="Company_title">Company:
			<input type="text" size="30" maxlength="60" name="company" value="{{ $profile[0]->company }}">
		</div>	
		<div>
			<name="Summary_title">Summary:
			<input type="text" size="50" maxlength="60" name="summary" value="{{ $profile[0]->summary }}"/>
		</div>	
		<div>
			<name="Experience_title">Experience:
			<input type="text" size="50" maxlength="60" name="experience" value="{{ $profile[0]->experience }}">
		</div>	
		<div>
			<name="cur_proj_title">Current Projects:
			<input type="text" size="50" maxlength="60" name="cur_project" value="{{ $profile[0]->cur_project }}">
		</div>	
		<input type="submit" value="Submit Changes"/>
	</div>
</form>
