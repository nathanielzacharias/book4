<?php

include_once('main.php');

if(isset($_GET['create_user0']))
{
	$user_name0 = mysqli_real_escape_string($con, trim($_POST['user_name0']));
	$user_email0 = mysqli_real_escape_string($con, $_POST['user_email0']);
//	$user_password = mysqli_real_escape_string($con, $_POST['user_password']);
//	$user_email = 'dummyEmail@dummyDomain.com';
//	$user_password = '1234';
//	$user_secret_code = $_POST['user_secret_code'];
	echo create_user0($user_name0, $user_email0);
	// echo create_user($user_name,  $user_password, $user_secret_code);
}
elseif(isset($_GET['new_user0']))
{

?>

	<div class="box_div" id="login_div"><div class="box_top_div"><a href="#">Start</a> &gt; Register PATS</div><div class="box_body_div">
	<div id="new_user_div"><div>

	<form action="." id="new_user_form0"><p>

	<label for="user_name_input0">PATS number:</label><br>
	<input type="text" id="user_name_input0"><br><br>
	<label for="user_email_input0">Confirm PATS number:</label><br>
	<input type="text" id="user_email_input0" autocapitalize="off"><br><br>
<!--	<label for="user_password_input">Password:</label><br>
	<input type="password" id="user_password_input"><br><br>
	<label for="user_password_confirm_input">Confirm password:</label><br>
	<input type="password" id="user_password_confirm_input"><br><br>
-->

<?php

	if(global_secret_code != '0')
	{
		echo '<label for="user_secret_code_input">Secret code: <sup><a href="." id="user_secret_code_a" tabindex="-1">What\'s this?</a></sup></label><br><input type="password" id="user_secret_code_input"><br><br>';
	}

?>

	<input type="submit" value="Register your PATS">

	</p></form>

	</div><div>

<!--
	<p class="blue_p bold_p">Information:</p>
	<ul>
	<li>With just a click you can make your reservation</li>
	<li>Your usage is stored automatically</li>
	<li>Your password is encrypted and can't be read</li>
	</ul>
-->

	</div></div>

	<p id="new_user_message_p0"></p>

	</div></div>

<?php

}


?>
