<?php

include_once('main.php');

$con = mysqli_connect(global_mysqli_server, global_mysqli_user, global_mysqli_password, global_mysqli_database)or die('<span class="error_span"><u>MySQL error:</u> ' . htmlspecialchars(mysqli_error()) . '</span>');

if(check_login() != true) { exit; }


echo '<div class="box_div" id="cp_div"><div class="box_top_div"><a href="#">Start</a> &gt; Tool Status</div><div class="box_body_div">';



?>

		<h3>Current Status of Tools</h3>

		<div id="users_div"><?php echo list_users1(); ?></div>


<!--
		<p class="center_p"><input type="button" class="small_button blue_button" id="reset_user_password_button" value="Reset password"> <input type="button" class="small_button blue_button" id="change_user_permissions_button" value="Change permissions"> <input type="button" class="small_button" id="delete_user_reservations_button" value="Delete reservations"> <input type="button" class="small_button" id="delete_user_button" value="Delete user"></p>
		<p class="center_p" id="user_administration_message_p"></p>
		-->
