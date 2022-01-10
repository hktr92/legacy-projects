Delogare in curs...<br />
<img src="ajax-loader.gif" />
<meta HTTP-EQUIV="REFRESH" content="0; url=index.php">
<?php
session_start();
session_destroy("Ishop");
unset($_SESSION['is_user']);
unset($_SESSION['is_pass']);
?>