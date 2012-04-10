<?php
include_once("dbcnt.php");

$query = "select gid, number from sale where mname='". $_POST["name"]. "' and state='0'";
$gid_result = mysql_query($query);

while ($gid_row = mysql_fetch_array($gid_result, MYSQL_ASSOC)) {
	$query = "update goods set number=number-". $gid_row["number"]. " where gid='". $gid_row["gid"]. "'";
	mysql_query($query);
}

$query = "update sale set state=1 where state=0 and mname='". $_POST["name"]. "'";
mysql_query($query);
echo "";
?>
