<?php
include_once ("dbcnt.php");

$query = "select * from member where name='" . $_POST["name"] . "' and password='" . $_POST["password"] . "'";
$result = mysql_query($query);

if (!mysql_num_rows($result))
	echo "Oops: user name or password error.";
else {
	echo "success";
	setcookie("username", $_POST["name"]);
}
?>
