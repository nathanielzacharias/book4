<?php

// Configuration
//$con = mysqli_connect(global_mysqli_server, global_mysqli_user, global_mysqli_password, global_mysqli_database)or die('<span class="error_span"><u>MySQL error:</u> ' . htmlspecialchars(mysqli_error()) . '</span>');


function read_reservation2($week, $day, $time)
{
	$con = mysqli_connect(global_mysqli_server, global_mysqli_user, global_mysqli_password, global_mysqli_database)or die('<span class="error_span"><u>MySQL error:</u> ' . htmlspecialchars(mysqli_error()) . '</span>');

	$query = mysqli_query($con, "SELECT * FROM " . global_mysqli_reservations_table2 . " WHERE reservation_week='$week' AND reservation_day='$day' AND reservation_time='$time'")or die('<span class="error_span"><u>MySQL error:</u> ' . htmlspecialchars(mysqli_error()) . '</span>');
	$reservation = mysqli_fetch_array( $query);
	return($reservation['reservation_user_name']);
}

function read_reservation_details2($week, $day, $time)
{
	$con = mysqli_connect(global_mysqli_server, global_mysqli_user, global_mysqli_password, global_mysqli_database)or die('<span class="error_span"><u>MySQL error:</u> ' . htmlspecialchars(mysqli_error()) . '</span>');

	$query = mysqli_query($con, "SELECT * FROM " . global_mysqli_reservations_table2 . " WHERE reservation_week='$week' AND reservation_day='$day' AND reservation_time='$time'")or die('<span class="error_span"><u>MySQL error:</u> ' . htmlspecialchars(mysqli_error()) . '</span>');
	$reservation = mysqli_fetch_array( $query);

	if(empty($reservation))
	{
		return(0);

	}
	else
	{
		return('<b>Reservation made:</b> ' . $reservation['reservation_made_time'] . '<br><b>User\'s email:</b> ' . $reservation['reservation_user_email']);
	}
}

function make_reservation2($week, $day, $time)
{
	$con = mysqli_connect(global_mysqli_server, global_mysqli_user, global_mysqli_password, global_mysqli_database)or die('<span class="error_span"><u>MySQL error:</u> ' . htmlspecialchars(mysqli_error()) . '</span>');

	$user_id = $_SESSION['user_id'];
	$user_email = $_SESSION['user_email'];
	$user_name = $_SESSION['user_name'];
	$price = global_price;

	if($week == '0' && $day == '0' && $time == '0' )
	{
		mysqli_query($con, "INSERT INTO " . global_mysqli_reservations_table2 . " (reservation_made_time,reservation_week,reservation_day,reservation_time,reservation_price,reservation_user_id,reservation_user_email,reservation_user_name) VALUES (now(),'$week','$day','$time','$price','$user_id','$user_email','$user_name')")or die('<span class="error_span"><u>MySQL error:</u> ' . htmlspecialchars(mysqli_error()) . '</span>');

		return(1);
	}
	elseif($week < global_week_number && $_SESSION['user_is_admin'] != '1' || $week == global_week_number && $day < global_day_number && $_SESSION['user_is_admin'] != '1')
	{
		return('You can\'t reserve back in time');
	}
	elseif($week > global_week_number + global_weeks_forward && $_SESSION['user_is_admin'] != '1')
	{
		return('You can only reserve ' . global_weeks_forward . ' weeks forward in time');
	}
	else
	{
		$query = mysqli_query($con, "SELECT * FROM " . global_mysqli_reservations_table2 . " WHERE reservation_week='$week' AND reservation_day='$day' AND reservation_time='$time'")or die('<span class="error_span"><u>MySQL error:</u> ' . htmlspecialchars(mysqli_error()) . '</span>');

		if(mysqli_num_rows($query) < 1)
		{
			$year = global_year;

			mysqli_query($con, "INSERT INTO " . global_mysqli_reservations_table2 . " (reservation_made_time,reservation_year,reservation_week,reservation_day,reservation_time,reservation_price,reservation_user_id,reservation_user_email,reservation_user_name) VALUES (now(),'$year','$week','$day','$time','$price','$user_id','$user_email','$user_name')")or die('<span class="error_span"><u>MySQL error:</u> ' . htmlspecialchars(mysqli_error()) . '</span>');

			return(1);
		}
		else
		{
			return('Someone else just reserved this time');
		}
	}
}

function delete_reservation2($week, $day, $time)
{
	$con = mysqli_connect(global_mysqli_server, global_mysqli_user, global_mysqli_password, global_mysqli_database)or die('<span class="error_span"><u>MySQL error:</u> ' . htmlspecialchars(mysqli_error()) . '</span>');

	if($week < global_week_number && $_SESSION['user_is_admin'] != '1' || $week == global_week_number && $day < global_day_number && $_SESSION['user_is_admin'] != '1')
	{
		return('You can\'t reserve back in time');
	}
	elseif($week > global_week_number + global_weeks_forward && $_SESSION['user_is_admin'] != '1')
	{
		return('You can only reserve ' . global_weeks_forward . ' weeks forward in time');
	}
	else
	{
		$query = mysqli_query($con, "SELECT * FROM " . global_mysqli_reservations_table2 . " WHERE reservation_week='$week' AND reservation_day='$day' AND reservation_time='$time'")or die('<span class="error_span"><u>MySQL error:</u> ' . htmlspecialchars(mysqli_error()) . '</span>');
		$user = mysqli_fetch_array( $query);

		if($user['reservation_user_id'] == $_SESSION['user_id'] || $_SESSION['user_is_admin'] == '1')
		{
			mysqli_query($con, "DELETE FROM " . global_mysqli_reservations_table2 . " WHERE reservation_week='$week' AND reservation_day='$day' AND reservation_time='$time'")or die('<span class="error_span"><u>MySQL error:</u> ' . htmlspecialchars(mysqli_error()) . '</span>');

			return(1);
		}
		else
		{
			return('You can\'t remove other users\' reservations');
		}
	}
}

?>
