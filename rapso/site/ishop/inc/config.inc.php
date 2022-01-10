<?php

include( 'inc/configureaza.php' );

if (!( mysql_connect( $server, $user, $pass ))) {
	exit( mysql_error(  ) );
	(bool)true;
}

mysql_select_db( 'account' );
mysql_set_charset( 'utf8' );
$bg = array( 'bg.jpg', 'bg2.jpg', 'bg3.jpg' );
$i = rand( 0, count( $bg ) - 1 );
$selectedBg = '' . $bg[$i];
$aasdas = '814#911!21$2';
?>
