<?php

include_once('main.php');
$con = mysqli_connect(global_mysqli_server, global_mysqli_user, global_mysqli_password, global_mysqli_database)or die('<span class="error_span"><u>MySQL error:</u> ' . htmlspecialchars(mysqli_error()) . '</span>');


if(check_login() != true) { exit; }

if(isset($_GET['make_reservation']))
{
	$week = mysqli_real_escape_string($con, $_POST['week']);
	$day = mysqli_real_escape_string($con, $_POST['day']);
	$time = mysqli_real_escape_string($con, $_POST['time']);
	echo make_reservation3($week, $day, $time);
}

elseif(isset($_GET['delete_reservation']))
{
	$week = mysqli_real_escape_string($con,$_POST['week']);
	$day = mysqli_real_escape_string($con,$_POST['day']);
	$time = mysqli_real_escape_string($con,$_POST['time']);
	echo delete_reservation3($week, $day, $time);
}
elseif(isset($_GET['read_reservation']))
{
	$week = mysqli_real_escape_string($con, $_POST['week']);
	$day = mysqli_real_escape_string($con, $_POST['day']);
	$time = mysqli_real_escape_string($con, $_POST['time']);
	echo read_reservation3($week, $day, $time);
}
elseif(isset($_GET['read_reservation_details']))
{
	$week = mysqli_real_escape_string($con,$_POST['week']);
	$day = mysqli_real_escape_string($con,$_POST['day']);
	$time = mysqli_real_escape_string($con,$_POST['time']);
	echo read_reservation_details3($week, $day, $time);
}
elseif(isset($_GET['week']))
{
	$week = $_GET['week'];

	echo '<table id="reservation_table"><colgroup span="1" id="reservation_time_colgroup"></colgroup><colgroup span="7" id="reservation_day_colgroup"></colgroup>';

	$days_row = '<tr><td id="reservation_corner_td"><input type="button" class="blue_button small_button" id="reservation_today_button" value="Today"></td><th class="reservation_day_th">Monday</th><th class="reservation_day_th">Tuesday</th><th class="reservation_day_th">Wednesday</th><th class="reservation_day_th">Thursday</th><th class="reservation_day_th">Friday</th><th class="reservation_day_th">Saturday</th><th class="reservation_day_th">Sunday</th></tr>';

	if($week == global_week_number)
	{
		echo highlight_day($days_row);
	}
	else
	{
		echo $days_row;
	}

	foreach($global_times as $time)
	{
		echo '<tr><th class="reservation_time_th">' . $time . '</th>';

		$i = 0;

		while($i < 7)
		{
			$i++;

			echo '<td><div class="reservation_time_div"><div class="reservation_time_cell_div" id="div:' . $week . ':' . $i . ':' . $time . '" onclick="void(0)">' . read_reservation3($week, $i, $time) . '</div></div></td>';
		}

		echo '</tr>';
	}

	echo '</table>';
}
else
{
	echo '</div><div class="box_div" id="reservation_div"><div class="box_top_div" id="reservation_top_div"><div id="reservation_top_left_div"><a href="." id="previous_week_a">&lt; Previous week</a></div><div id="reservation_top_center_div">Reservations for week <span id="week_number_span">' . global_week_number . '</span></div><div id="reservation_top_right_div"><a href="." id="next_week_a">Next week &gt;</a></div></div><div class="box_body_div"><div id="reservation_table_div"></div></div></div><div id="reservation_details_div">';
}

?>
