<?php
$db_host = "localhost";
$db_database = "iShopping";
$db_username = "admin";
$db_password = "admin";

$cnt = mysql_connect($db_host, $db_username, $db_password);
if (!$cnt)
	die("Could not connect to the database: <br />". mysql_error());
	
$db_select = mysql_select_db($db_database);
if (!$db_select)
	die("Could not select the database: <br />". mysql_error());
	
function ckquery($result) {
	if (!$result)
		die("Could not query the database: <br />". mysql_error());
}
?>
