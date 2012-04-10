<?php
include_once("dbcnt.php");

$border_style = array('javascript', 'python', 'java', 'ruby', 'shell', 'scala');
$query = "select gid from sale where mname='". $_POST["name"]. "' and state='0'";
$gid_result = mysql_query($query);

while ($gid_row = mysql_fetch_array($gid_result, MYSQL_ASSOC)) {
	$query = "select * from goods where gid='". $gid_row["gid"]. "'";
	$good_result = mysql_query($query);
	$good_row = mysql_fetch_array($good_result, MYSQL_ASSOC);
	echo '<div class="good-block '. $border_style[rand(0, 5)] .' span5">';
	echo '<a id="'. $gid_row["gid"]. '">';
	echo '<h2 class="good-style">'. $good_row["name"]. '</h2>';
	echo '<h3 >Price: $'. $good_row["price"]. '</h3>';
	echo '<img src="'. $good_row["img"]. '" alt="">';
	echo '</a>';
	echo '</div>';
}
?>
