<?php
require_once("inc/mysql.php");
mysql_select_db("player");
$exe = mysql_query("SELECT COUNT(*) as count FROM player WHERE DATE_SUB(NOW(), INTERVAL 40 MINUTE) < last_play;");
$player_online = mysql_fetch_object($exe)->count;

echo "$player_online";

?>