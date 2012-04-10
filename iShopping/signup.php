<?php
include_once ("dbcnt.php");

$query = "insert into member value('". $_POST["name"]. "', '". $_POST["password"]. "', now(), 0)";
mysql_query($query);

setcookie("username", $_POST["name"]);
?>
