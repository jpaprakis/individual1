@extends('layouts/main')

<h1>Register for an Account</h1>

<h2>Whether you want to rent a space, find others to work with, or want to offer a space for rent, sign up here to join the Synergy Spaces community.</h2>

<form method="post" novalidate>
	<div>
		<input type="text" size="30" maxlength="50" name="user_ID" /> User ID <?php echo $errors->login->first('user_ID'); ?> <br />
		<input type="text" size="30" maxlength="50" name="first_name"/> First Name <?php echo $errors->login->first('first_name'); ?><br />
		<input type="text" size="30" maxlength="50" name="last_name"/> Last Name <?php echo $errors->login->first('last_name'); ?><br />
		<input type="email" size="30" maxlength="50" name="email"/> E-mail Address <?php echo $errors->login->first('email'); ?> <br />
		<input type="password" size="30" maxlength="50" name="password"/> Password <?php echo $errors->login->first('password'); ?><br/>
		<input type="password" size="30" maxlength="50" name="confirmed_password"/> Re-Enter Password <?php echo $errors->login->first('confirmed_password'); ?><br/>
		<input type="checkbox" name="terms_and_conditions"/> I agree to the site's Terms and Conditions <?php echo $errors->login->first('terms_and_conditions'); ?><br/>
		<input type="submit" value="Create"/>
	</div>
</form>

