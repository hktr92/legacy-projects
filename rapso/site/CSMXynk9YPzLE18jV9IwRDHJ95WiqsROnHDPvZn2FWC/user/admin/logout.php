<?php
session_start();
ob_start();
$_SESSION['user_id'] = 0;
$_SESSION['user_admin'] = 0;
session_destroy();
header('Location: index.php?a=home');
exit();
?>