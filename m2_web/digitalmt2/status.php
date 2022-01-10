<?php

$exe = mysql_query("SELECT COUNT(*) as count FROM player.player WHERE DATE_SUB(NOW(), INTERVAL 5 MINUTE) < last_play;");
$player_online = mysql_fetch_object($exe)->count;

?>

<img src="img/grey.png" /> <font id="Ora"><?php echo date("H:i d.m.Y"); ?></font>
<div class="line"></div>
<img src="img/online.png" /> Channel 1<br />
<img src="img/online.png" /> Channel 2
<div class="line"></div>
<img src="img/blue.png" /> <?php echo $player_online; ?> Jucatori online