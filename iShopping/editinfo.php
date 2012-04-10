<?php
include_once ("dbcnt.php");

$query = "update member set password='". $_POST["password"]. "' where name='". $_POST["name"]. "'";
mysql_query($query);
?>
