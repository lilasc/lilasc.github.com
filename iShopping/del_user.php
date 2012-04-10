<?php
include_once ("dbcnt.php");

$query = "delete from member where name='". $_POST["name"]. "'";
mysql_query($query);
setcookie("username", "", time() - 10);
?>
