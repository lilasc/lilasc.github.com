<?php
include_once("dbcnt.php");

if (!isset($_COOKIE["username"])) {
	echo "login";
	return;
}

$query = "select * from goods where gid='". $_POST["gid"]. "'";
$result = mysql_query($query);

$row = mysql_fetch_array($result, MYSQL_ASSOC);
echo $row["gid"]. ",". $row["name"]. ",". $row["price"]. ",". $row["img"]. ",". $row["number"]. ",". $row["description"];
?>
