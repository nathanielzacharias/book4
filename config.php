<?php

### IF YOU ARE GOING TO USE THE CHARACTER ' IN ANY OF THE OPTIONS, ESCAPE IT LIKE THIS: \' ###

// MySQL details
define('global_mysqli_server', '127.0.0.1');
define('global_mysqli_user', 'root');
define('global_mysqli_password', '');
define('global_mysqli_database', 'book4');

// Salt for password encryption. Changing it is recommended. Use 9 random characters
// This MUST be 9 characters, and must NOT be changed after users have been created
define('global_salt', 'k4i8pa2m5');

// Days to remember login (if the user chooses to remember it)
define('global_remember_login_days', '180');

// Title. Used in page title and header
define('global_title', 'FA tool booking system');

// Organization. Used in page title and header, and as sender name in reservation reminder emails
define('global_organization', 'ATKL Failure Analysis Laboratory');

// Secret code. Can be used to only allow certain people to create a user
// Set to '0' to disable
define('global_secret_code', '0');

// Email address to webmaster. Shown to users that want to know the secret code
// To avoid spamming, JavaScript & Base64 is used to show email addresses when not logged in
define('global_webmaster_email', 'nathanielmeasias.zacharias@nxp.com');

// Set to '1' to enable reservation reminders. Adds an option in the control panel
// Check out the wiki for instructions on how to make it work
define('global_reservation_reminders', '0');

// Reservation reminders are sent from this email
// Should be an email address that you own, and that is handled by your web host provider
define('global_reservation_reminders_email', 'some@email.address');

// Code to run the reservation reminders script over HTTP
// If reservation reminders are enabled, this MUST be changed. Check out the wiki for more information
define('global_reservation_reminders_code', '1234');

// Full URL to web site. Used in reservation reminder emails
define('global_url', 'http://your.server/phpmyreservation/');

// Currency (short format). Price per reservation can be changed in the control panel
// Currency should not be changed after reservations have been made (of obvious reasons)
define('global_currency', '€');

// How many weeks forward in time to allow reservations
define('global_weeks_forward', '2');

// Possible reservation times. Use the same syntax as below (TimeFrom-TimeTo)
$global_times = array(
                        '00h00','00h15','00h30', '00h45',
                        '01h00','01h15','01h30', '01h45',
                        '02h00','02h15','02h30', '02h45',
                        '03h00','03h15','03h30', '03h45',
                        '04h00','04h15','04h30', '04h45',
                        '05h00','05h15','05h30', '05h45',
                        '06h00','06h15','06h30', '06h45',
                        '07h00','07h15','07h30', '07h45',
                        '08h00','08h15','08h30', '08h45',
                        '09h00','09h15','09h30', '09h45',
                        '10h00','10h15','10h30', '10h45',
                        '11h00','11h15','11h30', '11h45',
                        '12h00','12h15','12h30', '12h45',
                        '13h00','13h15','13h30', '13h45',
                        '14h00','14h15','14h30', '14h45',
                        '15h00','15h15','15h30', '15h45',
                        '16h00','16h15','16h30', '16h45',
                        '17h00','17h15','17h30', '17h45',
                        '18h00','18h15','18h30', '18h45',
                        '19h00','19h15','19h30', '19h45',
                        '20h00','20h15','20h30', '20h45',
                        '21h00','21h15','21h30', '21h45',
                        '22h00','22h15','22h30', '22h45',
                        '23h00','23h15','23h30', '23h45',
);

?>
