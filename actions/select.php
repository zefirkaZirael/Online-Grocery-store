<?php

$link = mysqli_connect("localhost", "root", "");
mysqli_select_db ($link, "shop");
$res = mysqli_query($link, "select * from chat");
while ($row = mysqli_fetch_array($res)) {
	echo "<ul type='circle'>";
	echo "<li><b><a style='text-shadow: 2px 1px white; font-size: 120%; color: #2654a5;'>";
	echo $row ['user'];
	echo "</a></b>";
	echo ":		";
	echo "<a style='color: red; font-style: italic; margin-left:2em;'>";
	echo $row['comments'];
	echo "</a>";
	echo "		";
	echo "<a style='margin-left:10em; 	'>";
	echo $row['date'];	
	echo "</a></li></ul>";
}



?>