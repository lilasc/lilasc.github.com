<?php
include_once("dbcnt.php");

$query = "insert into sale(gid, mname, number, sale_time, state) value('". $_POST["gid"]. "', '". $_POST["name"]. "', 1, now(), 0)";
echo $query;
mysql_query($query);
?>
